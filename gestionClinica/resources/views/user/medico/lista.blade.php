@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<?php 
    $rutaModal ='';
    if($op == 'reservar'){
        $head = 'Reserva de citas';
        $header = 'Seleccione un médico';
        $visible = false;
        $disp = true;
    }else if($op == 'editar'){
        $head = 'Edición';
        $header = 'Editar Médico';
        $visible = true;
        $disp = false;
    }else{
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
                <form action="{{action('MedicosController@mostrarListaMedicosPorNombre')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-inline">
                        <button type="submit" class="btn btn-primary"> Buscar </button>
                        <input name="nombre" id="nombre"  type="text" class="form-control" placeholder="Nombre o apellidos" aria-label="Username" aria-describedby="basic-addon1">
                        <input name="op" id="op" value = "<?php echo $op ?>"  type="hidden">
                    </div>
                </form>
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
                                <td><button type="button" onclick="window.location.href='/medicos/<?php echo ($value->id);?>'" class="btn btn-primary">Ver ficha</button>
                                <?php if($visible){ ?> <button id="editBtn" type="button" onclick="window.location.href='/medicos/<?php echo ($value->id. '/editar');?>'" class="btn btn-secondary ">Editar</button>
                                <button id="deleteBtn" data-toggle="modal" data-target="#exampleModalCenter" type="button" onclick="$rutaModal='/medicos/<?php echo ($value->id. '/borrar');?>'" class="btn btn-danger ">Borrar</button>
                                <?php }else if($disp){ ?> <button id="dispBtn" type="button" onclick="window.location.href='/medico/<?php echo ($value->id. '/horarios');?>'" class="btn btn-primary ">Consultar disponibilidad</button> <?php } ?></td>
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
    </div>

    <script>
        function getInput(){
            if(document.getElementById("myInput").value != ''){
                return '&' + document.getElementById("myInput").value;
            }else{
                return '';
            }
        }
    </script>

    <!-- Modal Borrar-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Borrar médico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Seguro que quieres borrar el médico seleccionado?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Volver</button>
            <button type="button" onclick="window.location.href=$rutaModal" class="btn btn-danger">Borrar</button>
        </div>
        </div>
    </div>

</html>
@stop