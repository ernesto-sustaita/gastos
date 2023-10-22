<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View 
    {
        return view('cuentas.index', [
            'cuentas' => Cuenta::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'fecha_corte' => 'date'
        ]);

        $request->user()->cuentas()->create($validated);

        return redirect(route('cuentas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuenta $cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuenta $cuenta)
    {
        //
    }
}
