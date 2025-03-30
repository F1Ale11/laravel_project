@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard General</h1>

    <!-- Sección de Autores -->
    <section class="mb-5">
        <h2>Autores, Comentarios y Fotos</h2>
        @foreach($autores as $autor)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $autor->nombre }} {{ $autor->apellido }}</strong> (ID: {{ $autor->id }})
                </div>
                <div class="card-body">
                    <!-- Comentarios del Autor -->
                    <h5>Comentarios:</h5>
                    @php
                        $autorComentarios = $comentarios->filter(function($comentario) use ($autor) {
                            return $comentario->autor_id == $autor->id;
                        });
                    @endphp
                    @if($autorComentarios->count())
                        <ul>
                            @foreach($autorComentarios as $comentario)
                                <li>{{ $comentario->observacion }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay comentarios.</p>
                    @endif

                    <!-- Fotos del Autor -->
                    <h5>Fotos:</h5>
                    @php
                        $autorFotos = $fotos->filter(function($foto) use ($autor) {
                            return $foto->autor_id == $autor->id;
                        });
                    @endphp
                    @if($autorFotos->count())
                        <div class="d-flex flex-wrap">
                            @foreach($autorFotos as $foto)
                                <div class="m-2 text-center">
                                    <img src="{{ $foto->foto }}" alt="Foto de {{ $autor->nombre }}" style="max-width: 80px; height: auto;">
                                    <p class="small">{{ $foto->formato }} - {{ $foto->tamaño }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No hay fotos.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </section>

    <!-- Sección de Editoriales y sus Títulos -->
    <section class="mb-5">
        <h2>Editoriales y Títulos</h2>
        @foreach($editoriales as $editorial)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $editorial->nombre }}</strong> (ID: {{ $editorial->id }})
                </div>
                <div class="card-body">
                    <h5>Títulos:</h5>
                    @php
                        $editorialTitulos = $titulos->filter(function($titulo) use ($editorial) {
                            return $titulo->editorial_id == $editorial->id;
                        });
                    @endphp
                    @if($editorialTitulos->count())
                        <ul>
                            @foreach($editorialTitulos as $titulo)
                                <li>
                                    <strong>{{ $titulo->titulo }}</strong><br>
                                    Tipo: {{ $titulo->tipo }} – Precio: ${{ $titulo->precio }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay títulos.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </section>

    <!-- Sección de Ventas -->
    <section class="mb-5">
        <h2>Ventas</h2>
        @foreach($ventas as $venta)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Venta #{{ $venta->id }}</strong> - Fecha: {{ $venta->fecha }}
                </div>
                <div class="card-body">
                    @php
                        // Buscar la librería correspondiente
                        $libreria = $librerias->firstWhere('id', $venta->libreria_id);
                    @endphp
                    <p><strong>Librería:</strong> {{ $libreria ? $libreria->nombre : 'N/A' }}</p>
                    
                    <!-- Títulos vendidos en esta venta -->
                    <h5>Títulos Vendidos:</h5>
                    @php
                        $ventaItems = $ventaTitulos->filter(function($vt) use ($venta) {
                            return $vt->venta_id == $venta->id;
                        });
                    @endphp
                    @if($ventaItems->count())
                        <ul>
                            @foreach($ventaItems as $item)
                                @php
                                    $titulo = $titulos->firstWhere('id', $item->titulo_id);
                                @endphp
                                <li>
                                    {{ $titulo ? $titulo->titulo : 'Título no encontrado' }} : 
                                    {{ $item->cantidad }} unidades
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No hay títulos asignados a esta venta.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </section>
</div>
@endsection
