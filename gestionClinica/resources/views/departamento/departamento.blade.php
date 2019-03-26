
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $departamento->nombre; ?></title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <ol>
            <div class = "text">
                <h2>Departamento de <?php echo $departamento->nombre; ?></h2>
            </div>
        </ol>
    </body>
</html>
@stop

