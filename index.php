<!-- Läser in header.php och ansluter till servern-->
<?php 
  require "header.php";
  require_once "dbinfo.php";
?>

<!-- Formulär för att skicka DELETE som POST istället för GET i adressraden  -->
<form id="delete" action="delete-movie.php" method="POST"></form>

<div class="row">
  <!-- section för movielist  -->
  <section class="pt-5 col-md-8">
    <h4>Movie List</h4>
    <!-- Tabell och rubriker för filmerna i database-->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Director</th>
          <th>Year</th>
          <th>Genre</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <!-- Script som skriver ut filmerna i tabellen 
        en loop skapar en <tr> för varje film -->
        <?php
          /* query som hämtar alla filmer i movies och sorterar på id
          JOIN lägger till genre-namn från genres-tabell baserat på genre-id */
          $sql = "SELECT * FROM movies JOIN genres ON movies.genre_id = genres.genre_id ORDER BY id DESC;";
          // kör queryn på databasen (från dbinfo), inget prepered statement då det är en fast query    
          $result = mysqli_query($mysqli, $sql);
          // kollar att servern levererade filmer genom att läsa antalet rader (0 = inga filmer) och skriver ut filmerna
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0) {
            // whileloop som skriver ut resultatet i html för varje rad i svaret
            while ($row = mysqli_fetch_assoc($result)) {
              /* echo html med HEREDOC syntax för enkel hantering av variablerna
              edit-button som laddar om sidan med filmens id som GET
              delete-button som anropar formuläret 'delete' med id som POST */ 
              echo <<<TABLE
                <tr>
                  <td>{$row["title"]}</td>
                  <td>{$row["director"]}</td>
                  <td>{$row["year"]}</td>
                  <td>{$row["genre"]}</td>
                  <td><a class="btn btn-warning" href="?id={$row["id"]}">Edit</a></td>
                  <td><button class="btn btn-danger" form="delete" type="submit" name="delete" value="{$row["id"]}">Delete</button></td>
                </tr>
              TABLE;
            }
          // om server svarar med 0 rader skrivs "no movies" ut över alla 6 kolumner
          } else {
            echo <<<TABLE
              <tr>
                <td colspan="6">No movies</td>
              </tr>
            TABLE;
          }
        ?>
      </tbody>
    </table>
  </section>

  <!-- section för movieform -->
  <section class=" pt-5 col-md-4">
    <!-- Läser in edit-form.php om befintligt film-id finns som GET, annars add-form.php -->
    <?php 
      if (isset($_GET['id'])) {
          // saniterar id till ett nummer för att skydda mot skadlig kod
          $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
          // query för att kolla en film med placeholder för id
          $sql = "SELECT * FROM movies WHERE id = ?;";
          // skapar och kör prepare statement, skriver ut error ifall prepare misslyckas
          if (!$stmt = $mysqli->prepare($sql)) {
            echo "Failed Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
          } else {
            // binder värdet i statement, "i" anger att det är ett nummer
            $stmt->bind_param("i", $id);
            // kör queryn
            $stmt->execute();
            // lagrar användaruppgifterna i en assosiativ array
            $result = $stmt->get_result();
            /* kollar att severn retunerade en film och laddar då skriptet edit-form.php
            annars laddas add-form.php */
            if (($movie = $result->fetch_assoc()) != 0) {
              require "edit-form.php";
            } else {
              require "add-form.php";
            }
        }
      } else {
        require "add-form.php";
      }
    ?>
    <?php 
      // Skrive ut ev. meddelande
      if (isset($_GET['error'])) {
        echo '<p class="text-danger">';
        if ($_GET['error'] == "empty") echo 'You need to fill in all fields</p>';
        else if ($_GET['error'] == "year") echo 'Invalid year</p>';
        else echo 'Something went wrong</p>';
      }
      if (isset($_GET['status'])) {
        if ($_GET['status'] == "add-success") echo '<p class="text-success">Movie added</p>';
        else if ($_GET['status'] == "delete-success") echo '<p class="text-danger">Movie deleted</p>';
        else echo '<p class="text-danger">Something went wrong</p>';
      }
    ?>
  </section>
</div>
<!-- Läser in footer.php -->
<?php 
  require "footer.php"
?>