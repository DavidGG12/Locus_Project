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
    $research = "SELECT TYPE_USER FROM user_ WHERE user_name = 'DOKX890'";
    $result = $con -> query($research);

    if($row = $result->fetch(PDO::FETCH_ASSOC)) 
    {
        $type = $row['TYPE_USER'];
        echo $type;
    }
    else
    {
        echo "no";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
