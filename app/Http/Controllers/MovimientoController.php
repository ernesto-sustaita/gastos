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
    public function create(): View
    {
        return view('movimientos.create', [
            'cuentas' => Cuenta::with('user')->with('movimientos')->latest()->get(),
        ]);
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
            'categoria' => 'required|string|max:255',
            'fecha' => 'required|date'
        ]);

        $cuentaOrigen = $request->input('cuenta_origen_id');

        Movimiento::create($validated);

        if($cuentaOrigen != '') {
            $validated['cuenta_id'] = $cuentaOrigen;
            $validated['tipo'] = 'egreso';
            Movimiento::create($validated);
        }

        return redirect(route('movimientos.index'))->with('success', 'Movimiento creado.');
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
