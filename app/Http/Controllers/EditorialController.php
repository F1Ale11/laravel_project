<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Editorial;

use PDF;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales = Editorial::all();
        return view('editoriales.index', compact('editoriales'));
    }

    public function create()
    {
        return view('editoriales.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:40',
            'ciudad' => 'required|max:20',
            'estado' => 'required|max:10',
            'numero' => 'required|integer'
        ]);

        Editorial::create($validated);

        return redirect()->route('editoriales.index')
            ->with('success', 'Editorial creada correctamente');
    }

    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('editoriales.edit', compact('editorial'));
    }

    public function update(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id); // Obtiene el modelo manualmente

        $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'numero' => 'required|integer',
        ]);

        $editorial->update($request->all());

        return redirect()->route('editoriales.index')->with('success', 'Editorial editada correctamente');
    }

    public function destroy($id)
    {
        $row = editorial::find($id);
        $row->delete();
        return redirect("editoriales");
    }

    public function imprimir()
    {
        //
        $rows = Editorial::all();

        $pdf= PDF::loadView('pdf.editorial_listado',
        ['rows'=>$rows]);

        return $pdf->stream('listado-editoriales-'.date('Ymd').'.pdf');
    }
}
