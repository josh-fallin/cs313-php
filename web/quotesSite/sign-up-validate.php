<?php
session_start();
require_once 'common/connect.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

if (empty($username) || empty($password))
{
  header("Location: login.php?field=empty");
  exit();
}
else
{
  //check if username exists
  $stmt = $db->prepare("SELECT username FROM qdb_user WHERE username=:username");
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result['username'] == $username)
  {
    header ('Location: sign-up.php?username=taken');
    exit();
  }
  else
  {
    $stmt = $db->prepare('INSERT INTO qdb_user (username, password) VALUES (:username, :password)');
    $stmt->execute(array(':username' => $username, ':password' => $password));
    header ('Location: login.php');
  }

}


?>