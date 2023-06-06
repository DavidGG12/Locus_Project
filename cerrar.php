<?php

setcookie('user', $user, time() - 60 * 60 * 24 * 30, '/');

//echo '<script> alert(Sesión Cerrada) </script>';

header("Location: index.php");