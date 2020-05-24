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
        } elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' ,$_POST['email'] )){
        //} elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[a-z]{2,15}.[A-Za-z]{1}[A-Za-z\.]{1-15}/' ,$_POST['email'] )){
            $_SESSION['error']['email'] = 'Email address is wrong';
        } 
        if (empty($_POST["password"])){
            $_SESSION['error']['password'] = 'Password field is empty';
        } elseif($_POST["password"] != $_POST["confPassword"] ){
            $_SESSION['error']['password'] = 'Passwords did`n mutch';
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
        
            $result = mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `password`) 
                                VALUES ('$name','$email', MD5('$password'))");
            if($result){
                header('Location: ./');
            }
        }

    } else {
       header('Location: registration.php');   
    }