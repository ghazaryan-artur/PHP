<?php
    include 'db-connect.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = MD5($_POST['password']);
    
        $query =  mysqli_fetch_assoc(mysqli_query($link, "SELECT `email`, `password`, `name`  FROM `users` 
                                                            WHERE `email` = '$email' AND `password` = '$password'"));
    
        if((bool)$query){
            $_SESSION['isLogined'] = 1;
            $_SESSION['email'] = $query['email'];
            $_SESSION['name'] = $query['name'];
            unset($_SESSION['error']);
            header('Location: ./');
        } else {
            $_SESSION['isLogined'] = 0;
            $_SESSION['error'] = 'There is no user like this';
            header('Location: ./'); 
           
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if($_GET['isLogined'] == 0) {
            $_SESSION['isLogined'] = 0;
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            header('Location: ./'); 
        }
        else {
            $_SESSION['isLogined'] = 0;
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            $_SESSION['error'] = 'Access error';
            header('Location: ./'); 
        }
    }
    