

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
                            <ul style="list-style-type:circle;">
                                <li><strong>Clínica con prestigio nacional.</strong></li>
                                <li><strong>Plantilla de profesionales con gran reputación.</strong></li>
                                <li><strong>Año 2018: Premio a la mejor clínica de la Comunidad Valenciana.</strong></li>
                            </ul>
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
                            <ul style="list-style-type:circle;">
                                <li><strong>Orientados y comprometidos con el paciente.</strong> Comprometidos con una forma de trabajar más justa con cada uno de nuestros pacientes, porque son ellos el motivo y el centro de nuestra actividad. Nuestro objetivo es que cada paciente reciba la atención precisa, en el momento preciso.</li>
                                <li><strong>Orientados hacia la calidad.</strong> A través de una actitud proactiva y con el objetivo de mejorar cada día el servicio que prestamos a cada paciente en cualquier ámbito de nuestra actividad. Los detalles marcan la diferencia.</li>
                                <li><strong>Orientados a la innovación y la tecnología.</strong> La tecnología como elemento facilitador de la relación con el paciente y a su vez como eje diferencial de nuestra propuesta sanitaria.</li>
                            </ul> 
                            <br>
                            </div>
                            <h2> <strong> Unidades Especializadas </strong></h2>
                            <div class="row">
                                <div class="column">
                                    <img class=" float-left" src='images/departamentos/dermatologia.jpg' style="width:350px; height:300px; border: black 5px solid;">
                                    <p><a href= '/departamentos/6'><h2>Dermatología</h2></a></p>
                                    La Dermatología es la especialidad médico-quirúrgica que se encarga del diagnóstico, tratamiento y prevención de las enfermedades de la piel, 
                                    mucosas y sus anejos (cabello y uñas). La piel es el órgano que más en contacto está 
                                    con el mundo exterior y sus agresiones, nos relaciona con los demás y, a su vez, 
                                    puede reflejar alteraciones de otros órganos internos, 
                                    por lo que es importante cuidarla y consultar cuando aparece alguna anomalía. 
                                    En Clínica Alicante intentamos escuchar al paciente para poder asesorar y dar la 
                                    mejor solución disponible a su consulta.
                                </div>
                                <div class="column">
                                    <img class=" float-left" src='images/departamentos/oncologia.jpg' style="width:350px; height:300px; border: black 5px solid;">
                                    <p><a href= '/departamentos/4'><h2>Oncología</h2></a></p>
                                    La prevención y la detección precoz son las armas más eficaces de que disponemos en la lucha contra el cáncer. Por ello, contamos con cinco programas: cáncer de mama, de pulmón, de colon, melanoma y cáncer de próstata. 
                                    Disponemos en Clinica Alicante, personal altamente cualificado, que ofrece asistencia ambulatoria especializada al paciente oncológico y hematológico. Tiene entre sus objetivos la rapidez y agilidad en la atención integral al paciente. Durante la estancia en Clínica Alicante, el personal de enfermería proporciona al paciente y a su familia la información necesaria del proceso y los cuidados que tiene que seguir, así como un contacto continuo en el el domicilio.
                                </div>
                                <div class="column">
                                   <img class=" float-left" src='images/departamentos/fisioterapia.jpg' style="width:350px; height:300px; border: black 5px solid;">
                                   <p><a href= '/departamentos/3'><h2>Fisioterapia</h2></a></p>
                                   Aplicamos tratamientos de fisioterapia específicos como fisioterapia deportiva, ecografía, electrolisis, osteopatía, readaptación biomecánica del deporte, estudio de la marcha en el corredor, la rehabilitación postquirúrgica (especializados en la rehabilitación quirúrgica por artroscopia de hombro, rodilla, cadera y tobillo).
                                   Nuestro trabajo terapéutico se caracteriza por programas individuales adaptados a sus necesidades.El camino para recuperar la fuerza que tenía antes no tiene por qué estar lleno de obstáculos. Gracias a nuestros conceptos y terapias aplicadas con el mayor cuidado posible, contribuiremos a su recuperación completa. Nuestra competencia en todas las cuestiones terapeúticas está avalada por nuestra experiencia de muchos años en todos los campos de la rehabilitación.
                                </div>
                                <div class="column">
                                    <img class="float-left" src='images/departamentos/radioterapia.jpg' style="width:350px; height:300px; border: black 5px solid;">
                                    <p><a href= '/departamentos/5'><h2>Radioterapia</h2></a></p>
                                    La radiología es la especialidad médica dedicada al diagnóstico de diversas enfermedades a través de la obtención de imágenes del interior del cuerpo humano. 
                                    Algunas de las pruebas que realizamos son:
                                    <ul style="list-style-type:none;">
                                        <li><strong>Radiología Convencional.</strong></li>
                                        <li><strong>Ecografía.</strong></li>
                                        <li><strong>Resonancia Magnética.</strong></li>
                                    </ul> 
                                </div>
                                <div class="column">
                                    <img class=" float-left" src='images/departamentos/odontologia.jpg' style="width:350px; height:300px; border: black 5px solid;">
                                    <p><a href= '/departamentos/1'><h2>Odontología</h2></a></p>
                                    <ul style="list-style-type:none;">
                                        <li><strong>Estética Dental.</strong>Esta especialidad comprende dos tratamientos significativos, el blanqueamiento dental y las carillas/incrustaciones/coronas.</li>
                                        <li><strong>Implantes Dentales.</strong>Es la parte de la Odontología que se encarga de recuperar las funciones estéticas y masticatorias derivadas de la pérdida de una o varias piezas dentales.</li>
                                        <li><strong>Endondancia.</strong>Se trata de la desvitalización del diente cuando hay una afectación del nervio para evitar el dolor y las molestias, con el fin de conservar el diente.</li>
                                        <li><strong>Ortodoncia.</strong>Corregimos una malposición, un problema de mal oclusión o de apiñamiento dental ya que esto no tiene límite de edad.</li>
                                    </ul> 
                                </div>
                                <div class="column">
                                    <img class=" float-left" src="images/departamentos/ginecologia.jpg" style="width:350px; height:300px; border: black 5px solid;">
                                    <p><a href= '/departamentos/2'><h2>Ginecología</h2></a></p>
                                    Está formado por un equipo altamente especializado de médicos, enfermeras y matronas para proveer los servicios de asistencia médica más completos en cada momento de la vida de la mujer.
                                    Ofrece a sus pacientes un cuidado integral que incluye un amplio rango de opciones de consulta y tratamientos que comprenden desde la revisión preventiva habitual hasta las más avanzadas opciones diagnósticas y de tratamiento de problemas obstétricos y ginecológicos en todas las edades.
                                    El departamento ofrece también el control habitual del embarazo que incluye una diversidad de procedimientos diagnósticos y de cribado para identificar problemas potenciales del feto así como de su adecuado crecimiento y desarrollo. Con igual esmero, cuidan de la salud de las madres para detectar y tratar cualquier complicación materna que pudiera aparecer. Nuestro trabajo en equipo permite contar con la colaboración de especialistas para proveer el mejor cuidado prenatal, intranatal y postnatal posible.
                                </div>
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
            
        