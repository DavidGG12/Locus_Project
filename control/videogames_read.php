<?php

include("C:/xampp/htdocs/Locus_Project/control/functions.php");

$title = $_GET["title"];
$subtitle = $_GET["subtitle"];
$platform = $_GET["platform"];

error_reporting(0);
header('Content-Type: application/json; charset=utf-8');

$con = connection();

$query = $con -> prepare("SELECT ID_GAME, TITLE, SUBTITLE, DESCRIPTION_GAME, VERSION, STORAGE_GAME, PFNAME, DNAME, CNAME from videogames
							    INNER JOIN platform 
                                    on videogames.PLATFORM_GAMES        = platform.ID_PLATFORM
							    INNER JOIN developer 
                                    on videogames.DEVELOPER_GAMES       = developer.ID_DEVELOPER
							    INNER JOIN classificaton 
                                    on videogames.CLASSIFICATION_GAMES  = classificaton.ID_CLASSIFICATION 
                                WHERE TITLE         = :title 
                                    AND SUBTITLE    = :subtitle
                                    AND PFNAME      = :platform");

$query -> bindParam(':title', $title);
$query -> bindParam(':subtitle', $subtitle);
$query -> bindParam(':platform', $platform);

$query->execute();

$result=$query->fetch(PDO::FETCH_ASSOC);


$videogame_array = [
    "TITLE"             => $result['TITLE'],
    "SUBTITLE"          => $result['SUBTITLE'],
    "DESCRIPTION"       => $result['DESCRIPTION_GAME'],
    "VERSION"           => $result['VERSION'],
    "STORAGE"           => $result['STORAGE_GAME'],
    "PLATFORM"          => $result['PFNAME'],
    "DEVELOPER"         => $result['DNAME'],
    "CLASSIFICATION"    => $result['CNAME']
];

echo json_encode($videogame_array);
?>