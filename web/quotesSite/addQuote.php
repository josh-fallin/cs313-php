<?php
session_start();
require_once 'common/connect.php';

if (isset($_SESSION['username']))
{
  $quote_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  $user_id = $_SESSION['userid'];
  
  $stmt = $db->prepare('INSERT INTO quote_qdb_user (quote_id, qdb_user_id) VALUES (:quote_id, :qdb_user_id)');
  $stmt->execute(array(':quote_id' => $quote_id, ':qdb_user_id' => $user_id));
  
  header ('Location: search.php');
}
else
{
  header ('Location: login.php');
}


?>