<?php

require_once('../public/shared/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM product ";
$sql .= "WHERE id= '" . $id . "' ";
$result = mysqli_query($db, $sql);
// confirm_result_connect($result);

$menu_item = mysqli_fetch_assoc($result);
mysqli_free_result($result);


if(is_post_request()) {
   //Deleting menu item from the database
   $sql = "DELETE FROM product ";
   $sql .= "WHERE id='" . $id . "' ";
   $sql .= "LIMIT 1"; //to make sure we only delete 1 row

   $result = mysqli_query($db, $sql);

   //For DELETE statemetns, $result is true/false
   if($result) {
      redirect_to('index.php');
   } else {
      //Delete failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}

?>

<?php $page_title = 'Delete Menu Item'; ?>
<head>
   <title><?php echo $page_title; ?></title>
   <!-- <link rel="stylesheet" media="All" href="../public/stylesheets/admin_side.css">   -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
   
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</head>

<a href="index.php" class="new_buttons">
   <p class="new_buttons">Back to catalogue</p>
</a>

<div id="content">

  <div class="subject delete">
    <h1>Delete Menu Item</h1>
    <p>Are you sure you want to delete this item?</p>
    <p class="item"><?php echo $menu_item['Name']; ?></p>

    <form action="<?php echo 'delete.php?id=' . $menu_item['id']; ?>" method="post">
      <div>
          <!-- Pressing on the submit button redirects the user to the same delete page, and deletes the menu item with a
          post request (as shown above in the if(is_post request) statement) -->
        <input type="submit" name="commit" value="Delete Item" />
      </div>
    </form>
  </div>

</div>
