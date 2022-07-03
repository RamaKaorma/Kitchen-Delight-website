<!-- homepage for admin side -->
<?php
require_once('../public/shared/initialize.php');
require_once(SHARED_PATH . '/functions.php');
$page_title = 'Admin - Homepage'
?>

<head>
   <title><?php echo $page_title; ?></title>
   <link rel="stylesheet" media="All" href="<?php echo '../public/stylesheets/admin_side.css'; ?>">  
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
   
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</head>

<nav>
  <div class="navbar">
    <a href="" target="_blank" class="links">Sign out</a> 
  </div>
</nav>

<h1>Catalogue</h1>
<br><br><br><br><br><br><br>



  <form action="uploads.php" method="POST" enctype="multipart/form-data">
    <label for="file">Image</label>
    <input type="file" value="Upload" name="file" style=" width: 100px;"/>
    <button type="submit" name="submit">Upload Image</button>
  </form>



<?php 
  include('menu.php');
?>
<br><br>

<?php require_once('../public/shared/footer.php'); ?>