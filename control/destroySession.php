<?php
    include("C:/xampp/htdocs/Locus_Project/control/functions.php");

    destroySession(getSession());
    header("Location: http://localhost/Locus_Project/index.php");
    exit;