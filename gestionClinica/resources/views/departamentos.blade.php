
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <ol>
            <?php foreach($departamentos as $key=>$value): ?>
            <div class = "text">
                <a href="/departamentos/<?php echo $value->id;?>">
                      · <?php echo $value->nombre; ?></a>
            </div>
            <?php endforeach; ?>
        </ol>
    </body>
</html>
@stop

