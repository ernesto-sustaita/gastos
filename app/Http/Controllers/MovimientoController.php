<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('movimientos.index', [
            'cuentas' => Cuenta::with('user')->with('movimientos')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cuenta_id' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'tipo' => 'required|string|max:255',
            'fecha' => 'required|date'
        ]);

        Movimiento::create($validated);

        return redirect(route('movimientos.index'))->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimiento $movimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        //
    }
}
