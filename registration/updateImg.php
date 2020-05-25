<?php
    session_start();
    include 'db-connect.php';
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Check file config
        if(empty($_FILES['img']['name'])) {
            $_SESSION['error'] =  'Any file isn\'t choosen';
        } else {
            $imgType = strtolower(strrchr($_FILES['img']['name'], '.'));   
            if($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
                $_SESSION['error'] = 'File`s format should be JPG, JPEG, PNG or GIF';
            } elseif ($_FILES['img']['size'] > 200000000) {
                $_SESSION['error'] = 'File`s size should be less than 200 MB';
            }

        }
        if(empty($_SESSION['error'])){
            $id = $_GET['id'];
            $uploadingName = microtime(). $imgType;
            $toDelete = mysqli_fetch_assoc(mysqli_query($link, "SELECT `image` FROM `users` WHERE `id` = '$id'"));
            var_dump($toDelete);
            $isUpd =  mysqli_query($link, "UPDATE `users`  SET `image`= '$uploadingName' WHERE `id` = '$id'");
            var_dump($isUpd);
            if($isUpd){
               if(move_uploaded_file($_FILES['img']['tmp_name'], "uploads/".$uploadingName) ){
                   unlink("uploads/".$toDelete['image']);
               }   
            
            }
     
        } 
  
        
    }
    header("Location: ./");

    