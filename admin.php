<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilosad.css">
	<!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
-->
<style>
	.formularioId{
		display: none;
	}
	</style>
</head>
<body>
	<script>
		function mostrarFormulario(formularioId) 
		{
			var formularios = document.getElementsByClassName('admin-container');
			for (var i = 0; i < formularios.length; i++) 
			{
				formularios[i].style.display = 'none';
			}
			document.getElementById(formularioId).style.display = 'block';
		}
	</script>

	<header>
		<div class="back">
			<div class="menu container">
				<a href="index.php" class="logo"><img src="imagenes/locus_ico.png" class="menu-icono-p" alt=""></a>
				
				<input type="checkbox" id="menu">
				
				<label for="menu">
					<img src="imagenes/menu.png" class="menu-icono" alt="">
				</label>
                
                <!--<div class="buscar">
                    <input type="search" placeholder="Buscar juego ">
                </div>-->

				<nav class="navbar">
					<ul>
						<li><a href="index.html">Inicio</a></li>
						<li><a href="sesion.html">Cerrar sesión</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>   


	<div class="btn-click-container">
		
		<h1>Administrador</h1>
		
		<button class="btn-click" onclick="mostrarFormulario('form1')">Datos de juegos</button>
		<button class="btn-click" onclick="mostrarFormulario('form2')">Datos de usuarios</button>
		<button class="btn-click" onclick="mostrarFormulario('form3')">Datos de colaboradores</button>
	</div>
	<p>lol</p>
	
	<div class="tabla-container">	
		<div id="form1" class="admin-container">
			<h3>Datos de juegos</h3>

			<?php
				require 'connection.php';
				$con = connection();
				
				// Obtener los datos de la tabla
				$sql = "SELECT * FROM videogames";
				$result = $con->query($sql);
						
				if ($result->num_rows > 0) 
				{
				// Imprimir la tabla HTML
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Nombre</th>";
					echo "<th>Apellidos</th>";
					echo "<th>Matricula</th>";
					echo "<th>Carrera</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "</tr>";
				
					// Iterar sobre los datos y generar las filas de la tabla
					while ($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td>" . $row["id_cre"] . "</td>";
						echo "<td>" . $row["nombre"] . "</td>";
						echo "<td>" . $row["apellidos"] . "</td>";
						echo "<td>" . $row["matricula"] . "</td>";
						echo "<td>" . $row["carrera"] . "</td>";
						echo '<td><button type="button">Actualizar</button></td>';
						echo '<td><button type="button">Eliminar</button></td>';
						echo '<td><button type="button">Añadir</button></td>';
						echo "</tr>";
					}
				
						echo "</table>";
					} 
					else 
					{
						echo "No se encontraron registros.";
					}
				
					// Cerrar la conexión
					$con->close();
			?>

		</div>

	<form id="form2" class="admin-container">
	<h3></h3>
			<?php
				require 'conexion.php';

				// Obtener los datos de la tabla
				$sql = "SELECT * FROM usuario";
				$result = $con->query($sql);
						
				if ($result->num_rows > 0) 
				{
				// Imprimir la tabla HTML
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Usuario</th>";
					echo "<th>Contraseña</th>";
					echo "</tr>";
				
					// Iterar sobre los datos y generar las filas de la tabla
					while ($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td>" . $row["id_usu"] . "</td>";
						echo "<td>" . $row["usuario"] . "</td>";
						echo "<td>" . $row["clave"] . "</td>";
						echo "</tr>";
					}
				
					echo "</table>";
				} 
				else 
				{
					echo "No se encontraron registros.";
				}
			
				// Cerrar la conexión
				$con->close();
			?>
    </form>

		<div id="form3" class="admin-container">
		</div>
	<div class="contra">

	</div>
	
		

</body>
</html>