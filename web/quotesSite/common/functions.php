<?php

include_once 'connect.php';

function dbConnect()
{
  try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
}

function searchIcon()
{
  echo '<svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" viewBox="0 0 20 20">';
  echo '<path d="M 18.125 15.804 l -4.038 -4.037 c 0.675 -1.079 1.012 -2.308 1.01 -3.534 '; 
  echo 'C 15.089 4.62 12.199 1.75 8.584 1.75 C 4.815 1.75 1.982 4.726 2 8.286 c 0.021 ';
  echo '3.577 2.908 6.549 6.578 6.549 c 1.241 0 2.417 -0.347 3.44 -0.985 l 4.032 4.026 c '; 
  echo '0.167 0.166 0.43 0.166 0.596 0 l 1.479 -1.478 C 18.292 16.234 18.292 15.968 18.125 ';
  echo '15.804 M 8.578 13.99 c -3.198 0 -5.716 -2.593 -5.733 -5.71 c -0.017 -3.084 2.438 ';
  echo '-5.686 5.74 -5.686 c 3.197 0 5.625 2.493 5.64 5.624 C 14.242 11.548 11.621 13.99 ';
  echo '8.578 13.99 M 16.349 16.981 l -3.637 -3.635 c 0.131 -0.11 0.721 -0.695 0.876 ';
  echo '-0.884 l 3.642 3.639 L 16.349 16.981 Z" ></path></svg> ';
}

function addQuoteIcon()
{
  echo '<svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" viewBox="0 0 20 20">';
  echo '<path d="M 14.613 10 c 0 0.23 -0.188 0.419 -0.419 0.419 H 10.42 v 3.774 c 0 0.23' ;
  echo '-0.189 0.42 -0.42 0.42 s -0.419 -0.189 -0.419 -0.42 v -3.774 H 5.806 c -0.23 0 ';
  echo '-0.419 -0.189 -0.419 -0.419 s 0.189 -0.419 0.419 -0.419 h 3.775 V 5.806 c 0 -0.23 ';
  echo '0.189 -0.419 0.419 -0.419 s 0.42 0.189 0.42 0.419 v 3.775 h 3.774 C 14.425 9.581 ';
  echo '14.613 9.77 14.613 10 M 17.969 10 c 0 4.401 -3.567 7.969 -7.969 7.969 c -4.402 0 ';
  echo '-7.969 -3.567 -7.969 -7.969 c 0 -4.402 3.567 -7.969 7.969 -7.969 C 14.401 2.031 ';
  echo '17.969 5.598 17.969 10 M 17.13 10 c 0 -3.932 -3.198 -7.13 -7.13 -7.13 S 2.87 6.068 ';
  echo '2.87 10 c 0 3.933 3.198 7.13 7.13 7.13 S 17.13 13.933 17.13 10" ></path></svg>';
}

function checkIcon()
{
  echo '<svg xmlns="http://www.w3.org/2000/svg" class="svg-icon svg-icon-green" viewBox="0 0 20 20">';
  echo '<path d="M 10.219 1.688 c -4.471 0 -8.094 3.623 -8.094 8.094 s 3.623 8.094 8.094 ';
  echo '8.094 s 8.094 -3.623 8.094 -8.094 S 14.689 1.688 10.219 1.688 M 10.219 17.022 c ';
  echo '-3.994 0 -7.242 -3.247 -7.242 -7.241 c 0 -3.994 3.248 -7.242 7.242 -7.242 c 3.994 ';
  echo '0 7.241 3.248 7.241 7.242 C 17.46 13.775 14.213 17.022 10.219 17.022 M 15.099 7.03 ';
  echo 'c -0.167 -0.167 -0.438 -0.167 -0.604 0.002 L 9.062 12.48 l -2.269 -2.277 c -0.166 ';
  echo '-0.167 -0.437 -0.167 -0.603 0 c -0.166 0.166 -0.168 0.437 -0.002 0.603 l 2.573 2.578 ';
  echo 'c 0.079 0.08 0.188 0.125 0.3 0.125 s 0.222 -0.045 0.303 -0.125 l 5.736 -5.751 C ';
  echo '15.268 7.466 15.265 7.196 15.099 7.03" ></path></svg>';
}

function displayIcon($quoteid, $userid)
{
  $db = dbConnect();
  // if logged in, and quote saved, display check
  $stmt = $db->prepare('SELECT quote_id FROM quote_qdb_user WHERE quote_id=:quote_id AND qdb_user_id=:qdb_user_id');
  $stmt->execute(array(':quote_id' => $quoteid, ':qdb_user_id' => $userid));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $quoteSaved = !empty($result);

  if (isset($_SESSION['username']) && $quoteSaved == true)
  {
    checkIcon();
  }
  else
  {
    echo "<a href='addQuote.php?id=$quoteid'>";
    addQuoteIcon();
    echo '</a>';
  }
}

function getAllQuotes()
{
  $db = dbConnect();
   
  if (isset($_SESSION['userid']))
  {
    $userid = $_SESSION['userid'];
  }

  foreach ($db->query('SELECT * FROM quote') as $q)
  {
    echo '<div class="quote-container">';
    echo '<div class="quote-box">';
    echo '<blockquote>';
    echo '<p class="quote">';
    echo $q['quote_text'] . "<br>";
    echo '<section class="author"> - ' . $q['author'];
    echo '</section></p>';
    echo '</blockquote></div>';
    echo '<div class="add-quote-icon">';
    displayIcon($q['quote_id'], $userid);
    echo '</div></div>';
    echo '<br><br>';
  }
}

function getAllUserQuotes()
{
  $db = dbConnect();
   
  if (isset($_SESSION['userid']))
  {
    $userid = $_SESSION['userid'];
  }

  foreach ($db->query("SELECT * FROM quote, quote_qdb_user WHERE 
  $userid = quote_qdb_user.qdb_user_id AND quote.quote_id = quote_qdb_user.quote_id") as $q)
  {
    echo '<div class="quote-container">';
    echo '<div class="quote-box">';
    echo '<blockquote>';
    echo '<p class="quote">';
    echo $q['quote_text'] . "<br>";
    echo '<section class="author"> - ' . $q['author'];
    echo '</section></p>';
    echo '</blockquote></div>';
    echo '<div class="add-quote-icon">';
    displayIcon($q['quote_id'], $userid);
    echo '</div></div>';
    echo '<br><br>';
  }
}

function checkUsernameExists($username)
{
  $db = dbConnect();
  $stmt = $db->prepare("SELECT username FROM qdb_user WHERE username=:username");
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (empty($result))
  {
    return false;
  }
  else
  {
    return true;
  }
}


?>