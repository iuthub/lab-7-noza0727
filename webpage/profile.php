<?php
	include('connection.php');
	include('controllers/profile.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Profile Page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>

  <body>
    <h2>New Post</h2>
    <form action="profile.php" method="post">
      <ul class="form">
        <li>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" />
          <span class="error-message"><?= $titleErrorMessage ?? "" ?></span>
        </li>
        <li>
          <label for="body">Body</label>
          <textarea name="body" id="body" cols="30" rows="10"></textarea>
          <span class="error-message"><?= $bodyErrorMessage ?? "" ?></span>
        </li>
        <li>
          <input type="submit" value="Post" />
        </li>
      </ul>
    </form>

    <div class="onecol">
    <?php
      if ($postsResult->num_rows > 0) {
        while($row = $postsResult->fetch_assoc()) {
    ?>

      <div class="card">
        <h2><?= $row['title'] ?></h2>
        <h5><?= $_SESSION['user']['fullname'].", ".$row['publishDate'] ?></h5>
        <p><?= $row['title'] ?></p>
        <p><?= $row['body'] ?></p>
      </div>

    <?php
        }
      }
    ?>
    </div>
  </body>
</html>