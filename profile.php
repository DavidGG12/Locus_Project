<!DOCTYPE html>
<?php 
  include("C:/xampp/htdocs/Locus_Project/control/functions.php");

  $session = getSession();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locus Game Proyect</title>

    <!--Icono pestaña-->
    <link rel="icon" type="icon" href="http://localhost/Locus_Project/imagenes/LOCUS-GAME.ico">

    <!--Styles-->
    <link rel="stylesheet" href="http://localhost/Locus_Project/estilos/lista.css">
    <link rel="stylesheet"  href="http://localhost/Locus_Project/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Geologica&family=Oswald:wght@700&family=Roboto&family=Rubik+Bubbles&family=Rubik+Glitch&display=swap" rel="stylesheet">
</head>
<body>
  <script>
    function mostrarFormulario(formularioId) {
        var formularios = document.getElementsByClassName('lista-container');
        for (var i = 0; i < formularios.length; i++) {
            formularios[i].style.display = 'none';
        }
        document.getElementById(formularioId).style.display = 'block';
    }
    </script>
      <!--barra de navegación-->
	  <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#041721; font-size: 18px;">
        <!--clase responsive-->
        <div class="container-fluid">
        <!--icono y nombre de la página-->
          <a class="navbar-brand" href="index.php">
              
            <span class="fs-3 " style="color: #dfe6ec; font-family: 'Rubik Bubbles', cursive;"> &nbsp; Locus Proyect</span>
          </a>

          <!--Boton desplegable-->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!--lista de elemntos dentro de la barra de navegación-->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" >
              <li class="nav-item">
                <a class="nav-link active" style="font-family: 'Oswald', sans-serif; font-size: 20px;" aria-current="page" href="index.php">Inicio</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" style="font-family: 'Oswald', sans-serif; font-size: 20px;" href="control/destroySession.php">Cerrar sesión</a>
              </li>
            </ul>

          <!--línea de separacion redes-->
          <hr class="text-white-50">
          </div>
        </div>
      </nav>

  <!---Opciones-->
