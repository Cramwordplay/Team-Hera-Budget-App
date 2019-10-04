
<?php
session_start();
require_once "config/db_config.php";


    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name']; //Tmp is the temporary location of the file
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $user_id = $_SESSION['user_id'];

    //This tell what kind of files we want to allow
    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension));
    //strtolower() is a string that changes all letters to lowercase. end() gets the last piece of data from array

    //This has the information inside as the kind of files we want them to upload.
    $allowed = array('jpg', 'jpeg', 'svg', 'png');

    //This check if there are any of the $allowed in what was uploaded
    if(in_array($fileActualExtension, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNewName = uniqid('', true).".".$fileActualExtension;

// These two lines upload the image first while the other two (some lines down) makes the image accessible for display
                $fileDestination = 'assets/'.$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);//This function uploads the file

                $sql = "INSERT INTO profile (id, image) VALUES ('$user_id', '$fileDestination')";
                $result = $dbh->query($sql);
                header("Location: dashboard.php?uploadsuccess");

            } else {
                echo "Your file is too large!";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "This file is not accepted";
    }
