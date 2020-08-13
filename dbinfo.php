<?php
$host = "localhost";
$database = "movie_db";
$username = "root";
$password = "";

// Variabel som innehåller ett mysqli object, och använder server-uppgifterna till detta
$mysqli = new mysqli($host, $username, $password, $database);

// Felmeddelande om anslutningen misslyckas
if ($mysqli->connect_errno) {
  echo "Connection failed: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}