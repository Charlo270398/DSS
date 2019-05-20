
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
            <ul> <a class="aPanel" href="/medico/reservas"> Reservar cita </a></ul>
            <ul> <a class="aPanel" href="/citas&hoy"> Citas para hoy </a></ul>
            <ul> <a class="aPanel" href="/citas&proximas"> Citas pendientes </a></ul>
            <ul> <a class="aPanel" href="/citas&recientes"> Historial de citas </a></ul>
            <ul> <a class="aPanel" href="/historial&recientes"> Ver historial médico </a></ul>
            <ul> <a class="aPanel" href="/usuario/editar"> Editar mis datos </a></ul>
        </div>
    </body>
</html>


