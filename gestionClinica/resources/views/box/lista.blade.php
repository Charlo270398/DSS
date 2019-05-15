@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<?php
    if($op == 'borrar'){
        $ruta = '/borrar';
        $header = 'Borrar boxes';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar box';
    }else{
        $ruta = '';
        $header = 'Listado de boxes';
    }
?>
<head>
    <link href="/css/lists.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boxes</title>
</head>

<html>

    <body>
        <br>
        <br>
        <div class = "container">
            <?php if($departamentos->count() != 0){ ?>
                <h2 style="text-align:center;"><?php echo $header;?></h2>
                <br>
                <div class="btn-group-vertical" style="width: 100%;">
                    <?php foreach($departamentos as $value): ?>
                    
                            <button onclick="window.location.href= '/box/<?php echo ($value->id);?>/borrar'" data-toggle="modal" data-target="#exampleModalCenter" type="button"  class="btn btn-danger depbutton ">Borrar box <?php echo $value->numero;?></button>
                
                    <?php endforeach; ?>
                </div>
            <?php }else{ ?>
                <h2 style="text-align:center;">La lista de boxes está vacía</h2>
            <?php } ?>
            <br>
            <br>
            <button onclick="window.location.href='/usuario'" class='btn btn-primary' >Salir</button>
        </div>
    </body>


</html>
@stop
