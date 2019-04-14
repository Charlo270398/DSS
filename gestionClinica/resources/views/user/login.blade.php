@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@stop

@section('body')
            <!DOCTYPE html>
            
            
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Login</title>
            </head>
            <html>
            <br>
            <br>
            <br>
            <br>
            <header style="text-align: center">
                <h1>Inicio de sesión</h1>
            </header>
            <body>
                <br>
                <div class="container">
                    <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección de correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                        <small id="emailHelp" class="form-text text-muted">Asegurese de mantener a salvo su contraseña</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    <button type="submit" class="btn btn-info">Registrarse</button>
                    </form>
                </div>
            </body>
            </html>