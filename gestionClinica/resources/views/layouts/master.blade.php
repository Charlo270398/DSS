<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<html>
  
    
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="/home">
        <img src="/images/Logo.png" alt="CA" style="width:40px;">
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/departamentos">Departamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/medicos">Médicos</a>
        </li>
      </ul>
  </nav>

  <br>
  <br>
  <br>
  <br>

  <body style="background-color: rgb(224, 247, 231)">
     @section('body')
     @show
  </body>

</html