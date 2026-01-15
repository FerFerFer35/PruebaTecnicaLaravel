<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Provider;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $providers = Provider::orderBy('name')->get();

        $expenses = Expenses::with('provider')
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

        return view('expenses.index', compact('expenses', 'providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('expenses.createexpense', compact('providers'));
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


        Expenses::create($validated);

        return redirect()
            ->route('showExpenses.index')
            ->with('success', 'Gasto registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expense = Expenses::findOrFail($id);
        $providers = Provider::all();

        return view('expenses.updateexpense', compact('expense', 'providers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expenses $expenses) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenses $expense)
    {
        $validated = $request->validate([
            'provider_id'   => ['required', 'exists:providers,id'],
            'amount'        => ['required', 'numeric', 'min:0'],
            'concept_date'  => ['required', 'date', 'before_or_equal:today'],
            'description'   => ['required', 'string'],
        ]);

        $expense->update($validated);

        return redirect()
            ->route('showExpenses.index')
            ->with('success', 'Gasto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expense = Expenses::findOrFail($id);
        $expense->delete();
        return redirect()->route('showExpenses.index');
    }
}
