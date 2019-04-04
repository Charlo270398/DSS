<!DOCTYPE html>

    <link href="/css/form.css" rel="stylesheet">

    <!-- $tipo nos devuelve el tipo de usuario que loguea -->
    <header class = "text">
            <h2>Iniciar sesión como <?php echo $tipo ?></h2>
    </header>
    <br>
    <br>
    <form class="formdiv" id="form-login" action="#">  <!-- Hay que mirar el method=POST-->
        <div>
        <div>
            <h3><p><label for="nombre">Usuario:</label></p></h3>
            <input class="inputText" name="nombre" type="text" id="nombre" placeholder="Pon tu usuario" autofocus="" >
        </div>
        <div>
            <h3><p><label for="pass">Contraseña:</label></p></h3>
            <input class="inputText" name="pass" type="password" id="pass" class="pass" placeholder="Pon tu contraseña" ></p>
        </div>
        <br>
        <div>
            <input class="submitButton" name="submit" type="submit" id="button" value="Entrar" onclick=""/>
        </div> 
        </div>    
    </form>

</html>