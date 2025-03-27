@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" id="fecha" required>
        </div>
        <div class="mb-3">
            <label for="libreria_id" class="form-label">Librería</label>
            <select name="libreria_id" id="libreria_id" class="form-control" required>
                <option value="">Selecciona una librería</option>
                @foreach($librerias as $libreria)
                    <option value="{{ $libreria->id }}">{{ $libreria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <hr>
        <h4>Asignar Títulos</h4>
        <div id="titulos-section">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="titulos[]" class="form-label">Título</label>
                    <select name="titulos[]" class="form-control" required>
                        <option value="">Selecciona un título</option>
                        @foreach($titulos as $titulo)
                            <option value="{{ $titulo->id }}">{{ $titulo->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="cantidades[]" class="form-label">Cantidad</label>
                    <input type="number" name="cantidades[]" class="form-control" required>
                </div>
            </div>
        </div>
        <!-- Botón para agregar más títulos a la venta -->
        <button type="button" class="btn btn-secondary mb-3" onclick="agregarTitulo()">Agregar otro Título</button>
        <br>
        <button type="submit" class="btn btn-custom">Guardar Venta</button>
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
