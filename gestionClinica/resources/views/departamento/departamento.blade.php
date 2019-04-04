
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
        <br>
        <?php if(strcmp($departamento->nombre,"Odontología")==0){ ?>
            <center><img src="/images/odontologia.jpg" style="width:1000px;height:375px;"></center>
        <?php } elseif(strcmp($departamento->nombre,"Ginecología")==0){ ?>
            <center><img src="/images/ginecologia.jpg" style="width:1000px;height:375px;"></center>
        <?php } elseif(strcmp($departamento->nombre,"Fisioterapia")==0){ ?>
            <center><img src="/images/fisioterapia.jpg" style="width:1000px;height:375px;"></center>
        <?php } elseif(strcmp($departamento->nombre,"Oncología")==0){ ?>
            <center><img src="/images/oncologia.jpg" style="width:1000px;height:375px;"></center>
        <?php } elseif(strcmp($departamento->nombre,"Radioterapia")==0){ ?>
            <center><img src="/images/radioterapia.jpg" style="width:1000px;height:375px;"></center>
        <?php } elseif(strcmp($departamento->nombre,"Dermatología")==0){ ?>
            <center><img src="/images/dermatologia.jpg" style="width:1000px;height:375px;"></center>
        <?php } ?>    
        <br>
        <br>
        <div class="listdiv">
            <?php 
                if (count($medicos)!=0){
                    foreach($medicos as $key=>$value): ?>
                    <ol>
                        <a href="/medicos/<?php echo $value->id;?>">
                        <?php 
                            if($value->departamento_id == $departamento->id)
                                echo ($value->apellidos . ', ' . $value->nombre) ;
                        ?>
                        </a> 
                    </ol>
            <?php endforeach;}else{?> 
            <?php } ?>
        </div>
        <br>
        {{ $medicos->links() }}
    </body>
</html>
@stop

