<!DOCTYPE html>
<?php 
  include("control/functions.php");
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
    <link rel="stylesheet" href="http://localhost/Locus_Project/estilos/principal.css">
    <link rel="stylesheet"  href="http://localhost/Locus_Project/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Geologica&family=Oswald:wght@700&family=Roboto&family=Rubik+Bubbles&family=Rubik+Glitch&display=swap" rel="stylesheet">
    </head>
<body>
<!--barra de navegación-->
<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#041721; font-size: 18px;">
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
          <?php if(!isset($_COOKIE['user'])): ?>
            <a class="nav-link" style="font-family: 'Oswald', sans-serif; font-size: 20px;" href="login.php">Iniciar sesión</a>
          <?php elseif(isset($_COOKIE['user'])): ?>
            <!--COLOCAR UN IF PARA QUE, CUANDO SEA ADMIN Y TOQUE SU NOMBRE LO DIRIJA A LA PÁGINA DE ADMIN, MIENTRAS QUE EL USUARIO NORMAL, LO DIRIJA A SU PERFIL-->
            <?php 
              $con = connection();
              $user = getSession();
              
              global $id_user;
              $research = "SELECT ID_USER, TYPE_USER FROM user_ WHERE user_name = '$user'";
              $result = $con -> query($research);
              if($row = $result->fetch(PDO::FETCH_ASSOC))
              {
                $type = $row['TYPE_USER'];
                $id_user = $row['ID_USER'];

                if($type == 1 || $type == 3)
                {
                  echo "<a class='nav-link' style='font-family: 'Oswald', sans-serif; font-size: 20px;' href='admin.php'>$user</a>";
                }
                elseif($type == 2)
                {
                  echo "<a class='nav-link' style='font-family: 'Oswald', sans-serif; font-size: 20px;' href='profile.php'>$user</a>";
                }
              }
            ?>
          <?php else: ?>
            <a class="nav-link" style="font-family: 'Oswald', sans-serif; font-size: 20px;" href="login.php">No mames</a>
          <?php endif ?>
        </li>
      </ul>

    <!--línea de separacion redes-->
    <hr class="text-white-50">
    </div>
  </div>
</nav>

