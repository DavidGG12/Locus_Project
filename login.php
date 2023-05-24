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
                if((validate_text($user_login) == true) && (validate_text($password) == true))
                {
                    $user_login = $_POST["user_login"];
                    $password = $_POST["password"];
                    
                    echo "lol";
                    $research = "SELECT user_name, password_user, type_user FROM user_ WHERE user_name = '$user_login' AND password_user = '$password' ;";
                    
                    $result = $con->query($research);
                    if($result->num_rows == 1)
                    {
                        header("Location: index.html");
                        exit;
                    }
                    else
                    {
                        echo "pos no";
                    }   
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
