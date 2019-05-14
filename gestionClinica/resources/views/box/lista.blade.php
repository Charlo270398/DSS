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
        $header = 'Borrar box';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar box';
    }else{
        $ruta = '';
        $header = 'Listado de boxess';
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boxes</title>
</head>

<html>
    <header>
        <h2><?php echo $header;?></h2>
    </header>
    <body>
        <br>
        <div class = "listDivContainer">
            <br>
            <?php foreach($departamentos as $key=>$value): ?>
                <ol class="btn-group">
                    <a href="/box/<?php echo ($value->id . $ruta);?>">
                        <button><?php echo $value->id;?></button>
                        <button id="deleteBtn" data-toggle="modal" data-target="#exampleModalCenter" type="button"  class="btn btn-danger ">Borrar box <?php echo $value->id;?></button>

                    </a>
                </ol>
            <?php endforeach; ?>
            <br>
            </div>
    </body>


</html>
@stop
