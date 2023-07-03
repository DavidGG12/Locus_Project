<?php
$host = 'adb.mx-queretaro-1.oraclecloud.com';
$port = '1522';
$service = 'service_name=g502914b537f6ea_locus_high.adb.oraclecloud.com';



$tns = "(description= (retry_count=20)(retry_delay=3)(address=(protocol=tcps)(port=1522)(host=adb.mx-queretaro-1.oraclecloud.com))(connect_data=(service_name=g502914b537f6ea_locus_high.adb.oraclecloud.com))(security=(ssl_server_dn_match=yes)))";

$username = 'ADMIN';
$password = 'show16ME890!';

try
{
    $con = new PDO("oci:dbname=".$tns, $username, $password);
    // Configura las opciones de PDO si es necesario
    // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // ...
    
    // Realiza operaciones con la base de datos
    
    // Cerrar la conexión
    $con = null;
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

?>
