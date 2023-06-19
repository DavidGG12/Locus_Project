<?php
    include("functions.php");

    destroySession(getSession());
    header("Location: index.php");
    exit;