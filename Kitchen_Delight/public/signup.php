<!-- Rama Kaorma 2021-->
<!-- This is the signup page -->
<?php    
  require_once('shared/initialize.php'); 
  $page_title = 'Sign up';
?>

<head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="stylesheets/style_no_2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</head>


<body>
  <?php require "signup_head.php"; ?>
<?php include(SHARED_PATH . '/nav.php'); ?>

<h1 style="margin-left: 350px; margin-right: 350px;">Sign up for a Kitchen Delight Account</h1>

<div class="left">
    <img src="../image/Logo.jpg" alt="Logo">
</div>



  <form action="signup.inc.php" method="post" target="_self" autocomplete="off">  
  
  <div class="right">
      <label for="username">Username</label>
      <?php
        if (isset($_GET['username'])) {
          $name = $_GET['username'];
          echo '<input type="text" name="username" value="'.$name.'">';
    
        } else {
          echo '<input type="text" name="username">';
        }
      ?>
      <br><br><br>

      <label for="email">Email address</label>
      <?php
        if (isset($_GET['email'])) {
          $mail = $_GET['email'];
          echo '<input type="text" name="email" value="'.$mail.'">';
    
        } else {
          echo '<input type="text" name="email">';
        }
      ?>
      
      <label for="password">Password</label>
      <input type="password" name="password">
      
      <label for="password">Confirm Password</label>
      <input type="password" name="password_confirm">
    </div>
      
    <div>
      <button class="signupfooter" name="signup_submit">Sign up</button>
      <p id="note">* access level is <i>user</i></p>
    </div>
  </form>

  <?php
 
//The big chunck of code that is commented below can be used instead of the following code. However, the GET thingy would not work.
    if (!isset($_GET['error']) && !isset($_GET['signup'])) {
      exit();

    }  elseif (!isset($_GET['error'])) {
      echo '<p id="success">Sign up successful! Please head to <a href="signin.php">sign in page</a> to sign in to your account.</p>';  
    }

      else {
      
      $signupCheckError = $_GET['error'];
      
      if ($signupCheckError == "emptyfields") {
        echo '<p class="error">Please fill out all the fields.</p>';
        exit();
      }

      if ($signupCheckError == "invalidemailuser_name") {
        echo '<p class="error">Invalid email & username. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "invalidemail") {
        echo '<p class="error">Invalid email address. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "invaliduser_name") {
        echo '<p class="error">Invalid username. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "passwordcheck") {
        echo '<p class="error">Passwords do not match. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "sqlerror") {
        echo '<p class="error">An error has occurred while trying to connect to database. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "usertaken") {
        echo '<p class="error">Username already exists. Please try again.</p>';
        exit();
      }

      if ($signupCheckError == "emailtaken") {
        echo '<p class="error">Email already exists. Please try again.</p>';
        exit();
      }
    }


?>

</body>

<?php require "signup_foot.php"; ?>


<?php
 // $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  // if (strpos($fullUrl, "error=emptyfields") == true) {
  //   echo '<p class="error">Please fill out all the fields.</p>';
  // }

  // elseif (strpos($fullUrl, "error=invalidemailuser_name") == true) {
  //   echo '<p class="error">Invalid email & username. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "error=invalidemail") == true) {
  //   echo '<p class="error">Invalid email address. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "error=invaliduser_name") == true) {
  //   echo '<p class="error">Invalid username. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "error=passwordcheck") == true) {
  //   echo '<p class="error">Passwords do not match. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "error=sqlerror") == true) {
  //   echo '<p class="error">An error has occurred while trying to connect to database. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "error=usertaken") == true) {
  //   echo '<p class="error">Username already exists. Please try again.</p>';
  // }

  // elseif (strpos($fullUrl, "signup=success") == true) {
  //   echo '<p id="success">Sign up successful! Please head to <a href="signin.php">sign in page</a> to sign in to your account.</p>';
  // }
?>