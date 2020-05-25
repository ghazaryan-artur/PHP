<?php
    include 'connection.php';

    $id = $_GET['id'];
    
    $delete = mysqli_query($link, "DELETE FROM market WHERE id = '$id'");
    if (!$delete){
        echo 0;
        exit;
    } 

    
    $queryImg = mysqli_query($link, "SELECT `name` FROM images WHERE car_id = '$id'");
    mysqli_query($link, "DELETE FROM images WHERE car_id = '$id'");

    while ($img = mysqli_fetch_assoc($queryImg)) {
        $name = $img['name'];
        $isDeleted[] = unlink("uploads/$name");
        var_dump($isDeleted);
    } 
    
    // $isDeleted[] = vor mi arjeqe false uremn chi jnjve, der chgitem inchisa petq
    
    echo 1;


