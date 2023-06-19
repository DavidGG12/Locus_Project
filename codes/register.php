<?php
    include('resources.php');
    
    $con = connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email_register = validate_email($_POST['email_register']);
        $user_register = validate_text($_POST['user_register']);
        $password = $_POST['password_register'];
        $password_repeat = $_POST['password_register_repeat'];
        
        $research = "SELECT user_name FROM user_ WHERE user_name = '$user_register' OR email = '$email_register'";
        $result = $con->query($research);
        
        if($result->num_rows == 1)
        {
            echo "<script>alert('Usuario ya existente');</script>";

            connectionClose($con);
        }
        
        else if(strcasecmp($password, $password_repeat))
        {
            echo "<script>alert('Contraseñas no coinciden');</script>";

            connectionClose($con);
        }
        
        else if(!validate_password($password))
        {
            echo "<script>alert('La contraseña tiene que tener mayúsculas, minúsculas, números y un carácter especial')</script>";

            connectionClose($con);
        }
        
        else
        {
            try
            {
                $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password', 2)";
                $result = $con->query($research);
                echo "<script>alert('Registrado con éxito')</script>";

                connectionClose($con);
            }
            catch(Exception $e)
            {
                $e->getMessage();
                echo "<script>alert('$e')</script>";

                connectionClose($con);
            }
        }
    }
    
    //require('views/registro.html');