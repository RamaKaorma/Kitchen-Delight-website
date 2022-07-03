<?php

   require_once('db_credentials.php');

   function db_connect() { //this function connects to the database kede_database
      $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
      // confirm_db_connect();
      return $connection;
   }

   function db_disconnect() { //this function disconnects to the database kede_database, in other words, closes the connection,
      //between the database and the code
      if(isset($connection)) {
      mysqli_close($connection);
      }
   }

   function confirm_db_connect() {
      if(mysqli_connect_errorno()) {
         $msg = "Database connecction failed: ";
         $msg .= mysqli_connect_error();
         $msg .= " (" . mysqli_connect_errorno() . ")";
         exit($msg);
      }
   }


?>