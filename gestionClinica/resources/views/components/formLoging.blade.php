<!DOCTYPE html>

    <link href="/css/form.css" rel="stylesheet">

    <!-- $tipo nos devuelve el tipo de usuario que loguea -->

    <form id="form-login" action="#">  <!-- Hay que mirar el method=POST-->
        <ol>
            <h3><p><label for="nombre">Usuario:</label></p></h3>
            <input name="nombre" type="text" id="nombre" placeholder="Pon tu usuario" autofocus="" ></p>
        </ol>
        <ol>
            <h3><p><label for="pass">Contraseña:</label></p></h3>
            <input name="pass" type="password" id="pass" class="pass" placeholder="Pon tu contraseña" ></p>
        </ol>
        <ol>
            <p><input class="submitButton" name="submit" type="submit" id="button" value="Entrar" onclick=""/></p>
        </ol>
        
    </form>

</html>