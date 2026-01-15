<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use App\Models\Expenses;
use App\Models\Provider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IncomesController extends Controller
{

    public function chart()
    {
        // Ingresos por mes
        $incomes = Incomes::select(
            DB::raw("strftime('%Y-%m', concept_date) as month"),
            DB::raw("SUM(amount) as total")
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Gastos por mes
        $expenses = Expenses::select(
            DB::raw("strftime('%Y-%m', concept_date) as month"),
            DB::raw("SUM(amount) as total")
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Unificar meses
        $months = $incomes->pluck('month')
            ->merge($expenses->pluck('month'))
            ->unique()
            ->sort()
            ->values();

        // Labels
        $labels = $months->map(
            fn($m) =>
            \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y')
        );

        // Data alineada
        $incomeData = $months->map(
            fn($m) =>
            $incomes->firstWhere('month', $m)->total ?? 0
        );

        $expenseData = $months->map(
            fn($m) =>
            $expenses->firstWhere('month', $m)->total ?? 0
        );

        return view('Charts.charts', [
            'labels' => $labels,
            'incomeData' => $incomeData,
            'expenseData' => $expenseData,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $providers = Provider::orderBy('name')->get();

        $incomes = Incomes::with('provider')
            ->when($request->provider, function ($query, $provider) {
                $query->whereHas('provider', function ($q) use ($provider) {
                    $q->where('name', 'like', "%{$provider}%");
                });
            })
            ->when($request->date, function ($query, $date) {
                $query->whereDate('concept_date', $date);
            })
            ->orderBy('concept_date', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('incomes.index', compact('incomes', 'providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('incomes.createincome', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id'   => ['required', 'exists:providers,id'],
            'amount'        => ['required', 'numeric', 'min:0'],
            'concept_date' => ['nullable', 'date', 'before_or_equal:today'],
            'description'   => ['required', 'string'],
        ]);

        $validated['concept_date'] ??= now()->toDateString();

        Incomes::create($validated);

        return redirect()
            ->route('showIncomes.index')
            ->with('success', 'Ingreso registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $income = Incomes::findOrFail($id);
        $providers = Provider::all();

        return view('incomes.updateincome', compact('income', 'providers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incomes $incomes) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incomes $income)
    {
        $validated = $request->validate([
            'provider_id'   => ['required', 'exists:providers,id'],
            'amount'        => ['required', 'numeric', 'min:0'],
            'concept_date'  => ['required', 'date', 'before_or_equal:today'],
            'description'   => ['required', 'string'],
        ]);

        $income->update($validated);

        return redirect()
            ->route('showIncomes.index')
            ->with('success', 'Ingreso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = Incomes::findOrFail($id);
        $income->delete();
        return redirect()->route('showIncomes.index');
    }
}
