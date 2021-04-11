<?php
  $INSERT_USER_QUERY = "INSERT INTO users (username, email, fullname, password) VALUES ('%username%', '%email%', '%fullname%', '%password%');";
  $FIND_USER_BY_USERNAME_AND_PASSWORD = "SELECT * FROM users WHERE username = '%username%' AND password = '%password%';";
  
  $INSERT_POST = "INSERT INTO posts (title, body, publishDate, userId) VALUES ('%title%', '%body%', '%publishDate%', %userId%);";
  $GET_POSTS = "SELECT * FROM posts WHERE userId = %userId%";
?>