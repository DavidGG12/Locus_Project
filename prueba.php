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

$username = 'sys as SYSDBA';
$password = 'show16ME';

try {
    $dbh = new PDO("oci:dbname=".$tns, $username, $password);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
