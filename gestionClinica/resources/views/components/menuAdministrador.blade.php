
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
                                <th><h4 style="text-align:center"><strong>Panel del administrador</strong></h4></th>
                            </tr>
                        </thead>
                    </table>
            <table class="table table-bordered" style="width:50%; margin:auto">
                <thead class="tableHeader">
                    <tr>
                        <th style="width:25%"><h6 style="text-align:center"><strong>Elemento</strong></h6></th>
                        <th><h6 style="text-align:center"><strong>Acciones</strong></h6></th>
                    </tr>
                </thead>
                <tbody style="text-align:center">                     
                    <tr>
                        <th>Clínica</th>
                        <th><a href="/clinica/edit" class="btn btn-primary">Editar</a></th>
                    </tr>  
                    <tr>
                        <th>Departamentos</th>
                        <th><a href="/departamento/add" class="btn btn-primary">Añadir</a>
                        <a href="/departamentos/editList" class="btn btn-primary">Editar/Eliminar</a></th>
                    </tr>
                    <tr>
                        <th>Boxes</th>
                        <th><a href="/box/add" class="btn btn-primary">Añadir</a>
                        <a href="/box/deleteList" class="btn btn-primary">Eliminar</a></th>
                    </tr>  
                    <tr>
                        <th>Medicos</th>
                        <th><a href="/medico/add" class="btn btn-primary">Dar de alta</a>
                        <a href="/medico/editList" class="btn btn-primary">Editar/Dar de baja</a></th>
                    </tr>  
                </tbody>
            </table>
        </div>
    </body>
</html>


