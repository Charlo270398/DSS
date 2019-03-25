<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #4CAF50;
    }
  </style>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
          <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/pag2">Especialidades</a></li>
            <li><a href="/contact">Médicos</a></li>
            <li style="float:right"><a class="active" href="/about">Iniciar sesión</a></li>
          </ul> 
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>