
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<?php
    if($op == 'borrar'){
        $ruta = '/borrar';
        $header = 'Borrar Médico';
        $visible = 'visible';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar Médico';
        $visible = 'visible';
    }else{
        $ruta = '';
        $header = 'Listado de Médicos';
        $visible = 'invisible';
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Médicos</title>
</head>

<html>  
    <header style="text-align: center">
        <h1>Cuadro médico</h1>
    </header>
    <body>
        <br>
        <div class="container">
            <div class="input-group mb-3">
                <button type="button" class="btn btn-primary" onclick="window.location.href='/medicos' + getInput()"> Buscar </button>
                <input id="myInput" type="text" class="form-control" placeholder="Buscar médico por nombre o apellidos" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <br>     
        <div class="container">
                <?php if(count($medicos)!=0){ ?>
                <table class="table table-bordered">
                  <thead class="tableHeader">
                    <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Departamento</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>                     
                        <?php  foreach($medicos as $key=>$value): ?>
                            <tr>
                                <td><?php  echo $value->nombre;?></td>
                                <td><?php  echo $value->apellidos;?></td>
                                <td><a href= '/departamentos/<?php echo $value->departamento_id?>'>
                                    <?php 
                                        if($value->departamento_id == 1)
                                            echo 'Odontología';
                                        else if($value->departamento_id == 2)
                                            echo 'Ginecología';
                                        else if($value->departamento_id == 3)
                                            echo 'Fisioterapia';
                                        else if($value->departamento_id == 4)
                                            echo 'Oncología';
                                        else if($value->departamento_id == 5)
                                            echo 'Radioterapia';
                                        else
                                             echo 'Dermatología';?>
                                </a></td>
                                <td><button type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-primary">Ver ficha</button>
                                <button id="editBtn" type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-secondary <?php echo $visible ?>">Editar</button>
                                <button id="deleteBtn" type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-danger <?php echo $visible ?>">Borrar</button></td>
                            </tr>  
                        <?php endforeach; ?>              
                  </tbody>
                </table>
                <?php }else{?>
                    <h2>Búsqueda sin resultados</h2>
                <?php } ?>
        </div>
        <br>
        {{ $medicos->links() }}
    </body>
    <script>
        function getInput(){
            if(document.getElementById("myInput").value != ''){
                return '&' + document.getElementById("myInput").value;
            }else{
                return '';
            }
        }
    </script>
</html>
@stop

