<?php 
require_once('initialize.php');


//This relates to relative and absolute paths. It looks for the / in the middleo of a link, and
//if it's not there, it adds it. e.g. href='shared/functions.php' if / is needed, it adds it.
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

//encoding links
function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}
//decoding links
function h($string="") {
  return htmlspecialchars($string);
}


function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

//The following 2 functions check the request method, post or get, to check wether form data was submitted
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

//display errors to user as a list
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";

  }
  return $output;
}


?>
