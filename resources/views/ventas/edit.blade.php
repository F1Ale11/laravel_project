@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venta</h1>
    <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" id="fecha" value="{{ $venta->fecha }}" required>
        </div>
        <div class="mb-3">
            <label for="libreria_id" class="form-label">Librería</label>
            <select name="libreria_id" id="libreria_id" class="form-control" required>
                @foreach($librerias as $libreria)
                    <option value="{{ $libreria->id }}" @if($venta->libreria_id == $libreria->id) selected @endif>{{ $libreria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Para la sección de títulos, en este ejemplo se recomienda recrear la funcionalidad similar a create.
             Puedes iterar sobre $venta->titulos y mostrar cada título con su cantidad (desde $titulo->pivot->cantidad)
             y además permitir agregar o quitar filas. -->

        <!-- Ejemplo básico: -->
        <div id="titulos-section">
            @foreach($venta->titulos as $index => $titulo)
            <div class="row mb-2">
                <div class="col-md-6">
                    <label class="form-label">Título</label>
                    <select name="titulos[]" class="form-control" required>
                        <option value="">Selecciona un título</option>
                        @foreach($titulos as $item)
                            <option value="{{ $item->id }}" @if($item->id == $titulo->id) selected @endif>
                                {{ $item->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="cantidades[]" class="form-control" value="{{ $titulo->pivot->cantidad }}" required>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="agregarTitulo()">Agregar otro Título</button>
        <br>
        <button type="submit" class="btn btn-custom">Actualizar Venta</button>
    </form>
</div>

<script>
    function agregarTitulo() {
        const section = document.getElementById('titulos-section');
        const row = document.createElement('div');
        row.classList.add('row', 'mb-2');
        row.innerHTML = `
            <div class="col-md-6">
                <label class="form-label">Título</label>
                <select name="titulos[]" class="form-control" required>
                    <option value="">Selecciona un título</option>
                    @foreach($titulos as $titulo)
                        <option value="{{ $titulo->id }}">{{ $titulo->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Cantidad</label>
                <input type="number" name="cantidades[]" class="form-control" required>
            </div>
        `;
        section.appendChild(row);
    }
</script>
@endsection
