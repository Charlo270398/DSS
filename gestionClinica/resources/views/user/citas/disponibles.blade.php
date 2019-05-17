@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')


<!DOCTYPE html>
<link href="/css/lists.css" rel="stylesheet">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Horas disponibles</title>
</head>

<html>
    
    <br>
        
    <header style="text-align: center">
        <h1>Citas disponibles</h1>
    </header>
    <body>
        
        <br>
        
            
        <div class="container" >

                <?php 
                if($error!=''){ ?>
                    <div class="container">
                            <div class="alert alert-danger" role="alert">
                                <?php  echo $error  ?>
                            </div>
                    </div>
                <?php } ?>
                
                <table class="table table-bordered">
                  <thead class="tableHeader" >
                    <tr>
                        <?php
                            foreach($fechas as $value): ?>
                                <th><?php echo $value[0] ?>
                            <?php endforeach
                        ?>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                        for($i=0; $i<sizeof($fechas[0][1]); $i++){ ?>
                        <tr>
                            <?php for($j=0; $j<sizeof($fechas); $j++){
                                if($fechas[$j][1][$i] == '--:--' || $fechas[$j][1][$i] == 'Hora ocupada'){?>
                                    <th><?php echo $fechas[$j][1][$i] ?></th>
                                <?php }else{?>
                                    <th><a href="/citas/confirmar/d=<?php echo substr($fechas[$j][2][$i],8,2) . '-' . substr($fechas[$j][2][$i],5,2) . '-' . substr($fechas[$j][2][$i],0,4)?>&h=<?php echo $fechas[$j][1][$i]?>&m=<?php echo $idMedico ?>"><?php echo $fechas[$j][1][$i]?></a></th>
                            <?php }} ?>
                        </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
           

        </div>
        
        <br>

    </body>
</html>
@stop

