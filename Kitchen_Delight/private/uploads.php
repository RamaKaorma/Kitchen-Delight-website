<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    print_r($file);
    // extracting file info from file
    $fileName = $_FILES['file']['name'];
    $fileName = $_FILES['file']['full_path'];
    $fileType = $_FILES['file']['type'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];
        

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {
            
            if ($fileSize < 1000000) {

                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/' .$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                echo "Successful upload!";

            } else {
                echo "This file is too big.";
            }

        } else {
            echo "There was an error uploading your file. Please try again.";
        }

    } else {
        echo "This file type is not allowed.";
    }

}



?>