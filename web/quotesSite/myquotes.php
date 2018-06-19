<?php
session_start();
// if not logged in redirect
if (!isset($_SESSION['username']))
{
  header('Location: https://the-second-echelon.herokuapp.com/quotesSite/login.php');
} else {
  $username = $_SESSION['username'];
  $userid = $_SESSION['userid'];
  include_once 'common/connect.php';
  include_once 'common/functions.php';
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
<br>

<h1>Your saved quotes:</h1>

<div class="results">
<?php getAllUserQuotes(); ?>
</div>


</body>
</html>