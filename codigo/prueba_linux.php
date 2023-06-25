<?php
include("C:/xampp/htdocs/Locus_Project/control/functions.php");
$con = connection();
$query = "SELECT DNAME, PNAME FROM developer 
    INNER JOIN publisher ON developer.PUBLISHER_DEVELOPER = publisher.ID_PUBLISHER WHERE PNAME = 'ACTIVISION'";
$result = $con -> query($query);

$row = $result->fetch(PDO::FETCH_ASSOC);

echo $row['DNAME'];
?>