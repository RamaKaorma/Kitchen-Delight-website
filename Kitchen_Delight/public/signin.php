<!-- Rama Kaorma 2021-->
<!-- This is the signin page -->

<?php    
  require_once('shared/initialize.php'); 
  $page_title = 'Sign in';
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
<?php include(SHARED_PATH . '/nav.php'); ?>



<h1>Sign in</h1>

<div class="left">
    <img src="../image/Logo.jpg" alt="Logo">
</div>


  <form action="signin.inc.php" method="post" target="_self" autocomplete="off">
      
    <div class="right_in">
      <label for="username">Username or Email</label>
      <input type="text" name="username"><br><br><br>
      <label for="password">Password</label>
      <input type="password" name="password">
    </div>
      
    <div class="pagefooter">
      <p>Can't sign in? Try signing up <a href="signup.php" id="here">here</a></p>
      <button name="signin_submit" id="signin_but">Sign in</button>
    </div>
  </form>



</body>
