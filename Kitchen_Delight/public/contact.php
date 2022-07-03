<!-- Rama Kaorma 2021-->
<!-- This is the page Contact Us -->

<?php    
  require_once('shared/initialize.php'); 
  $page_title = 'Contact us';
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

<h1>Contact the Kitchen Delight <br> team</h1>

<div class="LHS">
    <form action="post">
        <label for="message">Message</label>
        <input type="text" name="message" placeholder="Enter your message...">
    </form>
</div>

<div class="RHS">
    <form action="" method="post" target="_self" autocomplete="off">
      <label for="firstname">First name</label>
      <input type="text" name="firstname" placeholder="eg John"><br><br><br>
      <label for="surname">Surname</label>
      <input type="text" name="surname" placeholder="eg Smith"><br><br><br>
      <label for="email">Email Address</label>
      <input type="email" name="email" placeholder="eg email123@gmail.com"><br><br><br>
      <label for="state">State/territory of Residence</label>
      <select name="state" id="">
        <option value="Vic">Vic</option>
        <option value="NSW">NSW</option>
        <option value="QLD">QLD</option>
        <option value="Tas">Tas</option>
        <option value="ACT">ACT</option>
        <option value="WA">WA</option>
        <option value="NT">NT</option>
        <option value="SA">SA</option>
      </select>
    </form>
</div>


</body>