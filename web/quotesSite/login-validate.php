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
  $stmt = $db->prepare("SELECT username, qdb_user_id FROM qdb_user WHERE username=:username");
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result['username'] == $username)
  {
    $userid = $result['qdb_user_id'];
    $stmt = $db->prepare("SELECT password FROM qdb_user WHERE username=:username");
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($password == $result['password'])
    {
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $userid;
      header("Location: myquotes.php");
      exit();
    }
    else
    {
      header("Location: login.php?password=invalid");
       exit();
    }
  }
}

?>