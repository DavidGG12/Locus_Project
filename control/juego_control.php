<?php
    include('functions.php');
    $con = connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_COOKIE['user']))
        {
            if(isset($_POST['btnAgregar_list']))
            {
                $id = $_POST['id'];
                $user = $_POST['id_USER'];
                $status = "TERMINADO";
                
                $query = "INSERT INTO list_games VALUES($user, $id, '$status')";
                $stmt = $con->query($query);
    
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            elseif(isset($_POST['btnUpdate_list']))
            {
                $id = $_POST['id'];
                $user = $_POST['id_USER'];
                $status = $_POST['status'];
    
                $query = "UPDATE list_games SET ESTATUS = '$status' WHERE USER_LIST = $user AND GAMES_LIST = $id";
                $stmt = $con->query($query);
    
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
                // $query = "UPDATE list_games SET ESTATUS = :estatus WHERE USER_LIST = :user AND GAME_LIST = :game";
                // $stmt = $con->prepare($query);
                // $stmt->bindValue(':estatus', $status, PDO::PARAM_STR);
                // $stmt->bindValue(':user', $status, PDO::PARAM_INT);
                // $stmt->bindValue(':game', $status, PDO::PARAM_INT);
                // $stmt->execute();
            }
            elseif(isset($_POST['btnDelete_list']))
            {
                $id = $_POST['id'];
                $user = $_POST['id_USER'];
    
                $query = "DELETE FROM list_games WHERE USER_LIST = $user AND GAMES_LIST = $id";
                $stmt = $con->query($query);
    
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }
        else
        {
            header("Location: http://localhost/Locus_Project/login.php");
            exit;
        }
    }
?>