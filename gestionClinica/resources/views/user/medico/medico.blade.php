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
    <title><?php echo $medico->nombre; ?></title>
</head>
<html> 
    <header style="text-align: center">
        <h1><strong>Ficha del doctor</strong></h1>
    </header>
    <body>
        <br>
        <img  class="rounded-circle mx-auto d-block" src='/images/medicos/<?php echo $medico->nombre?>.jpg' style="width:350px; height:300px"> 
        <br>     
        <div class="container">
          <table class="table table-bordered">
            <thead class="tableHeader">
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Número de colegiado</th>
                <th>Departamento</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>                  
              <tr>
                  <td><?php  echo $medico->nombre;?></td>
                  <td><?php  echo $medico->apellidos;?></td>
                  <td><?php  echo $medico->num_colegiado;?></td>
                  <td><a href= '/departamentos/<?php echo $medico->departamento_id?>'><?php echo $departamento->nombre?></a></td>
                  <td><?php  echo $medico->email;?></td>
              </tr>
            </tbody>
          </table>
        </div>
    </body>
</html>
@stop

