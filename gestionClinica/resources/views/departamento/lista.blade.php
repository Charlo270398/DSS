@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')

<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">
<?php 
    if($op == 'borrar'){
        $ruta = '/borrar';
        $header = 'Borrar departamento';
    }else if($op == 'editar'){
        $ruta = '/editar';
        $header = 'Editar departamento';
    }else{
        $ruta = '';
        $header = 'Especialidades médicas';
    }
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos</title>
</head>

<html>
    <header style="text-align: center">
        <h1><strong><?php echo $header;?></strong></h1>
    </header>
    <body>  
        
        <div class="container">
            <br>
            <br>
    
            <div class="btn-group-vertical" style="width: 100%;">
            <?php foreach($departamentos as $key=>$value): ?>

                
                        <button type="submit" class="btn btn-primary depbutton" onclick="window.location.href= 
                        '/departamentos/<?php echo ($value->id . $ruta);?>'"><?php echo $value->nombre;?></button>
                  
            
            <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>
@stop

