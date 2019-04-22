

        @extends('layouts.master')

        @section('body')
            @parent
            <!DOCTYPE html>
            
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Bienvenido a Clínica Alicante</title>
            </head>

                <header style="text-align: center">
                    <h1>Bienvenido a Clínica Alicante</h1>
                </header>

                @include('components/carousel') <!-- Imagenes de 1200 x 200 px -->
                
                <div class="container" style="margin-top:30px">
                        <div class="row">
                          <div class="col-sm-4">
                            <h2>Sobre nosotros</h2>
                            <h5>Photo of me:</h5>
                            <div class="fakeimg">Fake Image</div>
                            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
                            <h2>Dónde estamos</h2>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3128.6023092109285!2d-0.4869592496841535!3d38.35818578605269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6237009bb58a09%3A0x1c5ba53430ca8fbe!2sCl%C3%ADnica+Alicante!5e0!3m2!1ses!2ses!4v1555016635164!5m2!1ses!2ses" width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <br>
                            </div>
                          <div class="col-sm-8">
                            <h2>Asistencia sanitaria de calidad</h2>
                            <p>Clínica Alicante está situada en la ciudad de Alicante, ofreciendo asistencia
                                    sanitaria multidisciplinar a toda la provincia de Alicante.Este 
                                    centro cuenta con los mejores medios tecnológicos posibles para 
                                    que los profesionales medicos puedan desarrollar su actividad
                                    en el sector privado con la mayor calidad dentro de un marco de amplia
                                    seguridad clínica. 
                            </p>
                            <p>
                                    Nuestras instalaciones cuentan con una superficie total 
                                    construida de 18.500 m2 contando con 106 habitaciones y 8 camas en la 
                                    unidad de cuidados intensivos.
                            </p>
                            
                            <br>
                            <h2>Clínica Alicante, asistencia sanitaria personalizada y de calidad</h2>
                            <h5>Nuestros valores se definen en 3 puntos:</h5>
                            <br>
                            <h2>Unidades Especializadas</h2>
                            
                            <p>Some text..</p>
                            </div>
                        </div>
                      </div>
                      <br>

                <div class="card-footer text-right" style="margin-bottom:0; background:#343a40; color:white">
                    <p>Calle Jaime Segarra, 2</p>
                    <p>03010 Alicante (Alacant), Alicante</p>
                    <p>T. (+34) 966 81 11 11</p>
                    <p>alicante@clinicas.com</p>
                </div>
            
            </html>
        @stop
            
        