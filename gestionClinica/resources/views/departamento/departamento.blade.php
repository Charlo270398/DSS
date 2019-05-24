
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
    <header style="text-align:center">
        <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
        </style>
        <h1><strong>Departamento de <?php echo $departamento->nombre; ?></strong></h1>
    </header>
    
    <br>
    <br>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <img  class="rounded-circle float-left" src='<?php echo $departamento->imagen;?>' style="width:350px; height:300px">
            </div>
            <div class="col-sm-8">
                <div class="container" style="text-align:left;">
                    <h2>Médicos asignados a este departamento</h2>
                        <br>
                        <table>
                            <tr>
                                
                                
                                
                            </tr>
                            <?php 
                                if (count($medicos)!=0){
                                    foreach($medicos as $key=>$value): ?>
                                        <a href="/medicos/<?php echo $value->id;?>">
                                            <tr>
                                                <td>
                                                <a href="/medicos/<?php echo $value->id;?>">
                                                <?php 
                                                    if($value->departamento_id == $departamento->id)
                                                        echo ($value->apellidos . ', ' . $value->nombre) ;
                                                ?></td>
                                                </a>
                                            </tr>
                                        </a> 
                            <?php endforeach;}else{?> 
                        <?php } ?>
                        </table>
                </div>
                <br>
                {{ $medicos->links() }}
                </div>
            </div>
        </div>

</html>
@stop

