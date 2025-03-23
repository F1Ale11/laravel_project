<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Editorial;
use App\Models\Autor;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    public function index()
    {
        // Cargamos relaciones para evitar consultas extra
        $titulos = Titulo::with(['editorial', 'autores'])->get();
        return view('titulos.index', compact('titulos'));
    }

    public function create()
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        return view('titulos.create', compact('editoriales', 'autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'adelanto' => 'required|numeric',
            'ventas_totales' => 'required|integer',
            'fecha_publicacion' => 'required|date',
            'nota' => 'nullable|string',
            'editorial_id' => 'required|exists:editoriales,id',
            'autores' => 'required|array',
            'autores.*' => 'exists:autores,id',
        ]);

        // Creamos el título sin los autores
        $titulo = Titulo::create($request->except('autores'));

        // Sincronizamos la relación con los autores
        $titulo->autores()->sync($request->autores);

        return redirect()->route('titulos.index')->with('success', 'Título creado correctamente');
    }

    public function edit(Titulo $titulo)
    {
        $editoriales = Editorial::all();
        $autores = Autor::all();
        // Aseguramos que la relación "autores" esté cargada
        $titulo->load('autores');
        return view('titulos.edit', compact('titulo', 'editoriales', 'autores'));
    }

    public function update(Request $request, Titulo $titulo)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'adelanto' => 'required|numeric',
            'ventas_totales' => 'required|integer',
            'fecha_publicacion' => 'required|date',
            'nota' => 'nullable|string',
            'editorial_id' => 'required|exists:editoriales,id',
            'autores' => 'required|array',
            'autores.*' => 'exists:autores,id',
        ]);

        $titulo->update($request->except('autores'));
        $titulo->autores()->sync($request->autores);

        return redirect()->route('titulos.index')->with('success', 'Título actualizado correctamente');
    }

    public function destroy(Titulo $titulo)
    {
        $titulo->delete();
        return redirect()->route('titulos.index')->with('success', 'Título eliminado correctamente');
    }
}
