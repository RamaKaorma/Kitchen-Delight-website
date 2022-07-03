<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'KeDe_database';

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
if(mysqli_connect_errorno()) {
   $msg = "Database connecction failred: ";
   $msg .= mysqli_connect_error();
   $msg .= " (" . mysqli_connect_errorno() . ")";
   exit($msg);
}


// 2. Perform database query
$query = "SELECT * FROM KeDe_database";
$result_set = mysqli_query($connection, $query);

// 3. Use returned data (if any)
while($menu_item = mysqli_fetch_assoc($result_set)) {
   echo $menu_item["Name"] . "<br />";
}
// 4. Release returned data
mysqli_free_result($results_set);

// 5. Close database connection
mysqli_close($connection);

?>
