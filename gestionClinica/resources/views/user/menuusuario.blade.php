
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu usuario</title>
</head>
<html>
    <header>
        <div class = "container" style="text-align: center">
            <h1><strong> Bienvenid@ <?php echo Auth::user()->nombre ?> </strong></h1>
        </div>
    </header>
    <br>
    <body>
         @include('components/menu' . $tipo->nombre) 
    </body>
</html>
@stop

