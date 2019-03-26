<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>

<html>
  <link href="/css/navbar.css" rel="stylesheet">
    <nav>
          <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/pag2">Especialidades</a></li>
            <li><a href="/contact">Médicos</a></li>
            <li style="float:right"><a class="active" href="/about">Portal Paciente</a></li>
            <li style="float:right"><a class="active" href="/about">Portal Médico</a></li>
          </ul> 
    </nav>
    <body>
        @section('body')
        @show
    </body>
    <footer class = "navbar">
      <ul>
        <p>Footer</p>
      </ul>
    </footer>
</html>