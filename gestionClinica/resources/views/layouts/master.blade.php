<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>

<html>
  <link href="/css/main.css" rel="stylesheet">
    <nav>
        <ul>
          <li><a href="/">Inicio</a></li>
          <li><a href="/departamentos">Especialidades</a></li>
          <li><a href="/medicos">Médicos</a></li>
          <li style="float:right"><a href="/login/paciente">Portal Paciente</a></li>
          <li style="float:right"><a href="/login/medico">Portal Médico</a></li>
        </ul> 
    </nav>
    <body>
        @section('body')
        @show
    </body>
    
    <footer>
      <h6>C/ Doctor Santiago Ramón y Cajal, 7</h6>
      <h6>03503 Benidorm (Alicante)</h6>
      <h6>T. (+34) 966 81 11 11</h6>
      <h6>alicante@clinicas.com</h6>
    </footer>
    
</html>