<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <style>
      /* Estilos básicos para el PDF */
      body {
        font-family: Arial, sans-serif;
        font-size: 9px;
        margin: 0.5cm;
      }
      header, footer {
        text-align: center;
      }
      main {
        margin-top: 1cm;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table, th, td {
        border: 1px solid #ddd;
      }
      th, td {
        padding: 8px;
        text-align: left;
      }
      
      /* Evitar que se cargue la fuente Glyphicons */
      @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(''); /* Sin fuente definida */
      }
    </style>
  </head>
  <body>
    <header>
      <h3>@yield('title')</h3>
    </header>
    <main>
      @yield('content')
    </main>
    <footer>
      <small>UPZ Fresnillo | <a href="http://www.upz.mx" target="_blank">www.upz.mx</a></small>
    </footer>
  </body>
</html>
