<?php
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

try {
    $con = new PDO("oci:dbname=".$tns, $username, $password);
    $research = "SELECT COUNT(*) FROM user_ ";
                    $result = $con->query($research);
                    $row = $result -> fetch(PDO::FETCH_ASSOC);
                    $id = $row["COUNT(*)"];
                    $id++;
                    echo $id;
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
