<?php
  require_once 'db_connection.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die ($conn->connect_error);

  session_start();
?>
