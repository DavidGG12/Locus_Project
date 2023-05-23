<?php
    include("connection.php");
    try
    {
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
                else
                {
                    echo "pos no";
                }
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
