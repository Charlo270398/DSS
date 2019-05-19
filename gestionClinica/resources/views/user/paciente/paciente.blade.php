@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')

<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php use App\Util; $x = new Util(); ?>
    <title><?php echo $medico->nombre; ?></title>
</head>
<html> 
    <header style="text-align: center">
        <h1><strong>Ficha del paciente</strong></h1>
    </header>
    <body>
        <br>
        <br>     
        <div class="container">
          <table class="table table-bordered">
            <thead class="tableHeader">
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Fecha de nacimiento</th>
              </tr>
            </thead>
            <tbody>                  
              <tr>
                  <td><?php  echo $medico->nombre;?></td>
                  <td><?php  echo $medico->apellidos;?></td>
                  <td><?php  echo $medico->email;?></td>
                  <td><?php echo (substr($medico->fecha_nacimiento, 0, 2) . ' de ' . $x->meses(substr($medico->fecha_nacimiento, 3, 2)) . ' de ' . substr($medico->fecha_nacimiento, 6, 4)) ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <button type="button" onclick="window.location.href='/pacientes'" class="btn btn-primary">Volver</button>
        </div>
    </body>
</html>
@stop