<main class="container min-vh-100">
  <div class="banner">
		<img src="http://localhost/Locus_Project/imagenes/locus_p.png" alt="">
  </div>
  
  <div class="container bg-body-secondary m-3">
		<div class="row">
		  <div class="col">
        <p class="text-start m-2 fs-4" style="font-family: 'Geologica', sans-serif; color: #4d5052;" ><?php echo $session; ?></p>
		  </div>
		  <div class="col col-lg-2 m-2"></div>
		</div>
	</div>

  <div class="container m-3 btn-click-container">
    <div class="row">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-family: 'Geologica', sans-serif;" onclick="mostrarFormulario('juegos')">Todos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-family: 'Geologica', sans-serif;" onclick="mostrarFormulario('terminados')">Terminados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-family: 'Geologica', sans-serif;" onclick="mostrarFormulario('pausa')">En pausa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-family: 'Geologica', sans-serif;" onclick="mostrarFormulario('abandonados')">Abandonados</a>
        </li>
      </ul>
    </div>
  </div>

    <div class="container m-3 ">
      <div id="juegos" class="lista-container">
        <div class="row">
          <div class="col m-3">
            <h3 class="fs-5" style="font-family: 'Geologica', sans-serif; color: #4d5052;">Colección</h3>
          </div>
        </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Título</th>
                <th scope="col">Subtítulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Platform</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  // Conexión a la base de datos
                  $conexion = connection();

                  // Comprobar la conexión
                    if ($conexion === false) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }
                    $i=1;
                    
                    // Consulta para obtener los datos de la tabla
                    $query_id = "SELECT ID_USER FROM user_ WHERE USER_NAME = '$session'";
                    $result_id = $conexion->query($query_id);
                    $row_id = $result_id->fetchAll(PDO::FETCH_ASSOC);

                    // $query_platform = "SELECT PFNAME "

                    $query = "SELECT TITLE, SUBTITLE, COVER_IMAGE, DESCRIPTION_GAME, PFNAME FROM list_games
                      INNER JOIN videogames ON list_games.GAMES_LIST = videogames.ID_GAME
                      INNER JOIN platform on videogames.PLATFORM_GAMES = platform.ID_PLATFORM
                        WHERE USER_LIST = ". $row_id[0]['ID_USER'];
                    $result = $conexion ->query($query);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td><img src='data:image/jpg;base64," . base64_encode(($row['COVER_IMAGE'])) . "' height='120' width='100'></td>";
                        echo "<td>" . $row['TITLE'] . "</td>";
                        echo "<td>" . $row['SUBTITLE'] . "</td>";
                        echo "<td>" . $row['DESCRIPTION_GAME'] . "</td>";
                        echo "<td>" . $row['PFNAME'] . "</td>";
                        echo "<td> <a href='#' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                        $i++;
                    }
              ?>
            </tbody>
          </table>
      </div>

      <div id="terminados" class="lista-container" style="display: none;">
        <div class="row">
          <div class="col m-3">
            <h3 class="fs-5" style="font-family: 'Geologica', sans-serif; color: #4d5052;">Colección</h3>
          </div>
        </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Título</th>
                <th scope="col">Subtítulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Platform</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  // Conexión a la base de datos
                  $conexion = connection();

                  // Comprobar la conexión
                    if ($conexion === false) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }
                    $i=1;
                    
                    // Consulta para obtener los datos de la tabla
                    $query_id = "SELECT ID_USER FROM user_ WHERE USER_NAME = '$session'";
                    $result_id = $conexion->query($query_id);
                    $row_id = $result_id->fetchAll(PDO::FETCH_ASSOC);

                    // $query_platform = "SELECT PFNAME "

                    $query = "SELECT TITLE, SUBTITLE, COVER_IMAGE, DESCRIPTION_GAME, PFNAME FROM list_games
                      INNER JOIN videogames ON list_games.GAMES_LIST = videogames.ID_GAME
                      INNER JOIN platform on videogames.PLATFORM_GAMES = platform.ID_PLATFORM
                        WHERE USER_LIST = ". $row_id[0]['ID_USER'] . " AND ESTATUS = 'TERMINADO'";
                    $result = $conexion ->query($query);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td><img src='data:image/jpg;base64," . base64_encode(($row['COVER_IMAGE'])) . "' height='120' width='100'></td>";
                        echo "<td>" . $row['TITLE'] . "</td>";
                        echo "<td>" . $row['SUBTITLE'] . "</td>";
                        echo "<td>" . $row['DESCRIPTION_GAME'] . "</td>";
                        echo "<td>" . $row['PFNAME'] . "</td>";
                        echo "<td> <a href='#' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                        $i++;
                    }
              ?>
            </tbody>
          </table>
      </div>

      <div id="pausa" class="lista-container" style="display: none;">
        <div class="row">
          <div class="col m-3">
            <h3 class="fs-5" style="font-family: 'Geologica', sans-serif; color: #4d5052;">Colección</h3>
          </div>
        </div>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Título</th>
                <th scope="col">Subtítulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Platform</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  // Conexión a la base de datos
                  $conexion = connection();

                  // Comprobar la conexión
                    if ($conexion === false) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }
                    $i=1;
                    
                    // Consulta para obtener los datos de la tabla
                    $query_id = "SELECT ID_USER FROM user_ WHERE USER_NAME = '$session'";
                    $result_id = $conexion->query($query_id);
                    $row_id = $result_id->fetchAll(PDO::FETCH_ASSOC);

                    // $query_platform = "SELECT PFNAME "

                    $query = "SELECT TITLE, SUBTITLE, COVER_IMAGE, DESCRIPTION_GAME, PFNAME FROM list_games
                      INNER JOIN videogames ON list_games.GAMES_LIST = videogames.ID_GAME
                      INNER JOIN platform on videogames.PLATFORM_GAMES = platform.ID_PLATFORM
                        WHERE USER_LIST = ". $row_id[0]['ID_USER'] . " AND ESTATUS = 'PAUSA'";
                    $result = $conexion ->query($query);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td><img src='data:image/jpg;base64," . base64_encode(($row['COVER_IMAGE'])) . "' height='120' width='100'></td>";
                        echo "<td>" . $row['TITLE'] . "</td>";
                        echo "<td>" . $row['SUBTITLE'] . "</td>";
                        echo "<td>" . $row['DESCRIPTION_GAME'] . "</td>";
                        echo "<td>" . $row['PFNAME'] . "</td>";
                        echo "<td> <a href='#' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                        $i++;
                    }
              ?>
            </tbody>
          </table>
      </div>


      <div id="abandonados" class="lista-container" style="display: none;">
        <div class="row">
          <div class="col m-3">
            <h3 class="fs-5" style="font-family: 'Geologica', sans-serif; color: #4d5052;">Colección</h3>
          </div>
        </div>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Título</th>
                <th scope="col">Subtítulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Platform</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  // Conexión a la base de datos
                  $conexion = connection();

                  // Comprobar la conexión
                    if ($conexion === false) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }
                    $i=1;
                    
                    // Consulta para obtener los datos de la tabla
                    $query_id = "SELECT ID_USER FROM user_ WHERE USER_NAME = '$session'";
                    $result_id = $conexion->query($query_id);
                    $row_id = $result_id->fetchAll(PDO::FETCH_ASSOC);

                    // $query_platform = "SELECT PFNAME "

                    $query = "SELECT TITLE, SUBTITLE, COVER_IMAGE, DESCRIPTION_GAME, PFNAME FROM list_games
                      INNER JOIN videogames ON list_games.GAMES_LIST = videogames.ID_GAME
                      INNER JOIN platform on videogames.PLATFORM_GAMES = platform.ID_PLATFORM
                        WHERE USER_LIST = ". $row_id[0]['ID_USER'] . " AND ESTATUS = 'ABANDONADO'";
                    $result = $conexion ->query($query);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row[''] . "</td>";
                        echo "<td>" . $row['TITLE'] . "</td>";
                        echo "<td>" . $row['SUBTITLE'] . "</td>";
                        echo "<td>" . $row['DESCRIPTION_GAME'] . "</td>";
                        echo "<td>" . $row['PFNAME'] . "</td>";
                        echo "<td> <a href='#' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                        $i++;
                    }
              ?>
            </tbody>
          </table>
      </div>
  </div>
</main>
    
	<!--Footer-->
	<footer class="bg-dark text-center text-lg-start" style="color: #a0cceb;">
        <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); ">
                © 2023 Copyright:<a class="text-light"  href="#">&nbsp;LocusProyect.com</a>
            </div>
    </footer>

    <!--Scripts-->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>