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
        <?php if (!Auth::check()) {// El usuario está correctamente autentificado}?>
          <li class="nav-item">
              <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
          </li>
        <?php } else{ ?>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fas fa-door-open "></i> Logout</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>
        <?php } ?>
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
   
  <!-- Optional JavaScript  (PARA QUE FUNCIONE DROPDOWN)-->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</html
