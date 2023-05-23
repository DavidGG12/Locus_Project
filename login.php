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
                $user_login = $_POST["user_login"];
                $password = $_POST["password"];
                
                echo "lol";
                $research = "SELECT user_name, password_user, type_user FROM user_ WHERE user_name = '$user_login' AND password_user = '$password' ;";
                
                $result = $con->query($research);
                if($result->num_rows == 1)
                {
                    header("Location: registro.html");
                    exit;
                }
                else
                {
                    echo "pos no";
                }   
                /*
                if((validate_text($user_login) == false) && (validate_text($password) == false))
                {
                }
                else
                {
                    echo "pos no";
                }*/
            }
            else
            {
                echo "no";
            }
        }
    }
    catch (ErrorException $e)
    {
        echo $e->getMessage();
    }  
?>
