
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<html>
    <body>
    <br>
<<<<<<< HEAD
    <div class="container">
            <table class="table table-bordered" table bgcolor="blue" style="width:50%; margin:auto">
                <thead class="tableHeader">
                    <tr>
                        <th><h4 style="text-align:center"><strong>Panel del médico</strong></h4></th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered" style="width:50%; margin:auto">
                <thead class="tableHeader">
                    <tr>
                        <th><h6 style="text-align:center"><strong>Acciones</strong></h6></th>
                    </tr>
                </thead>
                <tbody style="text-align:center">                     
                    <tr>
                        <th><a href="/citas&recientes" class="btn btn-primary">Registro de citas</a></th>
                    </tr>  
                    <tr>
                        <th><a href="/citas&hoy" class="btn btn-primary">Citas para hoy</a>
                    </tr>
                    <tr>
                        <th><a href="/pacientes" class="btn btn-primary">Buscar ficha de paciente</a>    
                    </tr>    
                </tbody>
            </table>
=======
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
            <ul><a class="aPanel" href="/citas&proximas"> Citas pendientes </a></ul>
            <ul><a class="aPanel" href="/citas&hoy"> Citas para hoy </a></ul>
            <ul><a class="aPanel" href="/citas&recientes"> Historial de citas </a></ul>
            <ul><a class="aPanel" href="/pacientes"> Buscar ficha de paciente </a></ul>
>>>>>>> Develop
        </div>
    </body>
</html>


