<?php
   include("C:/xampp/htdocs/Locus_Project/control/functions.php");

   // Obtener el valor de búsqueda desde la URL

   $conn = connection();
   $searchValue = $_GET['q'];

   try {
      $sql = "SELECT COUNT(*) FROM videogames WHERE title LIKE '%$searchValue%' OR subtitle LIKE '%$searchValue%'";
      $execute = $conn->query($sql);
      $row = $execute->fetchAll(PDO::FETCH_ASSOC);

      if ($row[0]["COUNT(*)"] > 0) {
         echo '<table class="table">';
         echo '<thead>';
         echo '<tr>';
         echo '<th><p class="uiwe text-center">JUEGOS</p></th>';
         echo '<th></th>';
         echo '</tr>';
         echo '</thead>';

         $sql = "SELECT TITLE, SUBTITLE, COVER_IMAGE FROM videogames WHERE TITLE LIKE '%$searchValue%' OR SUBTITLE LIKE '%$searchValue%'";
         $result = $conn->query($sql);
         $rows = $result->fetchAll(PDO::FETCH_ASSOC);

         foreach ($rows as $row) {
            echo '<tr>';
            echo "<td align='center' rowspan='2'><img style='height: 100px' src='data:image/jpg;base64," . base64_encode(stream_get_contents($row['COVER_IMAGE'])) . "' alt='Imagen'></td>";
            echo '<td><a href="enlace">' . $row['TITLE'] . '</a>
                  <br>
                  <a href="enlace">' . $row['SUBTITLE'] . '</a>
                  </td>';
            echo '</tr>';
            echo '<tr>';
            echo '</tr>';
         }
         echo '</table>';
      } else {
         echo '<div class="uiwe text-center">No se encontraron resultados.';
      }
   } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
   }
?>






