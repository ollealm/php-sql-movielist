<?php
/* ADD MOVE SKRIPT 
Används både för att lägga till ny film och för att uppdatera befintliga filmer
Ett 'conditional statement' kollar av vid varje steg om id skickats med POST och uppdaterar i så fall den filmen, annars skapas en ny.
*/

/* kollar att skriptet laddas från film-formläret
skickar annars till index */
if (!isset($_POST['save-movie'])) {
    header("location: ./index.php?status=error");
    exit();
  } else {
  // läser in databasen
  require_once "dbinfo.php";

  // Saniterar uppgifterna från POST för att undvika skadlig kod 
  $title = filter_input(INPUT_POST, 'move-title', FILTER_SANITIZE_SPECIAL_CHARS);
  $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_SPECIAL_CHARS);
  $year = filter_input(INPUT_POST, 'release-year', FILTER_SANITIZE_NUMBER_INT);
  $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_NUMBER_INT);
  if (isset($_POST['id'])) $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  
  /* kollar om något av fälten lämnats tomt, skickar i så fall tillbaka till index med felmeddelande
  kollar även så att årtalet ligger mellan 1888 (världens första film) och 2050 */
  if (empty($title) || empty($director) || empty($year) || empty($genre)) {
    header("location: ./index.php?error=empty");
    exit();
  } elseif ($year < 1888 || $year > 2050) {
    header("location: ./index.php?error=year");
    exit();
  } else {

    // skapar query
    if (isset($_POST['id'])) {
      // query för att uppdater film med specifikt id, placeholders för prepered statement
      $sql = "UPDATE movies SET
      title = ?, 
      director = ?, 
      year = ?, 
      genre_id = ?
      WHERE movies.id = ?;";
    } else {
      /* query för att till film i movies med placeholders
      id sätts till 'NULL' för 'auto increment' */
      $sql = "INSERT INTO movies (id, title, director, year, genre_id) VALUES (NULL, ?, ?, ?, ?);";
    }

    // skapar och kör prepare statement, skriver ut error ifall prepare misslyckas
    if (!$stmt = $mysqli->prepare($sql)) {
      echo "Failed Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
    } else {
      // binder värdet i statement, "s" anger sträng och "i" anger integer
      if (isset($_POST['id'])) {
        $stmt->bind_param("ssiii", $title, $director, $year, $genre, $id);
      } else {
        $stmt->bind_param("ssii", $title, $director, $year, $genre);
      }
      // kör queryn och filmen läggs till eller uppdateras
      $stmt->execute();
    }
    // skickar tillbaka till index med status success
    header("location: ./index.php?status=add-success");
    exit();
  }
}