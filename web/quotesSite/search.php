<?php 
  session_start();
  require_once 'common/connect.php';
  require_once 'common/functions.php';

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="styles/main.css">
  <title>QUOTES-DB</title>
</head>
<body>
<header><?php include 'common/header.php'; ?></header>

<!-- search bar -->
<br><br><br>

<div id="searchbar">
<form action="">

  <p>Search: </p>
  <?php
    searchIcon();
  ?>
  <input type="text" name="search">
  <input type="submit" value="Go">
</form>
</div> <!-- searchbar -->

<br><br>

<!-- display all quotes here -->
  <div class="results">
  <?php
  getAllQuotes();
  ?>
  </div> <!-- results -->
</body>
</html>