<?php
    require('functions.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['register_user']))
        {
            $email_register = validate_email($_POST['email_register']);
            $user_register = validate_text($_POST['user_register']);
            $password = $_POST['password_register'];
            $password_repeat = $_POST['password_register_repeat'];

            registerUser($email_register, $password, $password_repeat, $user_register, 2);
        }
        elseif(isset($_POST['register_colaborator']))
        {
            $email_register_colaborator = validate_email($_POST['email_register_colaborator']);
            $user_register_colaborator = validate_text($_POST['user_register_colaborator']);
            $password_colaborator = $_POST['password_register_colaborator'];
            $password_repeat_colaborator = $_POST['password_repeat_register_colaborator'];

            registerUser($email_register_colaborator, $password_colaborator, $password_repeat_colaborator, $user_register_colaborator, 3);
        }
    }
    
    //require('registro.html');
?>