<?php 
/* DELETE MOVE SKRIPT 
Tar bort film med specifikt id från databasen*/

/* kollar att skriptet laddas från delete-formläret
skickar annars till index */
if (!isset($_POST['delete'])) {
  header("location: ./index.php?status=error");
  exit();
  } else {
  // läser in databasen
  require_once "dbinfo.php";
  // Saniterar id från POST för att undvika skadlig kod 
  $id = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT);

  // query för att ta bort film med specifikt id, placeholder för id
  $sql = "DELETE FROM movies WHERE id = ?;";

  // skapar och kör prepare statement, skriver ut error ifall prepare misslyckas
  if (!$stmt = $mysqli->prepare($sql)) {
    echo "Failed Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
  } else {
    // binder värdet i statement, "i" anger integer
    $stmt->bind_param("i", $id);
    // kör queryn och filmen raderas
    $stmt->execute();
  }
  // skickar tillbaka till index med status delete-success
  header("location: ./index.php?status=delete-success");
  exit();
}