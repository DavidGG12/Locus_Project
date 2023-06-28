<?php
    global $oracle;
    $oracle = false;
    function connection()
    {
        try
        {
            $servername = "b6rzpd5jmxzxv6hux5yf-mysql.services.clever-cloud.com";
            $user = "unvt0coqmwyxy2pq";
            $password = "dAyf3jUN2wWWJg0U8xuz";
            $database = "b6rzpd5jmxzxv6hux5yf";
            //COLOCAR UN IF PARA MANDAR A OTRA PÁGINA DE ERROR POR SI NO CONCETA CON LA BASE DE DATOS
            //setcookie('connection', true, time() + 120, '/', '', true, true);
            
            $oracle = false;
            return $con = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
            
        }
        catch(Exception $e)
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
            //setcookie('connection', true, time() + 120, '/', '', true, true);
            $oracle = true;
            return $con = new PDO("oci:dbname=".$tns, $username, $password);

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

    function registerVideogames($update, $image, $title, $subtitle, $description, $version, $storage, $platform, $last_platform, $developer, $classification)
    {
        $con = connection();

        $research = "SELECT COUNT(*) FROM videogames INNER JOIN platform ON videogames.platform_games = platform.id_platform WHERE title = '$title' AND subtitle = '$subtitle' AND PFNAME = '$platform'";
        $result = $con->query($research);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        $select = $rows["COUNT(*)"];

        if(!$update)
        {
            if($select != 0)
            {
                echo "<script>alert('Juego ya existente $select');</script>";
            }
            else
            {
                try
                {
                    if($oracle = false)
                    {
                        echo "<script>alert('oracle');</script>";
                        $research = "SELECT COUNT(*) FROM videogames ";
                        $result = $con->query($research);
                        $rows = $result -> fetch(PDO::FETCH_ASSOC);
                        $id = $rows["COUNT(*)"];
                        $id++;
                        
                        $research = "SELECT ID_PLATFORM FROM platform WHERE PFNAME = '$platform'";
                        $result = $con->query($research);
                        $rows = $result -> fetch(PDO::FETCH_ASSOC);
                        $platform = $rows["ID_PLATFORM"];
                        
                        
                        $research = "SELECT ID_CLASSIFICATION FROM classificaton WHERE CNAME = '$classification'";
                        $result = $con->query($research);
                        $rows = $result -> fetch(PDO::FETCH_ASSOC);
                        $classification = $rows["ID_CLASSIFICATION"];
                        
                        
                        $file = file_get_contents($image);
                        // $file = fopen($image, 'rb');
                        // $image_content = fread($file, filesize($image));
                        // fclose($file);
                        
                        $research = "INSERT INTO videogames 
                            VALUES (:id, :title, :subtitle, :description, :cover, :version, :storage, :platform, :developer, :classification)";
                        
                        $result = $con->prepare($research);
                        $result->bindParam(':id', $id);
                        $result->bindParam(':title', $title);
                        $result->bindParam(':subtitle', $subtitle);
                        $result->bindParam(':description', $description);
                        $result->bindParam(':cover', $image_content, PDO::PARAM_LOB); // Vincular el BLOB al marcador de posición
                        $result->bindParam(':version', $version);
                        $result->bindParam(':storage', $storage);
                        $result->bindParam(':platform', $platform);
                        $result->bindParam(':developer', $developer);
                        $result->bindParam(':classification', $classification);
                        // echo "<script>alert('11 $id');</script>";
                        
                        $result->execute();
                        // echo "<script>alert('12');</script>";

                        echo "<script>alert('Registrado con éxito')</script>";
        
                        $con = null;
                    }
                    elseif($oracle = true)
                    {
                        try
                        {
                            $research = "SELECT ID_PLATFORM FROM platform WHERE PFNAME = '$platform'";
                            $result = $con->query($research);
                            $rows = $result -> fetch(PDO::FETCH_ASSOC);
                            $platform = $rows["ID_PLATFORM"];
                            
                            
                            $research = "SELECT ID_CLASSIFICATION FROM classificaton WHERE CNAME = '$classification'";
                            $result = $con->query($research);
                            $rows = $result -> fetch(PDO::FETCH_ASSOC);
                            $classification = $rows["ID_CLASSIFICATION"];
                            
                            $file = fopen($image, 'rb');
                            $contentImage = file_get_contents($image);
    
                            $research = "INSERT INTO videogames (TITLE, SUBTITLE, DESCRIPTION_GAME, COVER_IMAGE, VERSION, STORAGE_GAME, PLATFORM_GAMES, DEVELOPER_GAMES, CLASSIFICATION_GAMES) 
                                VALUES (:title, :subtitle, :description, :cover, :version, :storage, :platform, :developer, :classification)";
    
                            $result = $con->prepare($research);
                            $image_content = fread($file, filesize($image));
    
                            $result->bindParam(':title', $title);
                            $result->bindParam(':subtitle', $subtitle);
                            $result->bindParam(':description', $description);
                            $result->bindParam(':cover', $image_content, PDO::PARAM_LOB); // Vincular el BLOB al marcador de posición
                            $result->bindParam(':version', $version);
                            $result->bindParam(':storage', $storage);
                            $result->bindParam(':platform', $platform);
                            $result->bindParam(':developer', $developer);
                            $result->bindParam(':classification', $classification);
    
                            $result->execute();
                            fclose($file);
    
                            echo "<script>alert('Registrado con éxito')</script>";

                        }
                        catch(PDOException $e)
                        {
                            $error = $e->getMessage();
                            echo "<script>alert('$error');</script>";
                        }
                        
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
        else
        {
            $research = "SELECT ID_PLATFORM FROM platform WHERE PFNAME = '$platform'";
            $result = $con->query($research);
            $rows = $result -> fetch(PDO::FETCH_ASSOC);
            $platform = $rows["ID_PLATFORM"];
            
            $research = "SELECT ID_PLATFORM FROM platform WHERE PFNAME = '$last_platform'";
            $result = $con->query($research);
            $rows = $result -> fetch(PDO::FETCH_ASSOC);
            $last_platform = $rows["ID_PLATFORM"];
            
            $research = "SELECT ID_CLASSIFICATION FROM classificaton WHERE CNAME = '$classification'";
            $result = $con->query($research);
            $rows = $result -> fetch(PDO::FETCH_ASSOC);
            $classification = $rows["ID_CLASSIFICATION"];

            $research = "UPDATE videogames SET 
                DESCRIPTION_GAME = :description, 
                VERSION = :version, 
                STORAGE_GAME = :storage,
                PLATFORM_GAMES = :platform,
                DEVELOPER_GAMES = :developer,
                CLASSIFICATION_GAMES = :classification
                    WHERE TITLE = :title AND SUBTITLE = :subtitle AND PLATFORM_GAMES = :last_platform";

            $result = $con -> prepare($research);
            
            $result->bindParam(':title', $title);
            $result->bindParam(':subtitle', $subtitle);
            $result->bindParam(':description', $description);
            $result->bindParam(':version', $version);
            $result->bindParam(':storage', $storage);
            $result->bindParam(':platform', $platform);
            $result->bindParam(':last_platform', $last_platform);
            $result->bindParam(':developer', $developer);
            $result->bindParam(':classification', $classification);

            $result->execute();

            echo "<script>alert('Actualizado con éxito')</script>";
        }
    }

    function deleteVideogames($title, $subtitle, $platform)
    {
        $con = connection();

        $research = "SELECT ID_PLATFORM FROM platform WHERE PFNAME = '$platform'";
        $result = $con->query($research);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        $platform = $rows["ID_PLATFORM"];

        $research = "DELETE FROM videogames WHERE TITLE = '$title' AND SUBTITLE = '$subtitle' AND PLATFORM_GAMES = $platform";
        $execute = $con->query($research);

        $con = null;

        echo "<script>alert('Borrado con éxito');</script>";
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
                    if($oracle = true)
                    {
                        $research = "INSERT INTO user_ (email, user_name, password_user, type_user) VALUES ('$email_register', '$user_register', '$password_register', '$type')";
                        $result = $con->query($research);
                        echo "<script>alert('Registrado con éxito')</script>";
                    }
                    elseif($oracle = false)
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
                // echo "<script>alert('1.2')</script>";
                $research = "UPDATE user_ SET EMAIL = '$email_register', USER_NAME = '$user_register', PASSWORD_USER = '$password_register' WHERE USER_NAME = '$last_user'";
                // echo "<script>alert('2.2')</script>";
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