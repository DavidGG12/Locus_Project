<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registrar</title>
        <link rel="stylesheet" href="CSS/main.css" type="text/css" />
    </head>
    <body>
        <form method="post">
            <label>Email:</label>
            <br>
            <input type="text" name="email_register" />
            <br>
            <br>
            <label>Usuario:</label>
            <br>
            <input type="text" name="user_register" />
            <br>
            <br>
            <label>Contraseña:</label>
            <br>
            <input type="password" name="password_register" />
            <br>
            <br>
            <label>Repetir Contraseña:</label>
            <br>
            <input type="password" name="password_repeat_register" />
            <br>
            <input type="submit" value="Registrar" name="register">
        </form>
        <?php
            include("Resources/connection.php");
            
            if(isset($_POST["register"]))
            {
                $con = connection();

                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $email_register = $_POST["email_register"];
                    $user_register = $_POST["user_register"];
                    $password = $_POST["password_register"];
                    $password_repeat = $_POST["password_repeat_register"];
                
                    $research = "SELECT user_name FROM user_ WHERE user_name = '$user_register';";
                
                    $result = $con->query($research);
                    if($result->num_rows == 1)
                    {
                        echo "Usuario ya existente.";
                    }
                    else
                    {
                        if(strcasecmp($password, $password_repeat))
                        {
                            echo "Contraseñas no coinciden.";
                        }
                        else
                        {
                            try
                            {
                                $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password', 2)";
                                $result = $con->query($research);
                                echo "Registrado con éxito";
                            }
                            catch(Exception $e)
                            {
                                echo $e->getMessage();
                            }
                        }
                    }
                }
                else
                {
                    header("Location: login.php");
                    exit;
                }
            } 
        ?>
    </body>
</html>