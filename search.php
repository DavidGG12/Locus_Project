<?php
   include("C:/xampp/htdocs/Locus_Project/control/functions.php");

   // Obtener el valor de búsqueda desde la URL
   $searchValue = $_GET['q'];

   $sql = "SELECT * FROM videogames WHERE title LIKE '%$searchValue%' OR subtitle LIKE '%$searchValue%'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      echo '<table class="table">';
      echo '<thead>';
      echo '<tr>';
      echo '<th><p class="uiwe text-center">JUEGOS</p></th>';
      echo '<th></th>';
      echo '</tr>';
      echo '</thead>';

      while ($row = $result->fetch_assoc()) {
         echo '<tr>';
         echo "<td align='center' rowspan='2'><img style='height: 100px' src='data:image/jpeg;base64," . base64_encode($row['cover_image']) . "' alt='Imagen'></td>";
         echo '<td><a href="enlace">' . $row['title'] . '</a>
               <br>
               <a href="enlace">' . $row['subtitle'] . '</a>
               </td>';
         echo '</tr>';
         echo '<tr>';
         echo '</tr>';
         
      }
      echo '</table>';
   } else {
      echo '<div class="uiwe text-center">No se encontraron resultados.';
   }

   $conn->close();
?>
