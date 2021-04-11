<?php
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST['username'] ?? null;
    $fullName = $_POST['fullname'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['pwd'] ?? null;
    $confirmPassword = $_POST['confirm_pwd'] ?? null;

    if (!isset($username)) {
      $usernameErrorMessage = "Username is required.";
      return;
    }

    if (!isset($fullName)) {
      $fullNameErrorMessage = "Full name is required.";
      return;
    }

    if (!isset($password)) {
      $passwordErrorMessage = "Password is required.";
      return;
    }

    if (!isset($confirmPassword)) {
      $confirmPasswordErrorMessage = "Confrim password is required.";
      return;
    }

    if ($password != $confirmPassword) {
      $passwordErrorMessage = "Password and Confrim password should match.";
      $confirmPasswordErrorMessage = "Password and Confrim password should match.";
      return;
    }

    include('queries.php');

    $query = str_replace("%username%", $username, $INSERT_USER_QUERY);
    $query = str_replace("%fullname%", $fullName, $query);
    $query = str_replace("%password%", $password, $query);
    $query = str_replace("%email%", $email, $query);

    if ($conn->query($query) == TRUE) {
      header("Location: index.php");
      exit;
    } else {
      echo("Something went wrong!");
    }
  }
?>