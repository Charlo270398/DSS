
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<html>
    <body>
        <div>
            <ul> <h2>Panel del paciente</h2></ul>
            <ul> <a class="aPanel" href="/usuario/<?php echo $user->id ?>/citas/disponibles&1"> Reservar cita </a></ul>
            <ul> <a class="aPanel" href="/usuario/<?php echo $user->id ?>/citas&recientes"> Consultar citas </a></ul>
            <ul> <a class="aPanel" href="/usuario/<?php echo $user->id ?>/historial&recientes"> Ver historial </a></ul>
        </div>
    </body>
</html>


