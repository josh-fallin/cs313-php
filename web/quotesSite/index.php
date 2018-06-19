<?php
session_start();
// Quotes-DB controller

if (isset($_SESSION['username']))
{
  header('Location: http://the-second-echelon.herokuapp.com/quotesSite/myquotes.php');
}
else
{
  header('Location: http://the-second-echelon.herokuapp.com/quotesSite/login.php');
}



?>