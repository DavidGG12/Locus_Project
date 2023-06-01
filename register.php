<?php
    include('resources.php');
    require('views/registro.html');

    $con = connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email_register = validate_email($_POST['email_register']);
        $user_register = validate_text($POST['user_register']);
        $password = $_POST['password_register'];
        $password_repeat = $_POST['password_register_repeat'];

        $research = "SELECT user_name FROM user_ WHERE user_name = '$user_register' OR email = '$email_register'";
        $result = $con->query($research);

        if($result->num_rows == 1)
        {
            echo "<script>alert('Usuario ya existente');</script>";
        }

        else if(strcasecmp($password, $password_repeat))
        {
            echo "<script>alert('Contraseñas no coinciden');</script>";
        }

        else if(!validate_password($password))
        {
            echo "<script>alert('La contraseña tiene que tener mayúsculas, minúsculas, números y un carácter especial')</script>";
        }

        else
        {
            try
            {
                $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password', 2)";
                $result = $con->query($research);
                echo "<script>alert('Registrado con éxito')</script>";
            }
            catch(Exception $e)
            {
                $e->getMessage();
                echo "<script>alert('$e')</script>";
            }
        }
    }