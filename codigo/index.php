<?php
	include("C:/xampp/htdocs/Locus_Project/control/functions.php");
	session_start();
	if($_COOKIE)
	{
		$user = $_COOKIE['user'];
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilosnv.css">
</head>
<body>
	<header>
		<div class="back">
			<div class="menu container">
				<a href="index.html" class="logo">logito</a>
				<input type="checkbox" id="menu">
				<label for="menu">
					<img src="imagenes/menu.jpg" class="menu-icono" alt="">
				</label>
				<nav class="navbar">
					<ul>
						<li><a href="#">Inicio</a></li>
						<li><?php if(!$_COOKIE){ echo "<a href='login.php'>Iniciar Sesion</a>"; } else { echo "<a href='cerrar.php'>$user</a>"; } ?></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
</body>
</html>