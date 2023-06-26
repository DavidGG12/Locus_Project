<?php

include('functions.php');

$con = connection();
$data = json_decode($_GET['data']);

$last_user = $data['LAST_USER'];
$user_name = $data['USER_NAME'];
$email = $data['EMAIL'];
$password = $data['PASSWORD'];
$password_repeat = $data['PASSWORD_REPEATE'];

$email = validate_email($email);
$user_name = validate_text($user_name);

$research = "SELECT user_name FROM user_ WHERE user_name = '$user_name' OR email = '$email'";
$result = $con->query($research);

if($result->rowCount() == 1)
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
        if($_COOKIE['connection'] = false)
        {
            $research = "UPDATE user_ SET EMAIL = '$email', USER_NAME = '$user_name', PASSWORD_USER = '$password' WHERE USER_NAME = '$last_user'";
            $result = $con->query($research);
            echo "<script>alert('Actualizado con éxito')</script>";
        }
        elseif($_COOKIE['connection'] = true)
        {
            $research = "UPDATE user_ SET EMAIL = '$email', USER_NAME = '$user_name', PASSWORD_USER = '$password' WHERE USER_NAME = '$last_user'";
            $result = $con->query($research);

            // $research = "COMMIT";
            // $result = $con->query($research);
            echo "<script>alert('Actualizado con éxito')</script>";

            $con = null;
        }
        else
        {
            echo "<script>alert('Ni modo')</script>";
        }
    }
    catch(Exception $e)
    {
        $e->getMessage();
        echo "<script>alert('$e')</script>";
    }
}

?>