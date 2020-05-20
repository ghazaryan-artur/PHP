<?php
    
    session_start();
    include 'connection.php';
    include 'restructure_img_data.php';
    $tmpFiles = incoming_files();

    $id = mysqli_real_escape_string($link, htmlspecialchars($_POST['id']));

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(!empty($tmpFiles)){
            for($i = 0; $i< count($tmpFiles); $i++){
                $imgType = strtolower(strrchr($tmpFiles["$i"]['name'], '.'));   
                 
    
                if ($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
                    $_SESSION['error']['upload']['format'] = 'Files format should be JPG, JPEG, PNG or GIF';
                    break;
                } elseif ($tmpFiles["$i"]["size"] > 200000000) {
                    $_SESSION['error']['upload']['size'] = 'Files size should be less than 200 MB';
                    break;
                }

                $uniqeStr = microtime(). $i;
                $target_file["$i"] = 'uploads/'. $uniqeStr. $imgType;  
           
            }
        }
        include 'search_error.php';

        if(empty($_SESSION['error'])){
            $title = mysqli_real_escape_string($link, htmlspecialchars($_POST['title']));
            $desc = mysqli_real_escape_string($link, htmlspecialchars($_POST['description']));
            $price = mysqli_real_escape_string($link, htmlspecialchars($_POST['price']));
            $count = mysqli_real_escape_string($link, htmlspecialchars($_POST['count']));

           

            $result = mysqli_query($link, "UPDATE market SET `title` = '$title', `description` = '$desc', `price` = '$price', `count` = '$count' WHERE `id` = '$id'");
            
            if ($result){
                header('Location: ./');
            }

        } else {
            header("Location: /edit.php?id=$id");   
        }
    } else {
        header("Location: /edit.php?id=$id"); 
    }
