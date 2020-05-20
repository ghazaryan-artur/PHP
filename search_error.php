<?php
        if(empty($_POST["title"])){
            $_SESSION['error']['title'] = 'Title field is empty';
        } elseif (strlen(trim($_POST["title"])) > 20) {
            $_SESSION['error']['title'] = 'Title field should be less than 21';
        }

        if(!is_numeric($_POST["count"])){   
            $_SESSION['error']['count'] = 'Count value should be a number';
        } elseif ($_POST['count'] <= 0){
            $_SESSION['error']['count'] = 'Count should be a positive number';
        } elseif ($_POST['count'] > 9999){
            $_SESSION['error']['count'] = 'You haven`t that much!';
        } 

        if (!is_numeric($_POST["price"]) || $_POST["price"] <= 0){
            $_SESSION['error']['price'] = 'Price should be positive number';
        }
        
        if (strlen($_POST['description']) > 300){
            $_SESSION['error']['description'] = 'A little bit shortly, please';
        }