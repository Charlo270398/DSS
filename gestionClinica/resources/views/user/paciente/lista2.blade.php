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
    <title>Buscar ficha de paciente</title>
</head>

<html>  
    <header style="text-align: center">
        <h1><strong>Buscar ficha de paciente</strong></h1>
    </header>
    <body>
        <br>
        <div class="container">
            <h4>Buscador</h4>
            <div class="input-group mb-3">
                <form action="{{action('UsuarioController@mostrarListaPacientesPorNombre')}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="form-inline">
                        <button type="submit" class="btn btn-primary"> Buscar por nombre </button>
                        <input name="nombre" id="nombre"  type="text" class="form-control" placeholder="Nombre o apellidos" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </form>
                <form action="{{action('UsuarioController@mostrarListaPacientesPorDni')}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-inline">
                            <button type="submit" class="btn btn-primary"> Buscar por DNI </button>
                            <input name="dni" id="dni"  type="text" class="form-control" placeholder="DNI" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                </form>
            </div>
        </div>
        <br>     
        <div class="container">
                <?php if(count($pacientes)!=0){ ?>
                <table class="table table-bordered">
                  <thead class="tableHeader">
                    <tr>
                      <th>DNI</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>     
                        <?php                
                            foreach($pacientes as $value): ?>
                            <tr>
                                <td><?php  echo $value->dni;?></td>
                                <td><?php  echo $value->nombre;?></td>
                                <td><?php  echo $value->apellidos;?></td>
                                <td><button type="button" onclick="window.location.href='/pacientes/<?php echo ($value->id);?>'" class="btn btn-primary">Ver ficha</button>
                                <button type="button" onclick="window.location.href='/pacientes/<?php echo ($value->id);?>/historial&recientes'" class="btn btn-success">Ver historial médico</button></td>
                            </tr>  
                        <?php endforeach; ?>              
                  </tbody>
                </table>
                <?php }else{?>
                    <h2>Búsqueda sin resultados</h2>
                <?php } ?>
        </div>
        <br>
        {{ $pacientes->links() }}
    </body>
    </div>

</html>
@stop