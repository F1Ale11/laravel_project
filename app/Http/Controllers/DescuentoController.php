<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuento;
use App\Models\Libreria;

class DescuentoController extends Controller
{
    public function index()
    {
        $descuentos = Descuento::with('libreria')->get();
        return view('descuentos.index', compact('descuentos'));
    }

    public function create()
    {
        $librerias = Libreria::all();
        return view('descuentos.create', compact('librerias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rango_inicial' => 'required|numeric',
            'rango_final'   => 'required|numeric',
            'descuento'     => 'required|numeric',
            'libreria_id'   => 'required|exists:librerias,id',
        ]);

        Descuento::create($request->all());
        return redirect()->route('descuentos.index')->with('success', 'Descuento creado correctamente.');
    }

    public function edit($id)
    {
        $descuento = Descuento::findOrFail($id);
        $librerias = Libreria::all();
        return view('descuentos.edit', compact('descuento', 'librerias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rango_inicial' => 'required|numeric',
            'rango_final'   => 'required|numeric',
            'descuento'     => 'required|numeric',
            'libreria_id'   => 'required|exists:librerias,id',
        ]);

        $descuento = Descuento::findOrFail($id);
        $descuento->update($request->all());
        return redirect()->route('descuentos.index')->with('success', 'Descuento actualizado correctamente.');
    }

    public function destroy($id)
    {
        Descuento::findOrFail($id)->delete();
        return redirect()->route('descuentos.index')->with('success', 'Descuento eliminado correctamente.');
    }
}
