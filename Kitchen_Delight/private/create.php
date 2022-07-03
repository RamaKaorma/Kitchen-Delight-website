<!-- This is a new_item form processing page -->

<?php
require_once('../public/shared/initialize.php');


if(is_post_request()) {
   // Handle form values sent by new.php
   $product_name = $_POST['Name'] ?? '';
   $description = $_POST['Description'] ?? '';
   $ingredients = $_POST['Ingredients'] ?? '';
   $price = $_POST['Price']?? '';


   $result = insert_menu_item($id, $product_name, $description, $ingredients, $price);
   if($result === true) {
   $new_id = mysqli_insert_id($db);
   redirect_to('show.php?id=' . $new_id);
   } 
   // else {
   //    $errors = $result;
   // }

   
} else {
   redirect_to('new_item.php');

}

?>
