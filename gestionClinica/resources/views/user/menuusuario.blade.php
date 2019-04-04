
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
<link href="/css/menus.css" rel="stylesheet">
<html>
    <header>
        <div class = "title">
            <h2>Bienvenido <?php echo $user->nombre ?> </h2>
        </div>
    </header>
    <br>
    <body>
         @include('components/menu' . $tipo->nombre, array('user'=>$user)) 
    </body>
</html>
@stop

