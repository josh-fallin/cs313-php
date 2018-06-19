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

<div class="login-container">
  <h3>Sign up</h3>
  <form action="sign-up-validate.php" method="post">
    <p>Username:</p>
    <input type="text" name="username" required><br>
    <p>Password:</p>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="submit">
  </form><br>
  <hr>
  <p>go back to <a class="link-small" href="login.php">login</a></p>
</div> <!-- login-container -->
  
<br><br><br>

<p>Just want to look for quotes?</p>
<a href="search.php">Go to search page</a>


</body>
</html>