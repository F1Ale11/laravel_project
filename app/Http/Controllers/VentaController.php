<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venta;
use App\Models\Libreria;
use App\Models\Titulo;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['libreria', 'titulos'])->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $librerias = Libreria::all();
        $titulos = Titulo::all();
        return view('ventas.create', compact('librerias', 'titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'libreria_id' => 'required|exists:librerias,id',
            'titulos' => 'required|array',
            'titulos.*' => 'exists:titulos,id',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
        ]);

        $venta = Venta::create($request->only('fecha', 'libreria_id'));

        // Armar arreglo para sync: [titulo_id => ['cantidad' => valor]]
        $syncData = [];
        foreach($request->titulos as $index => $tituloId) {
            $syncData[$tituloId] = ['cantidad' => $request->cantidades[$index]];
        }
        $venta->titulos()->sync($syncData);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function edit(Venta $venta)
    {
        $librerias = Libreria::all();
        $titulos = Titulo::all();
        $venta->load('titulos');
        return view('ventas.edit', compact('venta', 'librerias', 'titulos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'fecha' => 'required|date',
            'libreria_id' => 'required|exists:librerias,id',
            'titulos' => 'required|array',
            'titulos.*' => 'exists:titulos,id',
            'cantidades' => 'required|array',
            'cantidades.*' => 'integer|min:1',
        ]);

        $venta->update($request->only('fecha', 'libreria_id'));

        $syncData = [];
        foreach($request->titulos as $index => $tituloId) {
            $syncData[$tituloId] = ['cantidad' => $request->cantidades[$index]];
        }
        $venta->titulos()->sync($syncData);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
    }
}
