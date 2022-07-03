<?php
   require_once('shared/initialize.php');
   $page_title = 'Homepage';
   require_once(SHARED_PATH . '/functions.php');

   
   include('shared/nav.php');
   // include(STYLE_PATH . '/style.css');
   $products = find_all_menu_items();
?>
   <div class="intrologo">
   <img src="../image/Logo.jpg" alt="Logo" style="border-radius: 600px;">
   <h2><a href="#move" class="inpagelink" >View our menu</a></h2>
   <p>Savoury, or, Sweet</p>
   <h2><a href="about.php" class="inpagelink">Know more about us</a></h2>
   <h2><a href="contact.php" class="inpagelink">Get in touch</a></h2>
</div>

<div class="intro">
   <div>
       <h1>Welcome!</h1>
       <p>Kitchen Delight is here to show you some of the best international dishes
           that will satisfy your sweet or savoury cravings!
       </p>
   </div>
   
   <div class="middle">
       <div class ="middle1">
           <img src="../image/Kanafeh.jpg" alt="Kanafeh" id="kanafeh">
           <img src="../image/Halva.jfif" alt="Halva" id="halva">
       </div>
       <div class ="middle2">
           <img src="../image/Hummus.jpg" alt="Hummus" id="hummus"></div>
           <div class="middle3"><img src="../image/burger.jpg" alt="burger" id="burger">
       </div>
   </div>
</div>


   <h3 id="move">Savoury, or, Sweet</h3>


<div class="products-container" id=move>
<?php
//showing the items in the product table in kede_database
        // $sql = "SELECT * FROM product";
        // $products = mysqli_query($db, $sql);
        // $menu_item = mysqli_fetch_all($products);
       
        while($menu_item = mysqli_fetch_assoc($products)) { ?>
            <a href="<?php echo 'pro_details.php?id=' . $menu_item['id'];?>"  class="single_product"><?php echo $menu_item['Name']; ?></a>
<?php
        }
        ?>

</div>
<!-- foreach($menu_item as $single_item) -->
<?php   
      mysqli_free_result($products);
    ?>