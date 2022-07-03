<?php
require_once('../public/shared/initialize.php');
$products = find_all_menu_items();
$menu_item = mysqli_fetch_assoc($products);

if(is_post_request()) {
   // Handle form values sent by new.php
   $product_name = $_POST['Name'] ?? '';
   $description = $_POST['Description'] ?? '';
   $ingredients = $_POST['Ingredients'] ?? '';
   $price = $_POST['Price']?? '';
   // $id = $_POST['id'] ?? '';

   $result = insert_menu_item($id, $product_name, $description, $ingredients, $price);
   if($result ===true) {
   $new_id = mysqli_insert_id($db);
   redirect_to('show.php?id=' . $new_id);
   } 
   // else {
   //    $errors = $result;
   // }

   
} else {

}

$item_set = find_all_menu_items();



?>
<?php
$page_title = 'Admin - New Product'
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
<?php //echo display_errors($errors); ?>
<div class="the_form">
    <form action="create.php" method="post">
      <label for="Name">Product Name</label>
      <input type="text" name="Name"><br><br><br>
      
      <label for="Description">Description</label>
      <input type="text" name="Description" style="height: 250px;"><br><br><br>

      <label for="Ingredients">Ingredients</label>
      <input type="text" name="Ingredients" style="height: 250px;"><br><br><br>

      <label for="Price">Estimated Price</label>
      <input type="text" name="Price"><br><br><br>

    </form>


</div>

<!-- class="new_buttons" -->
<div>
      <form action="uploads.php" method="POST" enctype="multipart/form-data">
         <label for="file">Image</label>
         <input type="file" value="Upload" name="file" style=" width: 100px;"/>
         <button type="submit" name="submit">Upload Image</button>
      </form>
</div>

   <div class="new_buttons">
         <input type="submit" value="Add" style=" width: 100px;"/>
   </div>
