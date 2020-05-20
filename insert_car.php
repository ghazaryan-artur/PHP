<?php
    include 'connection.php';
    session_start();

    include 'restructure_img_data.php';
    $tmpFiles = incoming_files();

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // CHECK IMG ERROR BLOCK 
        if(empty($tmpFiles)){
            $_SESSION['error']['upload']['common'] = 'Any file isn`t choosen';
        } else {
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
        // CHECK OTHER FEILDS ERROR
        include 'search_error.php';

        // UPLOAD AND INSERT BLOCK
        if(empty($_SESSION['error'])){

            $title = mysqli_real_escape_string($link, htmlspecialchars($_POST['title']));
            $desc = mysqli_real_escape_string($link, htmlspecialchars($_POST['description']));
            $price = mysqli_real_escape_string($link, htmlspecialchars($_POST['price']));
            $count = mysqli_real_escape_string($link, htmlspecialchars($_POST['count']));



            mysqli_query($link, "INSERT INTO `market`(`title`, `description`, `price`, `count`) 
                                VALUES ('$title','$desc','$price','$count')");
        
            
            $carId = mysqli_insert_id($link);

            for($i = 0; $i< count($tmpFiles); $i++){
                var_dump($i);
                $movingIMG = move_uploaded_file($tmpFiles["$i"]['tmp_name'], $target_file["$i"]);

                if (!$movingIMG) {
                    // IF OUR CUSTOM CHOISE BREAK EVERYTHING if WE HAVE ANY ERROR
                    $_SESSION['error']['upload']['common'] = "Sorry, there was an error with uploading your file.";
                    header('Location: /add_car.php');
                    exit;
                } else {
                    $imgName = str_replace ('uploads/', '', $target_file[$i]);
                    $x = mysqli_query($link, "INSERT INTO `images`(`car_id`, `name`) VALUES ('$carId','$imgName')" );
                }
            }
            header('Location: ./');
            exit;

        } else { // IF WE HAVE ANY TYPE OF ERROR
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['count'] = $_POST['count'];
            $_SESSION['description'] = $_POST['description'];
            header('Location: /add_car.php');  
            exit;
        }

    } else {
       header('Location: /add_car.php');   
       exit;
    }