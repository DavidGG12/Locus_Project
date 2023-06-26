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
            setcookie('connection', true, time() + 120, '/', '', true, true);
            return $con = new PDO("oci:dbname=".$tns, $username, $password);
        }
        catch(Exception $e)
        {
            $servername = "b6rzpd5jmxzxv6hux5yf-mysql.services.clever-cloud.com";
            $user = "unvt0coqmwyxy2pq";
            $password = "dAyf3jUN2wWWJg0U8xuz";
            $database = "b6rzpd5jmxzxv6hux5yf";
            //COLOCAR UN IF PARA MANDAR A OTRA PÁGINA DE ERROR POR SI NO CONCETA CON LA BASE DE DATOS
            setcookie('connection', true, time() + 120, '/', '', true, true);

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
            return false;
        }
    }

    function destroySession($user)
    {
        setcookie('connection', true, time() - 120, '/');
        setcookie('user', $user, time() - 60 * 60 * 24 * 30, '/');
    }

    function registerVideogames($update, $image, $title, $subtitle, $description, $version, $storage, $platform, $developer, $classification)
    {
        $con = connection();

        $research = "SELECT COUNT(*) FROM videogames WHERE title = '$title' AND subtitle = '$subtitle' AND platform_games = $platform";
        $result = $con->query($research);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        $select = $rows["COUNT(*)"];

        if(!$update)
        {
            if($select != 0)
            {
                echo "<script>alert('Juego ya existente');</script>";
            }
            else
            {
                try
                {
                    if($_COOKIE['connection'] = false)
                    {
                        $contentImage = file_get_contents($image);
                        $research = "INSERT INTO videogames (TITLE, SUBTITLE, DESCRIPTION_GAME, COVER_IMAGE, VERSION, STORAGE_GAME, PLATFORM_GAMES, DEVELOPER_GAMES, CLASSIFICATION_GAMES) 
                            VALUES ('$title', '$subtitle', '$description', $contentImage, '$version', '$storage', $platform, $developer, $classification)";
                        $result = $con->query($research);
                        echo "<script>alert('Registrado con éxito')</script>";
                    }
                    elseif($_COOKIE['connection'] = true)
                    {
                        $research = "SELECT COUNT(*) FROM videogames ";
                        $result = $con->query($research);
                        $rows = $result -> fetch(PDO::FETCH_ASSOC);
                        $id = $rows["COUNT(*)"];
                        $id++;
                        $contentImage = file_get_contents($image);
                        $research = "INSERT INTO videogames VALUES ($id, '$title', '$subtitle', '$description', $contentImage, '$version', '$storage', $platform, $developer, $classification)";
                        $result = $con->query($research);
                        echo "<script>alert('Registrado con éxito')</script>";
        
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
    }

    function registerUser($last_user, $email_register, $password_register, $password_repeat, $user_register, $type, $update)
    {
        $con = connection();

        $research = "SELECT COUNT(*) FROM user_ WHERE user_name = '$user_register' OR email = '$email_register'";
        $result = $con->query($research);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        $select = $rows["COUNT(*)"];
        
        if(!$update)
        {
            if($rows["COUNT(*)"] != 0)
            {
                echo "<script>alert('Usuario ya existente $select');</script>";
            }
            
            else if(strcasecmp($password_register, $password_repeat))
            {
                echo "<script>alert('Contraseñas no coinciden $user_register');</script>";
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
        elseif($update)
        {
            if(strcasecmp($password_register, $password_repeat))
            {
                echo "<script>alert('Contraseñas no coinciden $user_register');</script>";
            }
            
            else if(!validate_password($password_register))
            {
                echo "<script>alert('La contraseña tiene que tener mayúsculas, minúsculas, números y un carácter especial')</script>";
            }
            
            else
            {
                $research = "UPDATE user_ SET EMAIL = '$email_register', USER_NAME = '$user_register', PASSWORD_USER = '$password_register' WHERE USER_NAME = '$last_user'";
                $result = $con->query($research);
                echo "<script>alert('Actualizado con éxito $last_user')</script>";
        
                $con = null;
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