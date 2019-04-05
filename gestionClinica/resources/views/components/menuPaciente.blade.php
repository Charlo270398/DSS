
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<link href="/css/menus.css" rel="stylesheet">
<html>
    <body>
        <div>
            <ul> <h2>Panel del paciente</h2></ul>
            <ul> <a class="aPanel" href="/clinica/edit"> Reservar cita </a></ul>
            <ul> <a class="aPanel" href="/clinica/edit"> Consultar citas </a></ul>
            <ul> <a class="aPanel" href="/usuario/<?php echo $user->id ?>/historial&recientes"> Ver historial </a></ul>
        </div>
    </body>
</html>


