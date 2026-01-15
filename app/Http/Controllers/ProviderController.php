<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function filter(Request $request)
    {
        $providers = Provider::with(['incomes', 'expenses'])
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('providers.utilities', compact('providers'));
    }


    public function index(Request $request)
    {
        $search = $request->query('search');

        $providers = Provider::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('providers.showproviders', compact('providers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('providers.createprovider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:providers,name'],
        ]);

        Provider::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('showProviders.index')
            ->with('success', 'Proveedor creado correctamente');
    }

    public function summary()
    {
        $providers = Provider::with([
            'incomes:id,provider_id,amount',
            'expenses:id,provider_id,amount',
        ])
            ->paginate(10);

        return view('providers.utilities', compact('providers'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $provider = Provider::find($id);

        return view('providers.updateprovider', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('providers', 'name')->ignore($provider->id),
            ],
        ]);

        $provider->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('showProviders.index')
            ->with('success', 'Proveedor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('showProviders.index');
    }
}
