<?php
require_once('initialize.php');

//find all menu items in database
function find_all_menu_items() {
   global $db;
   $sql = "SELECT * FROM product";
   $products = mysqli_query($db, $sql);
   return $products;
}

//look for specific item in database using the id (primary key)
function find_item_by_id($id) {
   global $db;
   $sql = "SELECT * FROM product ";
   $sql .= "WHERE id= '" . $id . "'";
   $result = mysqli_query($db, $sql);
   // confirm_result_connect($result);

   $menu_item = mysqli_fetch_assoc($result);
   mysqli_free_result($result);
   return $menu_item;
}


//validate the accuracy of info in form
function validate_menu_item($menu_item) {
   global $db;
   $errors = [];

   // item name
      if(is_blank($menu_item['Name'])) {
         $errors = "Name cannot be blank.";
      } elseif(!has_length($menu_item['Name'], ['min' => 2, 'max' => 200])) {
         $errors = "Name must be between 2 and 255 characters.";
      }
 
   // description
   if(is_blank($menu_item['Description'])) {
      $errors = "Description cannot be blank.";
    }
    if(!has_length($menu_item['Description'], ['min' => 2, 'max' => 200])) {
      $errors = "Description must be between 2 and 200 characters.";
    }

    // Ingredients
    if(!has_length_less_than($menu_item['Ingredients'], 200)) {
      $errors = "Description must be between 2 and 200 characters.";
    }

    // add function to check price is a floating point $$.cc

   return $errors;


}


//inserting a new menu item
function insert_menu_item($id, $product_name, $description, $ingredients, $price) {
   global $db;

   //validate menu item
   // $errors = validate_menu_item($menu_item);
   // if(!empty($errors)) {
   //    return $errors;
   // }

   $sql =  "INSERT INTO product";
   $sql .= "(Name, Description, Ingredients, Price)";
   $sql .= "VALUES (";
   $sql .= "'" . $product_name . "',";
   $sql .= "'" . $description . "',";
   $sql .= "'" . $ingredients . "',";
   $sql .= "'" . $price . "'";
   $sql .= ")";
   $result = mysqli_query($db, $sql);
   //For INSERT statements, $result is true/false
   if($result) {
      return true;

   } else {
      //INSERT faild
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}


//update (edit) menu item
function update_menu_item($product_name, $description, $ingredients, $price) {
   global $db;
   //validate menu item
   // $errors = validate_menu_item($menu_item);
   // if(!empty($errors)) {
   //    return $errors;
   // }

   //SQL for updating product in the database
   $sql = "UPDATE product SET ";
   $sql .= "Name='" . $menu_item['Name'] . "',";
   $sql .= "Description='" . $menu_item['Description'] . "',";
   $sql .= "Ingredients='" . $menu_item['Ingredients'] . "',";
   $sql .= "Price='" . $menu_item['Price'] . "' ";
   $sql .= "WHERE id='" . $menu_item['id'] . "' ";
   $sql .= "LIMIT 1"; //this line ensures that only 1 row is updated

   $result = mysqli_query($db, $sql);
   //For UPDATE statements, $reslut is true/false
   if ($result) {
      return true;

   } else {
      //update failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
   }
}


 
   
   

?>