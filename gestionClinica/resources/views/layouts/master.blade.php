<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>

<html>
    <nav>
        <link href="/css/navbar.css" rel="stylesheet">
          <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/pag2">Especialidades</a></li>
            <li><a href="/contact">Médicos</a></li>
            <li style="float:right"><a class="active" href="/about">Iniciar sesión</a></li>
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