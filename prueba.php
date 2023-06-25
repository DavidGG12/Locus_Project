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
    //$con = new PDO("oci:dbname=".$tns, $username, $password);
    
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
