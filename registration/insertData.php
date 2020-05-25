<?php

    include 'db-connect.php';
    session_start();


	if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // CHECK ERROR BLOCK
        if(empty($_POST["name"])){
            $_SESSION['error']['name'] = 'Name field is empty';
        } 
        if(empty($_POST["email"])){   
            $_SESSION['error']['email'] = 'Email address is empty';
        } elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' , $_POST['email'] )){
            $_SESSION['error']['email'] = 'Email address is wrong';
        } 
        if (empty($_POST["password"])){
            $_SESSION['error']['password'] = 'Password field is empty';
        } elseif($_POST["password"] != $_POST["confPassword"] ){
            $_SESSION['error']['password'] = 'Passwords did`n mutch';
        }
        if(empty($_FILES['img']['name'])) {
            $_SESSION['error']['img'] =  'Any file isn\'t choosen';
        } else {
            $imgType = strtolower(strrchr($_FILES['img']['name'], '.'));   
            if($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
                $_SESSION['error']['img'] = 'Files format should be JPG, JPEG, PNG or GIF';
            } elseif ($_FILES['img']['size'] > 200000000) {
                $_SESSION['error']['img'] = 'Files size should be less than 200 MB';
            }
        }
        // Checking is email already registred
        $selQuery = mysqli_query($link, "SELECT email FROM users");

        while($row = mysqli_fetch_assoc($selQuery)){
            if($row['email'] == $_POST['email']){
                $_SESSION['error']['email'] = 'User with this email, already registred';
            break;
            }
        }


        // INSERT BLOCK
        if(!empty($_SESSION['error'])){ // IF WE HAVE ANY TYPE OF ERROR
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            header('Location: registration.php');  
        } else { 
            function cleanValue($link, $data){
                return mysqli_real_escape_string($link, htmlspecialchars($_POST[$data]));
            }
            $name = cleanValue($link, 'name');
            $email = cleanValue($link, 'email');
            $password = cleanValue($link, 'password');
            
            $uploadingName = microtime(). $imgType;
            // $uploadingName = 'uploads/'. $uniqeStr. $imgType;  

            $result = mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `password`, `image`) 
                                VALUES ('$name','$email', MD5('$password'), '$uploadingName')");
        
            if($result ){
                if (move_uploaded_file($_FILES['img']['tmp_name'], "uploads/".$uploadingName)){
                    header('Location: ./');
                } else {
                    $_SESSION['error']['img'] = "Error with uploading your foto";
                    header('Location: registration.php');

                }
            }
        }

    } else {
       header('Location: registration.php');   
    }