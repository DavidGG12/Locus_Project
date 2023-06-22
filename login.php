<?php
    include_once('functions.php');
    
    $con = connection();
    $error = '';
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user_login = validate_text($_POST['user_login']);
        $password = validate_text($_POST['password']);
        
        $research = "SELECT USER_NAME, PASSWORD_USER FROM user_ WHERE USER_NAME = '$user_login' AND PASSWORD_USER = '$password'";
        $result = $con -> query($research);
        $rows = $result->fetchAll();
        $login = count($rows);
        
        if($login == 1)
        {
            setSession($user_login);
            
            $research_type = "SELECT TYPE_USER FROM user_ WHERE USER_NAME = '$user_login'";
            $result_type = $con -> query($research_type);

            $row = $result_type -> fetch(PDO::FETCH_ASSOC);
            if($row['TYPE_USER'] == 1)
            {
                $con = null;

                header("Location: admin.php");
                exit;
            }
            else if($row['TYPE_USER'] == 2)
            {
                $con = null;

                header("Location: index.php");
                exit;
            }
        }
        else
        {
            echo "Usuario no encontrado";
            
            $con = null;
        }
    }
    
    include('sesion.html');