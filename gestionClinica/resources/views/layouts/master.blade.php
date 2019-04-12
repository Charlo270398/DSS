<!-- Stored in resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  </head>
<html>
  
    
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="/home">
        <img src="/images/Logo.png" alt="CA" style="width:40px; height:40px;">
      </a>
      <ul class=" navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/departamentos"> <i class="fas fa-hospital"></i> Departamentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/medicos"><i class="fas fa-user-md"></i> Médicos</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="/medicos"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
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