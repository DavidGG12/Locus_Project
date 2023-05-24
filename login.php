<?php
    include("connection.php");
    include("resources.php");
    
    try
    {
        if(isset($_POST["login"]))
        {
            $con = connection();
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if((!validate_text($user_login)) && (!validate_text($password)))
                {
                    echo "<script>alert('Alguno de los campos está vacío')</script>"; 
                    header("Location: sesion.html");
                }

                $user_login = $_POST["user_login"];
                $password = $_POST["password"];
                
                $research = "SELECT user_name, password_user, type_user FROM user_ WHERE user_name = '$user_login' AND password_user = '$password' ;";
                
                $result = $con->query($research);

                if($result->num_rows != 1)
                {
                    echo "<script>alert('Usuario no encontrado')</script>"; 
                    header("Location: sesion.html");
                }
                else
                {
                    header("Location: index.html");
                    exit;
                }    
            }
            else
            {
                echo "<script>alert('Error')</script>"; 
                header("Location: sesion.html");
            }
        }
    }
    catch (ErrorException $e)
    {
        echo "<script>alert($e)</script>"; 
        header("Location: sesion.html");
    }  
?>
