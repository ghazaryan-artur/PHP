<?php
    include 'connection.php';
    $id = $_GET['id'];
    //  $car_id = $_GET['car_id'];
    $image =  mysqli_fetch_assoc(mysqli_query($link, "SELECT `name` FROM `images` WHERE `id`=$id"));
    $name =  $image['name']; 

    if(file_exists("uploads/$name")){
        if(mysqli_query($link, "DELETE FROM `images` WHERE `id`=$id")){
			unlink("uploads/$name"); 
			echo 1;
		}else{
			//query error
			echo 0;
		}
        //header("Location: edit.php?id=$car_id"); 
    } else {
		echo 0;
        //header("Location: error404.php"); 
    } 