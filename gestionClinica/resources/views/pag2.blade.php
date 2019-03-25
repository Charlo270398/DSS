@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('content')
<html>
    <head>
        <title> Pagina 2</title>
    </head>
    <body>
        <h1>¡Hola, estás en la página <?php echo $num; ?>!</h1>
        <a href="/">Volver a la página 1</a> 
    </body>
</html>
@stop

