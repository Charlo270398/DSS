

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
                    <h1><strong>Bienvenido a Clínica Alicante</strong></h1>
                </header>

                @include('components/carousel') <!-- Imagenes de 1200 x 200 px -->
                
                <div class="container" style="margin-top:30px;">
                        <div class="row">
                          <div class="col-sm-4" >
                            <h3><strong>Sobre nosotros</strong></h3>
                            <ul style="font-family:verdana;" style="list-style-type:circle;">
                                <li>Clínica con prestigio nacional.</li>
                                <li>Plantilla de profesionales con gran reputación.</li>
                                <li>Año 2018: Premio a la mejor clínica de la Comunidad Valenciana.</li>
                            </ul>
                            <h3><strong>Dónde estamos</strong></h3>
                            <br>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3128.6023092109285!2d-0.4869592496841535!3d38.35818578605269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6237009bb58a09%3A0x1c5ba53430ca8fbe!2sCl%C3%ADnica+Alicante!5e0!3m2!1ses!2ses!4v1555016635164!5m2!1ses!2ses" width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <br>
                            </div>
                          <div class="col-sm-8" style="margin-top:30px;">
                            <h2><strong>Asistencia sanitaria de calidad</strong></h2>
                            <p style="font-family:verdana;">Clínica Alicante está situada en la ciudad de Alicante, ofreciendo asistencia
                                    sanitaria multidisciplinar a toda la provincia de Alicante.Este 
                                    centro cuenta con los mejores medios tecnológicos posibles para 
                                    que los profesionales medicos puedan desarrollar su actividad
                                    en el sector privado con la mayor calidad dentro de un marco de amplia
                                    seguridad clínica. 
                            </p>
                            <p style="font-family:verdana;">
                                    Nuestras instalaciones cuentan con una superficie total 
                                    construida de 18.500 m2 contando con 106 habitaciones y 8 camas en la 
                                    unidad de cuidados intensivos.
                            </p>
                            
                            <h2><strong>Clínica Alicante, asistencia sanitaria personalizada y de calidad</strong></h2>
                            <br>
                            <h5 style="font-family:verdana;">Nuestros valores se definen en 3 puntos:</h5>
                            <ul style="list-style-type:circle;">
                                <li style="font-family:verdana;"><strong>Orientados y comprometidos con el paciente.</strong> Comprometidos con una forma de trabajar más justa con cada uno de nuestros pacientes, porque son ellos el motivo y el centro de nuestra actividad. Nuestro objetivo es que cada paciente reciba la atención precisa, en el momento preciso.</li>
                                <li style="font-family:verdana;"><strong>Orientados hacia la calidad.</strong> A través de una actitud proactiva y con el objetivo de mejorar cada día el servicio que prestamos a cada paciente en cualquier ámbito de nuestra actividad. Los detalles marcan la diferencia.</li>
                                <li style="font-family:verdana;"><strong>Orientados a la innovación y la tecnología.</strong> La tecnología como elemento facilitador de la relación con el paciente y a su vez como eje diferencial de nuestra propuesta sanitaria.</li>
                            </ul> 
                            <br>
                            </div>
                            <div class="col-sm-4" >
                            <h4><strong>Descargate la App de Clínica Alicante ya disponible para nuestros pacientes.</strong></h4>
                            <h5>Clínica Alicante cuida del paciente.</h5>
                            <br>
                            <img  class="float-left" src='/images/app.png' style="width:350px; height:300px">
                            <img  class="float-left" src='/images/appstore.jpg' style="width:175px; height:150x">
                            </div>
                            <div class="col-sm-8" style="margin-top:30px;">
                            <h2><strong>Departamentos y Centros</strong></h2>
                            <p style="font-family:verdana;"> Contamos con diversidad de departamentos para cubrir
                                                             las necesidades de nuestros pacientes.Alicante
                                                             <br>
                                                             Puedes consultar nuestros departamentos en las sección
                                                             de Departamentos.
                            </p>
                            <center>
                            <img  class="text-align: center" src='/images/fotoclinica.png' style="width:350px; height:300px">
                            </center>
                            <br><br>
                            <h4><strong>Atención brindada por un equipo</strong></h4>
                            <p style="font-family:verdana;"> Los médicos de Clínica Alicante se asesoran mutuamente.
                                                             Colaboran como miembros de un equipo.
                                                             <br>
                                                             En Clínica Alicante, no obtienes solo una opinión,
                                                             sino varias opiniones. 
                                                             <br>
                                                             Clínica Alicante se encarga de reclutar los mejores médicos para el 
                                                             bienestar y satisfacción de sus pacientes.
                            </p>
                            <center>
                            <img  class="text-align: center" src='/images/plantilla.jpg' style="width:350px; height:300px">
                            </center>
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
            
        