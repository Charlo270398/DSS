
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<?php 
    if($op == 'reservar'){
        $ruta = '/horarios';
        $head = 'Reserva de citas';
        $header = 'Seleccione un médico';
        $visible = false;
        $disp = true;
    }else if($op == 'editar'){
        $ruta = '/editar';
        $head = 'Edición';
        $header = 'Editar Médico';
        $visible = true;
        $disp = false;
    }else{
        $ruta = '';
        $head = 'Listado de Médicos';
        $header = 'Listado de Médicos';
        $visible = false;
        $disp = false;
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $head ?></title>
</head>

<html>  
    <header style="text-align: center">
        <h1>Listado de médicos</h1>
    </header>
    <body>
        <br>
        <div class="container">
            <h4>Buscador</h4>
            <div class="input-group mb-3">
                <button type="button" class="btn btn-primary" onclick="window.location.href='/medicos' + getInput()"> Buscar </button>
                <input id="myInput" type="text" class="form-control" placeholder="Nombre o apellidos" aria-label="Username" aria-describedby="basic-addon1">
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
                        <?php                
                            foreach($medicos as $value): ?>
                            <tr>
                                <td><?php  echo $value->nombre;?></td>
                                <td><?php  echo $value->apellidos;?></td>
                                <?php foreach($departamentos as $dep): 
                                    if($dep->id == $value->departamento_id){ ?>
                                    <td><a href= '/departamentos/<?php echo $value->departamento_id ?>'><?php echo $dep->nombre ?></a></td>
                                <?php } endforeach; ?>
                                <td><button type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-primary">Ver ficha</button>
                                <?php if($visible){ ?> <button id="editBtn" type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-secondary ">Editar</button>
                                <button id="deleteBtn" type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. $ruta);?>'" class="btn btn-danger ">Borrar</button>
                                <?php }else if($disp){ ?> <button id="dispBtn" type="button" onclick="window.location.href='/medico/<?php echo ($value->id. $ruta);?>'" class="btn btn-primary ">Consultar disponibilidad</button> <?php } ?></td>
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

