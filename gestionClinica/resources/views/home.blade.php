

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

                <header>
                    <h1>Clínica Alicante</h1>
                </header>
                @include('components/slideshow') <!-- Imagenes de 1200 x 200 px -->
                <div>
                    <h2>Asistencia sanitaria de calidad</h2>
                    <h4>Clínica Alicante está situada en la ciudad de Alicante, ofreciendo asistencia
                    sanitaria multidisciplinar a toda la provincia de Alicante.Este 
                    centro cuenta con los mejores medios tecnológicos posibles para 
                    que los profesionales medicos puedan desarrollar su actividad
                    en el sector privado con la mayor calidad dentro de un marco de amplia
                    seguridad clínica. Sus instalaciones cuentan con una superficie total 
                    construida de 18.500 m2 contando con 106 habitaciones y 8 camas en la 
                    unidad de cuidados intensivos.</h4>
                </div>
                <div>
                    <h2>Clínica Alicante, asistencia sanitaria personalizada y de calidad</h2>
                        <h3>Nuestros valores se definen en 3 puntos:</h3>
                            <li class="liTexto"><strong>Orientados y comprometidos con el paciente.</strong> Comprometidos con una forma de trabajar más justa con cada uno de nuestros pacientes, porque son ellos el motivo y el centro de nuestra actividad. Nuestro objetivo es que cada paciente reciba la atención precisa, en el momento preciso.</li>
                            <li class="liTexto"><strong>Orientados hacia la calidad.</strong> A través de una actitud proactiva y con el objetivo de mejorar cada día el servicio que prestamos a cada paciente en cualquier ámbito de nuestra actividad. Los detalles marcan la diferencia.</li>
                            <li class="liTexto"><strong>Orientados a la innovación y la tecnología.</strong> La tecnología como elemento facilitador de la relación con el paciente y a su vez como eje diferencial de nuestra propuesta sanitaria.</li>
                </div>
                <footer>
                    <p>C/ Doctor Santiago Ramón y Cajal, 7</p>
                    <p>03503 Benidorm (Alicante)</p>
                    <p>T. (+34) 966 81 11 11</p>
                    <p>alicante@clinicas.com</p>
                </footer>
            </html>
        @stop
            
      