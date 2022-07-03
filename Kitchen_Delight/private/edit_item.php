<?php
require_once('../public/shared/initialize.php');
$id = $_GET['id'];
//if we get the id of the product we are editing, display this page, if not, redirect to the Admin - Homepage
if(!isset($_GET['id'])) {
   redirect_to('index.php');
}



//if it is a post request, process the form, if it's not, find the one that is already in the database
if(is_post_request()) {
   // Handle form values sent by new.php
   $menu_item['Name'] = $_POST['Name'] ?? '';
   $menu_item['Description'] = $_POST['Description'] ?? '';
   $menu_item['Ingredients'] = $_POST['Ingredients'] ?? '';
   $menu_item['Price'] = $_POST['Price']?? '';

   // $result = update_menu_item($product_name, $description, $ingredients, $price); 

   $sql = "UPDATE product SET ";
   $sql .= "Name='" . $menu_item['Name'] . "',";
   $sql .= "Description='" . $menu_item['Description'] . "',";
   $sql .= "Ingredients='" . $menu_item['Ingredients'] . "',";
   $sql .= "Price='" . $menu_item['Price'] . "' ";
   $sql .= "WHERE id='" . $id . "' ";
   $sql .= "LIMIT 1"; //this line ensures that only 1 row is updated

   $result = mysqli_query($db, $sql);
   //For UPDATE statements, $result is true/false

   // redirect_to('show.php?id=' . $id);
   if($result === true) {
      redirect_to('show.php?id=' . $id); }
   // } else {
   //    $errors = $result;
   //    // var_dump($errors);
   // }
   else {
      //update failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
} else {
   //following 3 lines look for the item (that we have chosen to view) in the database to display it. 
   //It uses the 'id' (or the primary key) to do so.
   $sql = "SELECT * FROM product ";
   $sql .= "WHERE id= '" . $id . "'";
   $result = mysqli_query($db, $sql);
   // confirm_result_connect($result);

   $menu_item = mysqli_fetch_assoc($result);
   // find_item_by_id($id);

   }

   mysqli_free_result($result);

?>
<?php
$page_title = 'Admin - Edit Product'
?>

<head>
   <title><?php echo $page_title; ?></title>
   <link rel="stylesheet" media="All" href="../public/stylesheets/admin_side.css">  
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
<!-- The following php line ensures that there are no errors in the form being filled -->
<?php //echo display_errors($errors); ?>


<div class="the_form">
   <form action="<?php echo '/Kitchen_Delight/private/edit_item.php?id=' . h(u($id));?>" method="post">
      <label for="Name">Product Name</label>
      <input type="text" name="Name" value="<?php echo $menu_item['Name']; ?>"><br><br><br>
      
      <label for="Description">Description</label>
      <input type="text" name="Description" style="height: 250px;" value="<?php echo $menu_item['Description']; ?>"><br><br><br>

      <label for="Ingredients">Ingredients</label>
      <input type="text" name="Ingredients" style="height: 250px;" value="<?php echo $menu_item['Ingredients']; ?>"><br><br><br>

      <label for="Price">Estimated Price</label>
      <input type="text" name="Price" value="<?php echo $menu_item['Price']; ?>"><br><br><br>

      <label for="image" id="input_image">Image</label>
      <input type="image" name="image">
      
      <div class="new_buttons">
         <input type="submit" value="Add" class="new_buttons" style="float: right; margin-right: 100px; width: 100px;"/>
      </div>
    </form>
</div>

