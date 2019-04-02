<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>

<html>
  <link href="/css/main.css" rel="stylesheet">
    <nav>
        <ul class="navBar">
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
    
</html>