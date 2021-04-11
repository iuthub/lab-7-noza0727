<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $DB_NAME = "blog";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>