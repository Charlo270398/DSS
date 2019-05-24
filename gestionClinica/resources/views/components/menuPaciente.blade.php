
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<html>
    <body>
        <?php
        if($citas > 0){ ?>
               <div class="container">
                    <div class="alert alert-success" role="alert">
                        <?php if($citas == 1){
                            echo "Recuerda que hoy tienes $citas cita concertada,";
                        }else{
                            echo "Recuerda que hoy tienes $citas citas concertadas,";
                        }  ?>
                        <a href="/citas&hoy">  pulsa aquí</a>
                        <?php if($citas == 1){echo 'para consultarla.';}else{echo 'para consultarlas.';}?>
                     </div>
            </div>
        <?php } ?>
        <br>
        <div class="container">
                <ul> <h2><strong>Panel del paciente</strong></h2></ul>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Reservar cita</strong></h5>
                              <p class="card-text">Reserva citas en la próxima semana con el médico que desees. Una vez selecciones fecha debes indicar
                              el motivo de la consulta.</p>
                              <a href="/medico/reservas" class="btn btn-primary">Acceder</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Citas para hoy</strong></h5>
                              <p class="card-text">Si tienes alguna cita pendiente para hoy puedes consultarla aquí.</p>
                              <a href="/citas&hoy" class="btn btn-primary">Acceder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Ver historial médico</strong></h5>
                              <p class="card-text">Consulta tu historial médico, en el que puedes ver todas las entradas que se han realizado en él.</p>
                              <a href="/historial&recientes" class="btn btn-primary">Acceder</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Citas pendientes</strong></h5>
                              <p class="card-text">Consulta las citas pendientes que tienes por delante. Si lo deseas puedes cancelarlas.</p>
                              <a href="/citas&proximas" class="btn btn-primary">Acceder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Editar mis datos</strong></h5>
                              <p class="card-text">Edita tus datos de usuario como nombre o contraseña.</p>
                              <a href="/usuario/editar" class="btn btn-primary">Acceder</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Historial de citas</strong></h5>
                              <p class="card-text">Aquí se muestra un histórico de todas las citas que has concertado.</p>
                              <a href="/citas&recientes" class="btn btn-primary">Acceder</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>


