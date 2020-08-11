<?php

/// LOGIN SKRIPT ///

// kollar att användaren kommer från login formläret
if (isset($_POST['save-movie'])) {
  // läser in databasen
  require_once "dbinfo.php";

  // tar emot användarnamn och lösenord
  // och saniterar dem för att undvika skadlig kod 
  $title = filter_input(INPUT_POST, 'move-title', FILTER_SANITIZE_SPECIAL_CHARS);
  $director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_SPECIAL_CHARS);
  $year = filter_input(INPUT_POST, 'release-year', FILTER_SANITIZE_NUMBER_INT);
  $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_NUMBER_INT);
  

  // kollar om nått av fälten har lämnats tomt
  // skickar i så fall tillbaka till index med felmeddelande
  if (empty($title) || empty($director) || empty($year) || empty($genre)) {
    header("location: ./index.php?error=empty");
    exit();
  } else {
    //code
    echo $title . $director . $year . $genre;
  }
  //
} else {
  // skickas till index om inte användaren kommer från login formläret 
  header("location: ./index.php?error=error");
  exit();
}