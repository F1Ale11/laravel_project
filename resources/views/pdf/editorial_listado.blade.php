@extends('pdf.layout')

@section('title','Listado de Editoriales')

@section('content')
<br>
<br>
<br>
<p>Este es el listado de editoriales disponibles en el sistema</p>
<img src="{{ public_path('images/descarga.jpg') }}" alt="Logo" width="200">



<table style="width:100%; border-collapse: collapse; margin-top: 20px;">
  <thead>
    <tr style="background-color: #f2f2f2;">
      <th style="border: 1px solid #ddd; padding: 8px;">Nombre</th>
      <th style="border: 1px solid #ddd; padding: 8px;">Ciudad</th>
      <th style="border: 1px solid #ddd; padding: 8px;">Estado</th>
    </tr>
  </thead>
  <tbody>
    @forelse($rows as $editorial)
      <tr>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $editorial->nombre }}</td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $editorial->ciudad }}</td>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $editorial->estado }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="3" style="border: 1px solid #ddd; padding: 8px; text-align: center;">No se encontraron registros</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
