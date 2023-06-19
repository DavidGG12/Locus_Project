<?php

include('resources.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['register_colaborator']))
    {
        $con = connection();
        $email_register = validate_email($_POST['email_register_colaborator']);
        $user_register = validate_text($_POST['user_register_colaborator']);
        $password = $_POST['password_register_colaborator'];
        $password_repeat = $_POST['password_repeat_register_colaborator'];
        
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
                $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password', 3)";
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
}