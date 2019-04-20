
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administrador</title>
</head>
<html>
    <body>
        
        <div class='container'>
            <table class="table table-bordered" style="width:50%; margin:auto">
                <thead class="tableHeader">
                    <tr>
                        <th style="width:25%"><h5 style="text-align:center"><strong>Elemento</strong></h5></th>
                        <th><h5 style="text-align:center"><strong>Acciones</strong></h5></th>
                    </tr>
                </thead>
                <tbody>                     
                    <tr>
                        <th>Clínica</th>
                        <th><button class="btn btn-primary">Editar</button></th>
                    </tr>  
                    <tr>
                        <th>Departamentos</th>
                        <th><button class="btn btn-primary">Editar</button></th>
                    </tr>
                    <tr>
                        <th>Boxes</th>
                        <th><button class="btn btn-primary">Editar</button></th>
                    </tr>  
                    <tr>
                        <th>Medicos</th>
                        <th><button class="btn btn-primary">Editar</button></th>
                    </tr>  
                </tbody>
            </table>
        </div>
        <div>
            <ul> <h2>Panel del administrador</h2></ul>
            <ul> <h4>Clínica: <a class="aPanel" href="/clinica/edit"> Editar </a>    </h4></ul>
            <ul> <h4>Departamentos:  <a class="aPanel" href="/departamento/add"> Añadir </a> <a class="aPanel" href="/departamentos/editList"> Editar </a> <a class="aPanel" href="/departamentos/deleteList"> Borrar </a>    </h4></ul>
            <ul> <h4>Boxes: <a class="aPanel" href="/box/add"> Añadir </a> <a class="aPanel" href="/box/delete"> Borrar </a>    </h4></ul>
            <ul> <h4>Medicos: <a class="aPanel" href="/medico/add"> Dar de alta </a> <a class="aPanel" href="/medico/editList"> Editar </a>  <a class="aPanel" href="/medico/deleteList"> Dar de baja </a>   </h4></ul>
        </div>
    </body>
</html>


