<head>
    <link rel="stylesheet" media="All" href="../public/stylesheets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<?php
require_once('shared/initialize.php');
$page_title = "Search Results";
include_once('shared/nav.php');

$searching_for = $_POST["searching_for"] ?? "";

// ?? 'This item was not found'
if (isset($searching_for)) {

//'%" . $searching_for . "%' OR Description LIKE '%" . $searching_for . "%'"
$sql = "SELECT * FROM product ";
$sql .= "WHERE Name LIKE '%" . $searching_for . "%' OR Description LIKE '%" . $searching_for . "%'";
$products = mysqli_query($db, $sql);

// $menu_item = mysqli_fetch_assoc($products);
while ($menu_item = mysqli_fetch_assoc($products)) { ?>
   <!-- // echo $menu_item['Name'] . " " . $menu_item['Price'];
   // echo "<br>"; -->
   <a href="<?php echo 'pro_details.php?id=' . $menu_item['id'];?>"  class="single_product" style="position: relative; top: 300px; left: 100px;"><?php echo $menu_item['Name'];
   echo "<br>";?> </a>
<?php }
mysqli_free_result($products);
} else {
   echo 'Please input something in the field';
}

// if(isset($_POST['lookin_for'])) {



// } else {
//    echo "0 results";
// }



?>
