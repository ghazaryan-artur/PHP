<?php
    include 'connection.php';

    $car_id = $_GET['car_id'];
    $id = $_GET['id'];

    $unsetAva =  mysqli_query($link, "UPDATE images SET avatar = '0' WHERE car_id=$car_id");
    
    if ($unsetAva){
        $setAvatar = mysqli_query($link, "UPDATE images SET avatar = '1' WHERE id=$id");
    }
    if($setAvatar){
        echo 1;
    } else {
        echo 0;
    }
    