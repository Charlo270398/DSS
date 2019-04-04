
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div>
            <h2>Listado de departamentos</h2>
        </div>
        <br>
        <div class = "listdiv">
            <br>
            <?php foreach($departamentos as $key=>$value): ?>
                <ol class="btn-group">
                    <a href="/departamentos/<?php echo $value->id;?>">
                        <button><?php echo $value->nombre;?></button>
                    </a> 
                </ol>
            <?php endforeach; ?>
            <br>
            </div>
    </body>
</html>
@stop