<!---Opciones-->
<main class="container min-vh-100">
  <div class="container m-3">
    <div class="row">
      <div class="col-md-4">
      </div>
      
      <div class="col-md-4">
        <img src="http://localhost/Locus_Project/imagenes/locus_p.png" width="100%" alt="logo locus proyect">
      </div>

        <div class="col-md-4">
        </div>
      </div>
    </div>


    <div class="container m-3">
      <div class="row">
        <table class="table table-hover">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">COVER</th>
                  <th scope="col">TITLE</th>
                  <th scope="col">SUBTITLE</th>
                  <th scope="col">DESCRIPTION</th>
                  <th scope="col">VERSION</th>
                  <th scope="col">STORAGE</th>
                  <th scope="col">PLATFORM</th>
                  <th scope="col">DEVELOPER</th>
                  <th scope="col">CLASSIFICATION</th>
              </tr>
          </thead>
          <tbody>
            <?php
              // Conexión a la base de datos

              $title = $_GET["title"];
              $subtitle = $_GET["subtitle"];
              $platform = $_GET["platform"];

              $con = connection();
              $i = 1;

              // Consulta para obtener los datos de la tabla
              $query_data = "SELECT ID_GAME, TITLE, SUBTITLE, DESCRIPTION_GAME, COVER_IMAGE, VERSION, STORAGE_GAME, PFNAME, DNAME, CNAME 
                        FROM videogames
                        INNER JOIN platform ON videogames.platform_games = platform.id_platform
                        INNER JOIN developer ON videogames.developer_games = developer.id_developer
                        INNER JOIN classificaton ON videogames.classification_games = classificaton.id_classification
                        WHERE TITLE = :title AND SUBTITLE = :subtitle AND PLATFORM_GAMES = :platform";

              $stmt = $con->prepare($query_data);
              $stmt->bindParam(':title', $title);
              $stmt->bindParam(':subtitle', $subtitle);
              $stmt->bindParam(':platform', $platform);
              $stmt->execute();

              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $id_game = $rows[0]['ID_GAME'];


              $query_list = "SELECT * FROM list_games WHERE GAMES_LIST = :id_game AND USER_LIST = :id_user";
              // echo $id_game . "<br>";
              $result_list = $con -> prepare($query_list);
              // echo $id_user;
              $result_list->bindParam(':id_game', $id_game);
              $result_list->bindParam(':id_user', $id_user);
              $result_list->execute();
              $row_list = $result_list->fetch(PDO::FETCH_ASSOC);

              if(empty($row_list))
              {
                // Mostrar los datos en la tabla
                foreach($rows as $row) 
                {
                    echo "<tr>";
                    echo "<td>" . $row['ID_GAME'] . "</td>";
                    echo "<td>IMAGEN</td>";
                    // echo "<td><img src='data:image/jpg;base64," . base64_encode(($row['COVER_IMAGE'])) . "' height='120' width='100'></td>";
                    echo "<td>" . $row["TITLE"] . "</td>";
                    echo "<td>" . $row["SUBTITLE"] . "</td>";
                    echo "<td>" . $row["DESCRIPTION_GAME"] . "</td>";
                    echo "<td>" . $row["VERSION"] . "</td>";
                    echo "<td>" . $row["STORAGE_GAME"] . "</td>";
                    echo "<td>" . $row["PFNAME"] . "</td>";
                    echo "<td>" . $row["DNAME"] . "</td>";
                    echo "<td>" . $row["CNAME"] . "</td>";
                    echo "<form action='control/juego_control.php' method='post'>";
                    echo "<td><input type='hidden' name='id' id='title_hidden' value='" . $row["ID_GAME"] . "'></td>";
                    echo "<td><input type='hidden' name='id_USER' id='title_hidden' value='" . $id_user . "'></td>";
                    echo "<td> <button type = 'submit' name='btnAgregar_list' class='btn btn-primary'>Agregar</button></td>";
                    echo "</form>";
                    echo "</tr>";
  
                    $i++;
                }
              }
            else
            {
              foreach($rows as $row)
              {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>IMAGEN</td>";
                // echo "<td><img src='data:image/jpg;base64," . base64_encode(($row['COVER_IMAGE'])) . "' height='120' width='100'></td>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["SUBTITLE"] . "</td>";
                echo "<td>" . $row["DESCRIPTION_GAME"] . "</td>";
                echo "<td>" . $row["VERSION"] . "</td>";
                echo "<td>" . $row["STORAGE_GAME"] . "</td>";
                echo "<td>" . $row["PFNAME"] . "</td>";
                echo "<td>" . $row["DNAME"] . "</td>";
                echo "<td>" . $row["CNAME"] . "</td>";
                echo "<form action='control/juego_control.php' method='post'>";
                echo "<td><input type='hidden' name='id' id='title_hidden' value='" . $row["ID_GAME"] . "'></td>";
                    echo "<td><input type='hidden' name='id_USER' id='title_hidden' value='" . $id_user . "'></td>";
                echo "<td>";
                echo "<select name='status'>";
                echo "<option value='TERMINADO'>TERMINADO</option>";
                echo "<option value='PAUSA'>PAUSA</option>";
                echo "<option value='ABANDONADO'>ABANDONADO</option>";
                echo "</select>";
                echo "</td>";
                echo "<td> <button type='submit' name='btnUpdate_list' class='btn btn-primary'>Actualizar</button></td>";
                echo "<td> <button type='submit' name='btnDelete_list' class='btn btn-danger'>Eliminar</button></td>";
                echo "</form>";
                echo "</tr>";
    
                $i++;
              }
            }
            ?>
                                
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>


    <!--Footer--->
    <footer class="text-center text-lg-start" style="background-color: #041721">
        <!-- Copyright -->
        <div class="text-center p-3" style="color: #ffffff; ">
          © 2023 Copyright:
          <a class="text-light"  href="#">LocusProyect.com</a>
        </div>
      </footer>

      <!--Scripts-->
    <script src="http://localhost/LOCUS/bootstrap/js/bootstrap.min.js"></script>      
    <script src="/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>