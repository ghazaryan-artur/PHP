<?php
    include 'db-connect.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = MD5($_POST['password']);
    
        $query =  mysqli_fetch_assoc(mysqli_query($link, "SELECT `email`, `password`, `id`  FROM `users` 
                                                            WHERE `email` = '$email' AND `password` = '$password'"));
    
        if((bool)$query){
            $_SESSION['isLogined'] = 1;
            $_SESSION['id'] = $query['id'];
            unset($_SESSION['error']);
            header('Location: ./');
        } else {
            $_SESSION['isLogined'] = 0;
            $_SESSION['email'] =  $_POST['email'];
            $_SESSION['error'] = 'There is no user like this';
            header('Location: ./'); 
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if($_GET['isLogined'] == 0) {
            $_SESSION['isLogined'] = 0;
            unset($_SESSION['email']);
            unset($_SESSION['id']);
            header('Location: ./'); 
        }
        else {
            $_SESSION['isLogined'] = 0;
            $_SESSION['error'] = 'Access error';
            unset($_SESSION['id']); // на всякий
            header('Location: ./'); 
        }
    }
    