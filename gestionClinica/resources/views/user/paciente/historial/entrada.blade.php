
@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Historial Médico</title>
</head>
<link href="/css/lists.css" rel="stylesheet">
<html>
    <body>
        <div class = "container">
            <form action="{{action('CitasController@reservar')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <h1 style="text-align:center">FICHA DE IDENTIFICACIÓN</h1>
                <br>
                <br>
                <table class="table table-bordered">
                  <thead class="tableHeader">
                      <tr> 
                          <th><strong>Nombre</strong></th>
                          <th><strong>Apellidos</strong></th>
                          <th><strong>Fecha de nacimiento</strong></th>
                          <th><strong>Contacto</strong></th>
                      </tr>
                    </thead>
                    <tbody>     
                        <tr>
                           <!-- FALTA POR COMPLETAR -->
                        </tr>               
                    </tbody>
                </table>
            </form>
        </div>
       
    </body>
    
</html>
@stop