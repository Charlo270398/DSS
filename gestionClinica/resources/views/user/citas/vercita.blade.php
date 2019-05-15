
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Información sobre la cita</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div class = "container">
            <form action="{{action('CitasController@reservar')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <h1 style="text-align:center">Resumen de la cita</h1>
                <br>
                <br>
                <table class="table table-bordered">
                  <thead class="tableHeader">
                      <tr> 
                          <th><strong>Médico</strong></th>
                          <th><strong>Departamento</strong></th>
                          <th><strong>Horario de la consulta</strong></th>
                          <th><strong>Box</strong></th>
                      </tr>
                    </thead>
                    <tbody>     
                        <tr>
                            <td><?php echo $medico->nombre . ' ' . $medico->apellidos; ?></td>
                            <td><a href= '/departamentos/<?php echo $medico->departamento_id?>'><?php echo $departamento->nombre?></a></td>
                            <td><?php echo substr($cita->fecha, 0, 10) . ' a las ' . substr($cita->fecha, -8, -3)?></td>
                            <td><?php echo  ('nº ' . $cita->box_id)?></td>
                        </tr>               
                    </tbody>
                </table>
            </form>
        </div>
       
    </body>
    
</html>
@stop