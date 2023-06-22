<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Cambiar Contraseña</title>
        <link rel="stylesheet" href="CSS/main.css" type="text/css" />
    </head>
    <body>
        <form method="post">
            <label>Usuario:</label>
            <br>
            <input type="text" name="user_login" />
            <br>
            <br>
            <label>Contraseña:</label>
            <br>
            <input type="password" name="password" />
            <br>
            <a href="">¿Has olvidado tu contraseña?</a>
            <br>
            <input type="submit" value="Iniciar Sesión" name="login">
            <br>
            <label>¿No tienes cuenta? </label><a href="registro.html">Registrate</a>
        </form>
        <?php
            include("Resources/connection.php");
            
            if(isset($_POST["login"]))
            {
                $con = connection();

                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $user_login = $_POST["user_login"];
                    $password = $_POST["password"];
                
                    $research = "SELECT user_name, password_user, type_user FROM user_ WHERE user_name = '$user_login' AND password_user = '$password' ;";
                
                    $result = $con->query($research);
                    if($result->num_rows == 1)
                    {
                        header('Location: index.php');
                        exit;
                    }
                }
                else
                {
                    echo "no";
                }
            }
        ?>
    </body>
</html>