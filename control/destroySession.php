<?php
    include("C:/xampp/htdocs/Locus_Project/control/functions.php");

    destroySession(getSession());
    header("Location: index.php");
    exit;