<?php
    include("resources.php");

    destroySession(getSession());
    header("Location: index.php");
    exit;