<?php
    include("connection.php");
    include('resources.php');
    
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
                if(!strcasecmp($password, $password_repeat))
                {
                    echo "Contraseñas no coinciden.";
                }
                else
                {
                    try
                    {
                        if(validate_password($password) == true)
                        {
                            $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password', 2)";
                            $result = $con->query($research);
                            echo "Registrado con éxito";
                        }
                        else
                        {
                            echo "<script>alert('La contraseña tiene que tener mayúsculas, minúsculas, números y un carácter especial')</script>";
                        }
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