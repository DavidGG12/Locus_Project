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
						<li><a>Cerrar sesión</a></li>
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
	
	<div class="tabla-container">	
		<div id="form1" class="admin-container">
			<h3>Datos de juegos</h3>

			<?php
				require ('functions.php');
				$con = connection();

				// Obtener los datos de la tabla
				$sql = "SELECT id_game, title, subtitle, description_game, cover_image, version, storage_game, PFName, DName, CName from videogames
							INNER JOIN platform on videogames.platform_games = platform.id_platform
							INNER JOIN developer on videogames.developer_games = developer.id_developer
							INNER JOIN classificaton on videogames.classification_games = classificaton.id_Classification";
				$result = $con->query($sql);

				if ($result->num_rows > 0) 
				{
				// Imprimir la tabla HTML
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>COVER</th>";
					echo "<th>TITLE</th>";
					echo "<th>SUBTITLE</th>";
					echo "<th>DESCRIPTION</th>";
					echo "<th>VERSION</th>";
					echo "<th>STORAGE</th>";
					echo "<th>PLATFORM</th>";
					echo "<th>DEVELOPER</th>";
					echo "<th>CLASSIFICATION</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "</tr>";
				
					$i = 1;
					// Iterar sobre los datos y generar las filas de la tabla
					while ($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td><img src = ' data:image/jpg; base64,". base64_encode($row['cover_image']) . "' height = 120, width = 100></img></td>";
						echo "<td>" . $row["title"] . "</td>";
						echo "<td>" . $row["subtitle"] . "</td>";
						echo "<td>" . $row["description_game"] . "</td>";
						echo "<td>" . $row["version"] . "</td>";
						echo "<td>" . $row["storage_game"] . "</td>";
						echo "<td>" . $row["PFName"] . "</td>";
						echo "<td>" . $row["DName"] . "</td>";
						echo "<td>" . $row["CName"] . "</td>";
						echo '<td><button type="button">Actualizar</button></td>';
						echo '<td><button type="button">Eliminar</button></td>';
						echo '<td><button type="button">Añadir</button></td>';
						echo "</tr>";

						$i++;
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
	<h3>Datos de usuarios</h3>
			<?php
				
				$con = connection();
				// Obtener los datos de la tabla
				$sql = "SELECT id_user, email, user_name, password_user, TName FROM user_ INNER JOIN type_ on user_.type_user = type_.id_Type WHERE TName = 'USER'";
				$result = $con->query($sql);
						
				if ($result->num_rows > 0) 
				{
				// Imprimir la tabla HTML
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Correo</th>";
					echo "<th>Usuario</th>";
					echo "<th>Contraseña</th>";
					echo "<th>Tipo</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "</tr>";
				
					$i = 1;
					// Iterar sobre los datos y generar las filas de la tabla
					while ($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "<td>" . $row["user_name"] . "</td>";
						echo "<td>" . $row["password_user"] . "</td>";
						echo "<td>" . $row["TName"] . "</td>";
						echo '<td><button type="button">Actualizar</button></td>';
						echo '<td><button type="button">Eliminar</button></td>';
						echo '<td><button type="button">Añadir</button></td>';
						echo "</tr>";
						$i++;
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
	<form id="form3" class="admin-container">
	<h3>Datos de colaboradores</h3>
			<?php
				
				$con = connection();
				// Obtener los datos de la tabla
				$sql = "SELECT id_user, email, user_name, password_user, TName FROM user_ INNER JOIN type_ on user_.type_user = type_.id_Type WHERE TName != 'USER'";
				$result = $con->query($sql);
						
				if ($result->num_rows > 0) 
				{
				// Imprimir la tabla HTML
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Correo</th>";
					echo "<th>Usuario</th>";
					echo "<th>Contraseña</th>";
					echo "<th>Tipo</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "<th>Opciones</th>";
					echo "</tr>";
				
					$i = 1;
					// Iterar sobre los datos y generar las filas de la tabla
					while ($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td>" . $i . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "<td>" . $row["user_name"] . "</td>";
						echo "<td>" . $row["password_user"] . "</td>";
						echo "<td>" . $row["TName"] . "</td>";
						echo '<td><button type="button">Actualizar</button></td>';
						echo '<td><button type="button">Eliminar</button></td>';
						echo '<td><button type="button">Añadir</button></td>';
						echo "</tr>";
						$i++;
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
	
		

</body>
</html>