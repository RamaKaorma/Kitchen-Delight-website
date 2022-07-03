<?php
// session_start();
   //assigning file paths to PHP constants
   //__FILE__ returns the current path of this file
   //direname() returns the path to the parent directory

define("SHARED_PATH", dirname(__FILE__));
define("PUBLIC_PATH", dirname(SHARED_PATH));
define("PROJECT_PATH", PUBLIC_PATH . '/public');
define("STYLE_PATH", PUBLIC_PATH . '/stylesheets');
define("IMAGE_PATH", PROJECT_PATH . '/image');


// Assign the root URL to a PHP constant
// The following can dynamically find everything in URL up to "/public"
// It finds the domain name dynamically
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

$db = db_connect(); //ensures that whenever a page loads initialize.php, it will load in all the database functions
                    //and initiate the first connection
$errors = [];

?>