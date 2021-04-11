<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SERVER["REQUEST_METHOD"]=="GET") {
    $logout = $_GET['logout'] ?? null;

    if (isset($logout) && $logout == 1) {
      session_destroy();
      return;
    }
  }

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['pwd'] ?? null;

    if (!isset($username)) {
      $usernameErrorMessage = "Username is required.";
      return;
    }

    if (!isset($password)) {
      $passwordErrorMessage = "Password is required.";
      return;
    }

    include('queries.php');

    $query = str_replace("%username%", $username, $FIND_USER_BY_USERNAME_AND_PASSWORD);
    $query = str_replace("%password%", $password, $query);

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION["user"] = $row;
        break;
      }
    } else {
      echo("Not Found");
    }
  }
?>