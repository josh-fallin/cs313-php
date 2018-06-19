<div class="header-container">
<div class="site-banner">
<p>Quotes-DB</p>
</div> <!-- site-banner -->
<div class="user-info">
<?php
if (isset($username))
{
  echo "<p class='text-small'>Logged in as $username.</p>";
  echo '<a class="link-smaller" href="logout.php">log out</a>';
}
?>
</div> <!-- user-info -->
</div> <!-- header-container -->
<nav class="nav-list">
   <div class="nav-item"><a href="myquotes.php">My Quotes</a></div>
   <div class="nav-item"><a href="search.php">Search</a></div>
</nav>