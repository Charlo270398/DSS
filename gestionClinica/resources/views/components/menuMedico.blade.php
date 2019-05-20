
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
            <ul><h2><strong>Panel del médico</strong></h2></ul>
            <ul><a class="aPanel" href="/citas&recientes"> Registro de citas </a></ul>
            <ul><a class="aPanel" href="/citas&hoy"> Citas para hoy </a></ul>
            <ul><a class="aPanel" href="/pacientes"> Buscar ficha de paciente </a></ul>
        </div>
    </body>
</html>


