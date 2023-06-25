<?php
include("C:/xampp/htdocs/Locus_Project/control/functions.php");

// $userType = $_GET["usertype"];
$user_name = $_GET["user_name"];

error_reporting(0);
header('Content-Type: application/json;');

$con = connection();

$query = $con->prepare("SELECT EMAIL, USER_NAME, PASSWORD_USER, TNAME FROM user_ INNER JOIN type_ on user_.TYPE_USER = type_.ID_TYPE WHERE USER_NAME = :user_name");

$query -> bindParam(':user_name', $user_name);
$query -> execute();
$result = $query->fetch(PDO::FETCH_ASSOC);


$user_array = [
    "EMAIL" => $result["EMAIL"],
    "USER_NAME" => $result["USER_NAME"],
    "PASSWORD_USER" => $result["PASSWORD_USER"],
    "TNAME" => $result["TNAME"]
];

echo json_encode($user_array);
?>