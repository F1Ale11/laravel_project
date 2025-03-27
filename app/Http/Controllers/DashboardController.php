<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Comentario;
use App\Models\Foto;
use App\Models\Editorial;
use App\Models\Titulo;
use App\Models\Venta;
use App\Models\Libreria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener datos básicos sin relaciones
        $autores      = Autor::all();
        $comentarios  = Comentario::all();
        $fotos        = Foto::all();
        $editoriales  = Editorial::all();
        $titulos      = Titulo::all();
        $ventas       = Venta::all();
        $librerias    = Libreria::all();
        
        // Obtener registros de la tabla pivote de ventas-títulos
        $ventaTitulos = DB::table('venta_titulo')->get();

        return view('dashboard', compact(
            'autores', 
            'comentarios', 
            'fotos', 
            'editoriales', 
            'titulos', 
            'ventas', 
            'librerias', 
            'ventaTitulos'
        ));
    }
}
