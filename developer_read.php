<?php

include("functions.php");

$publisherID = $_GET["publisherID"];

error_reporting(0);
header('Content-Type: application/json; charset=utf-8');

$con = connection();

$query = $con->prepare("SELECT ID_DEVELOPER, DNAME, PNAME FROM developer INNER JOIN publisher ON developer.PUBLISHER_DEVELOPER = publisher.ID_PUBLISHER WHERE PNAME = :publisherID");
$query -> bindParam(':publisherID', $publisherID);
$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);

$respuesta = [];

foreach ($result as $row)
{
    $developer = [
        "ID_DEVELOPER" => $row["ID_DEVELOPER"],
        "DNAME" => $row["DNAME"]
        // "PUBLISHER_DEVELOPER" => $row["PUBLISHER_DEVELOPER"]
    ];
    array_push($respuesta, $developer);
}

echo json_encode($respuesta);

?>