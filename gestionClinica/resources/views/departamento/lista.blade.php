
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
        $header = 'Borrar departamento';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar departamento';
    }else{
        $ruta = '';
        $header = 'Listado de departamentos';
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
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
                    <a href="/departamentos/<?php echo ($value->id . $ruta);?>">
                        <button><?php echo $value->nombre;?></button>
                    </a> 
                </ol>
            <?php endforeach; ?>
            <br>
            </div>
    </body>
</html>
@stop

