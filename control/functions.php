<?php
    function connection()
    {
        try
        {
            $tns = "
                (DESCRIPTION =
                    (ADDRESS_LIST =
                        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                    )
                    (CONNECT_DATA =
                        (SERVICE_NAME = xe)
                    )
                )
            ";

            $username = 'C##dokx';
            $password = 'show16ME890';
            setcookie('connection', true, time() + 120, '/');
            return $con = new PDO("oci:dbname=".$tns, $username, $password);
        }
        catch(Exception $e)
        {
            $servername = "b6rzpd5jmxzxv6hux5yf-mysql.services.clever-cloud.com";
            $user = "unvt0coqmwyxy2pq";
            $password = "dAyf3jUN2wWWJg0U8xuz";
            $database = "b6rzpd5jmxzxv6hux5yf";
            //COLOCAR UN IF PARA MANDAR A OTRA PÁGINA DE ERROR POR SI NO CONCETA CON LA BASE DE DATOS
            setcookie('connection', false, time() + 120, '/');

            return $con = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
        }
    } 

    function validate_text($text)
    {
        $text = trim($text);
        //$text = filter_var($text, FILTER_SANITIZE_STRING);
        $text = htmlspecialchars($text);

        return $text;
    }

    function validate_email($email)
    {
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $email = $email ? filter_var($email, FILTER_VALIDATE_EMAIL) : false;

        return $email;
    }

    function validate_password($password)
    {
        $bool = false;

        $er = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$!%&*?])[a-zA-Z\d@#$!%&*?]{8,100}$/';

        return (preg_match($er, $password)) ? $password : $bool;
    }

    function setSession($user)
    { 
        setcookie('user', $user, time() + 60 * 60 * 24 * 30, '/');
    }

    function getSession()
    {
        if(isset($_COOKIE['user']))
        {
            session_start();
            $_SESSION['user'] = $_COOKIE['user'];
            return $_SESSION['user'];
        }
        else
        {
            return "No session";
        }
    }

    function destroySession($user)
    {
        setcookie('connection', true, time() - 120, '/');
        setcookie('user', $user, time() - 60 * 60 * 24 * 30, '/');
    }

    function registerUser($email_register, $password_register, $password_repeat, $user_register, $type)
    {
        $con = connection();

        $research = "SELECT user_name FROM user_ WHERE user_name = '$user_register' OR email = '$email_register'";
        $result = $con->query($research);

        if($result->rowCount() == 1)
        {
            echo "<script>alert('Usuario ya existente');</script>";
        }
        
        else if(strcasecmp($password_register, $password_repeat))
        {
            echo "<script>alert('Contraseñas no coinciden');</script>";
        }
        
        else if(!validate_password($password_register))
        {
            echo "<script>alert('La contraseña tiene que tener mayúsculas, minúsculas, números y un carácter especial')</script>";
        }
        
        else
        {
            try
            {
                if($_COOKIE['connection'] = false)
                {
                    $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password_register', '$type')";
                    $result = $con->query($research);
                    echo "<script>alert('Registrado con éxito')</script>";
                }
                elseif($_COOKIE['connection'] = true)
                {
                    $research = "SELECT COUNT(*) FROM user_ ";
                    $result = $con->query($research);
                    $rows = $result -> fetch(PDO::FETCH_ASSOC);
                    $id = $rows["COUNT(*)"];
                    $id++;
                    $research = "INSERT INTO user_ VALUES ('$id', '$email_register', '$user_register', '$password_register', '$type')";
                    $result = $con->query($research);

                    // $research = "COMMIT";
                    // $result = $con->query($research);
                    echo "<script>alert('Registrado con éxito')</script>";

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
    }

    function deleteUser($user)
    {
        $con = connection();

        $research = "DELETE FROM user_ WHERE USER_NAME = '$user'";
        $execute = $con->query($research);

        $con = null;

        echo "<script>alert('Borrado con éxito')</script>";
    }
?>