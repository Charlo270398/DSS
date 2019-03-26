

        @extends('layouts.master')

        @section('body')
            @parent
            <!DOCTYPE html>
            <link href="/css/home.css" rel="stylesheet">
            <html>
                <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Bienvenido a clínica Alicante</title>
                </head>

                <div>
                    <h1>Clínica Alicante</h1>
                </div>
                @include('components/slideshow') <!-- Imagenes de 1200 x 200 px -->
                <div>
                    <h2>Asistencia sanitaria de calidad</h2>
                </div>
                <div>
                    <h4>Clínica Alicante está situada en la ciudad de Alicante, ofreciendo asistencia
                    sanitaria multidisciplinar a toda la provincia de Alicante.Este 
                    centro cuenta con los mejores medios tecnológicos posibles para 
                    que los profesionales medicos puedan desarrollar su actividad
                    en el sector privado con la mayor calidad dentro de un marco de amplia
                    seguridad clínica. Sus instalaciones cuentan con una superficie total 
                    construida de 18.500 m2 contando con 106 habitaciones y 8 camas en la 
                    unidad de cuidados intensivos.</h4>
                
            </html>
        @stop
            
      