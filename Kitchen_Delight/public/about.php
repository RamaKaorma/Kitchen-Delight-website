<!-- Rama Kaorma 2021-->
<!-- This is the page About Us -->

<?php    
  require_once('shared/initialize.php'); 
  $page_title = 'About us';
?>

<head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="stylesheets/style_no_3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</head>

<body>
<?php include(SHARED_PATH . '/nav.php'); ?>


<div class="opening">
   <h1 style="font-size: 100px; margin-top: 100px; font-family: 'Parisienne', sans-serif;">About us</h1>
</div>

<div class="aboutus">
   <p>Lorem ipsum dolor sit amet, in nam justo ocurreret, quo ne labore iriure 
      persequeris. Mel homero gubergren cu. Vis no aeterno argumentum. Eam amet 
      adolescens dissentiet id, et quidam concludaturque cum. Ea volumus scriptorem 
      mei, nostrum similique at mei. Sea percipit menandri ocurreret ei. Sed elit labore
      dolores et, tation ornatus intellegat ne eam, phaedrum recusabo ad sit.
   <br><br>
      Maluisset hendrerit ei usu. Aeterno conceptam consectetuer nec in, ius te tempor
       dissentiunt. Usu discere petentium consequuntur ad, sit at eros ceteros, dolore 
       labore verterem eum et. Etiam appareat ne cum.
</p>
</div>

<div>

   <div class="left">
      <img src="../image/Logo.jpg" alt="Logo">
   </div>

   <div class="right">
      <img src="../image/Arabic_bread.jpg" alt="Arabic Bread" id="bread">
      <img src="../image/Baba_ganoush.jpg" alt="Baba Ganoush" id="baba">
      <img src="../image/Beef_samosa.jpg" alt="Beef Samosa" id="samosa">
      <img src="../image/Beetroots.jpg" alt="Beetroots" id="roots">
      <img src="../image/Baklava.jpg" alt="Baklava" id="baklava">
      <img src="../image/Chicken_Kebab.jpg" alt="Chicken Kebab" id="kebab">
   </div>

</div>


</body>