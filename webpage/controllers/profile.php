<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
  }

  include('queries.php');

  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $title = $_POST['title'] ?? null;
    $body = $_POST['body'] ?? null;

    if (!isset($title)) {
      $titleErrorMessage = "Title is required.";
      return;
    }

    if (!isset($body)) {
      $bodyErrorMessage = "Body is required.";
      return;
    }

    $datetime = date_create()->format('Y-m-d H:i:s');

    $query = str_replace("%title%", $title, $INSERT_POST);
    $query = str_replace("%body%", $body, $query);
    $query = str_replace("%publishDate%", $datetime, $query);
    $query = str_replace("%userId%", $_SESSION['user']['id'], $query);

    $conn->query($query);
  }

  $postsQuery = str_replace("%userId%", $_SESSION['user']['id'], $GET_POSTS);
  $postsResult = $conn->query($postsQuery);
?>