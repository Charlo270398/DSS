
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<html>
    <body>
    <br>
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
        <div class="container">
                <ul> <h2><strong>Panel del médico</strong></h2></ul>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Citas para hoy</strong></h5>
                              <p class="card-text">Consulta las citas que han concertado los pacientes contigo para hoy. También puedes cancelarlas y añadir entradas al historial médico del paciente.</p>
                              <a href="/citas&hoy" class="btn btn-primary">Acceder</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Citas pendientes</strong></h5>
                              <p class="card-text">Si tienes alguna cita pendiente con un paciente puedes puedes consultarla aquí. También puedes cancelarlas y añadir entradas al historial médico del paciente.</p>
                              <a href="/citas&proximas" class="btn btn-primary">Acceder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Historial de citas</strong></h5>
                              <p class="card-text">Consulta el histórico de citas con tus pacientes.</p>
                              <a href="/citas&recientes" class="btn btn-primary">Acceder</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><strong>Buscar ficha de paciente</strong></h5>
                              <p class="card-text">Busca la ficha de cualquier paciente de la clínica. Puedes añadir entradas a su historial médico.</p>
                              <a href="/pacientes" class="btn btn-primary">Acceder</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>


