<?php
include("C:/xampp/htdocs/Locus_Project/control/functions.php");

// $userType = $_GET["usertype"];
$user = $_GET["user"];

error_reporting(0);
header('Content-Type: application/json; charset=utf-8');

$con = connection();

$query = $con->prepare("SELECT EMAIL, USER_NAME, PASSWORD_USER, TNAME FROM user_ INNER JOIN type_ on user_.TYPE_USER = type_.ID_TYPE WHERE USER_NAME = :user");

$query -> bindParam(':user', $user);
//echo json_encode(["Hola 5"]);
$query -> execute();
// echo json_encode(["Hola 6"]);
$result = $query->fetch(PDO::FETCH_ASSOC);
// echo json_encode(["Hola 7"]);

if($result)
{
    $user = [
        "EMAIL" => $row["EMAIL"],
        "USERNAME" => $row["USER_NAME"],
        "PASSWORD" => $row["PASSWORD_USER"],
        "TNAME" => $row["TNAME"]
    ];
    
    echo json_encode($users);
}
else
{
    echo json_encode([]);
}
?>