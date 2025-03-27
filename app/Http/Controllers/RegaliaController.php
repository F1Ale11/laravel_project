<?php

namespace App\Http\Controllers;

use App\Models\Regalia;
use App\Models\Titulo;


use Illuminate\Http\Request;

class RegaliaController extends Controller
{
    public function index()
    {
        $regalias = Regalia::with('titulo')->get();
        return view('regalias.index', compact('regalias'));
    }

    public function create()
    {
        $titulos = Titulo::all();
        return view('regalias.create', compact('titulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rango_inicial' => 'required|numeric',
            'rango_final'   => 'required|numeric',
            'regali'        => 'required|numeric',
            'titulo_id'     => 'required|exists:titulos,id',
        ]);

        Regalia::create($request->all());
        return redirect()->route('regalias.index')->with('success', 'Regalía creada correctamente');
    }

    public function edit($id)
    {
        $regalia = Regalia::findOrFail($id);
        $titulos = Titulo::all(); // Para el select de títulos
        return view('regalias.edit', compact('regalia', 'titulos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rango_inicial' => 'required|numeric',
            'rango_final'   => 'required|numeric',
            'regali'        => 'required|numeric',
            'titulo_id'     => 'required|exists:titulos,id',
        ]);

        $regalia = Regalia::findOrFail($id);
        $regalia->update($request->all());

        return redirect()->route('regalias.index')->with('success', 'Regalía actualizada correctamente.');
    }


    public function destroy($id)
    {
        $row = Regalia::find($id);
        $row->delete();
        return redirect()->route('regalias.index')->with('success', 'Regalía eliminada correctamente');
    }
}
