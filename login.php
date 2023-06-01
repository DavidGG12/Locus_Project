<?php
    include('resources.php');
    include('views/sesion.html');

    $con = connection();
    $error = '';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user_login = validate_text($_POST['user_login']);
        $password = validate_text($_POST['password']);

        $research = "SELECT user_name, password_user, type_user FROM user_ WHERE user_name = '$user_login' AND password_user = '$password' ;";
        $result = $con -> query($research);
        
        if($result -> num_rows == 1)
        {
            $row = mysqli_fetch_assoc($result);
            if($row['type_user'] == 1)
            {
                header("Location: admin.php");
                exit;
            }
            else if($row['type_user'] == 2)
            {
                header("Location: index.php");
                exit;
            }
        }
        else
        {
            echo "Usuario no encontrado";
        }
    }