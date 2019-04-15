
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
         <h1>Departamento de <?php echo $departamento->nombre; ?></h1>
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
                                    <h2>Lista de médicos</h2>
                                        <?php 
                                            if (count($medicos)!=0){
                                                foreach($medicos as $key=>$value): ?>
                                                
                                                    <a href="/medicos/<?php echo $value->id;?>">
                                                    <?php 
                                                        if($value->departamento_id == $departamento->id)
                                                            echo ($value->apellidos . ', ' . $value->nombre) ;
                                                    ?>
                                                    </a> 
                                                    <br>
                                                
                                            <?php endforeach;}else{?> 
                                        <?php } ?>
                                </div>
                                <br>
                                {{ $medicos->links() }}
                                </div>
                            </div>
                        </div>

</html>
@stop

