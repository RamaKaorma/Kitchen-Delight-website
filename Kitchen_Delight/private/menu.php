<?php
require_once('../public/shared/initialize.php');

?>

<head>
  <link rel="stylesheet" media="All" href="<?php echo url_for('../public/stylesheets/admin_side.css'); ?>">  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

</head>

<?php

//showing the items in the product table in kede_database
$products = find_all_menu_items();

?>



<div class="add_new_item"> 
   <a href="<?php echo 'new_item.php'; ?>" style="font-size: 200px; color: #808080; text-decoration: none;">+</a>
   <p class="click_to_new">Click to add another item</p>
</div>
<div class="menu_table">
  	<table>
  	  <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Ingredients</th>
        <th>Price</th>
        <th>Image</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>
<!-- The following php while loop keeps loading rows in database until there are no more -->
      <?php while($menu_item = mysqli_fetch_assoc($products)) { ?> 
        <tr class="list">
          <td><?php echo $menu_item['id']; ?></td>
          <td><?php echo $menu_item['Name']; ?></td>
          <td><?php echo $menu_item['Description']; ?></td>
          <td><?php echo $menu_item['Ingredients']; ?></td>
          <td><?php echo $menu_item['Price']; ?></td>
          <td><?php echo $menu_item['Image']; ?></td>
          <td><a class="action" id="change" href="<?php echo 'show.php?id=' . $menu_item['id'];?>">View</a></td>
          <td><a class="action" id="change" href="<?php echo '/Kitchen_Delight/private/edit_item.php?id=' . $menu_item['id'];?>">Edit</a></td>
          <td><a class="action" id="change" href="<?php echo 'delete.php?id=' . $menu_item['id'];?>">Delete</a></td>
          <!-- <td><a class="action" href="<?php //echo 'show.php?id=' . $menu_item['id'];?>">View</a></td> -->
    	  </tr>
      <?php } ?>

  	</table>
    </div>
    <?php 
      mysqli_free_result($products);
    ?>
  