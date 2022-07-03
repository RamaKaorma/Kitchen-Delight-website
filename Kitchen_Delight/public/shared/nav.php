<?php

//}
require_once('initialize.php');

?>

<head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" media="All" href="../public/stylesheets/style.css">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<nav>
  <div class="navbar">
    <a href="../public/index.php" target="_self" id="logo">
      <img src="../../Kitchen_Delight/image/Logo.jpg" alt="Logo" style="width: 100px; height: 50px; border-radius: 50px;">
    </a>
    <form action="search.php" method="post" target="_self" autocomplete="on" >
      <input type="search" id="searchprods" placeholder="Search for item.." name="searching_for">
      <button type="submit" name="lookin_for"><img src="../../Kitchen_Delight/image/search.png" alt="search icon"></button>
    </form>
    <a href="signup.php" target="_self" class="links">Sign up</a>
    <a href="signin.php" target="_self" class="links">Sign in</a>
    <a href="contact.php" target="_self" class="links">Contact us</a>
    <a href="about.php" target="_self" class="links">About us</a>
    
  </div>
</nav>
<?php
if (isset($_SESSION['user_name'])) {
  echo '<p class="checkUser">Welcome, Rama!</p>';
} else {
  echo '<p class="checkUser">Welcome, please sign in!</p>';
}

?>