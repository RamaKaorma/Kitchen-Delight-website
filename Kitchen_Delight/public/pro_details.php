<?php
require_once('../public/shared/initialize.php');
$id = $_GET['id'] ?? 'This item was not be found';

// echo $id;

//following 3 lines look for the item (that we have chosen to view) in the database to display it. 
//It uses the 'id' (or the primary key) to do so.

   $sql = "SELECT * FROM product ";
   $sql .= "WHERE id= '" . $id . "'";
   $result = mysqli_query($db, $sql);

   $menu_item = mysqli_fetch_assoc($result);
   mysqli_free_result($result);

$page_title = $menu_item['Name'];

?>

<h1>Product Name: <?php echo $menu_item['Name'];?></h1>

<div>

   <dl>
      <dt>ID</dt>
      <dd><?php echo $menu_item['id'];?></dd>
   </dl>

   <dl>
      <dt>Name</dt>
      <dd><?php echo $menu_item['Name'];?></dd>
   </dl>

   <dl>
      <dt>Description</dt>
      <dd><?php echo $menu_item['Description'];?></dd>
   </dl>

   <dl>
      <dt>Ingredients</dt>
      <dd><?php echo $menu_item['Ingredients'];?></dd>
   </dl>

   <dl>
      <dt>Price</dt>
      <dd><?php echo $menu_item['Price'];?></dd>
   </dl>

</div>
<a href="index.php#move" class="new_buttons">
   <p class="new_buttons">Back to Homepage</p>
</a>

<?php
   
?>