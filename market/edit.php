<?php 
    session_start();
    include 'connection.php';

    $id = $_GET['id'];
    $query = mysqli_query($link, "SELECT * FROM market WHERE id = $id");
    $thisCar = mysqli_fetch_assoc($query);



    $imgQuery = mysqli_query($link, "SELECT * FROM images WHERE car_id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        label {
            font-size: 22px;
        }
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
        .deleteImg {
            position: absolute;
            right:16px;
            top:1px;
            border:none;
        }
        .deleteImg:hover{
            background-color: gray;
        }
        .makeMain {
            border: none;
            width: 100%;
            position: absolute;
            bottom:8px;
            left:0px;
            width: 100%;
            margin-right:auto;
            margin-left: auto;
        }
        .makeMain button{
            border: none;
            background: black;
            width: 85%;
            display:block;
            margin:auto;
            opacity: 0.1;
            color: white;
            /* height: 20px; */
        }
        .imgDiv:hover .makeMain button{
            opacity: 0.7;
        }

    </style>
</head>
<body>
    <div class="w-75 mt-5 mx-auto border border-secondary p-4">
        <h3 class="h3 mx-auto mb-4 text-center">Edit car information</h3>

        <form action="update_car.php" method="POST" enctype="multipart/form-data">
            <input name="id" class="d-none" type="text" value="<?= $thisCar['id']?> ">
            <div class="mb-5">
                <div>
                    <label class="w-100">Car title
                        <input value="<?= $thisCar['title'] ?>" name="title" type="text" class="form-control w-100">
                    </label>
                    <?php  if(isset($_SESSION['error']['title'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['title'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car price
                        <input value="<?= $thisCar['price'] ?>" name="price" type="text" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['price'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['price'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car count
                        <input value="<?= $thisCar['count'] ?>" name="count" type="text" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['count'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['count'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car description <small>(not requared)</small>
                        <textarea rows="4" name="description" class="form-control"><?= $thisCar['description'] ?></textarea>
                    </label>
                    <?php  if(isset($_SESSION['error']['description'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['description'] ?> </div>
                    <?php endif ?>
                </div>   
                <div>
                    <label class="w-100">Car img 
                        <input class="form-control-file mb-1" type="file" name="uploads_img[]" multiple>
                    </label>
                    <?php  if(isset($_SESSION['error']['upload']['common'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['upload']['common'] ?> </div>
                    <?php endif ?>
                    <?php  if(isset($_SESSION['error']['upload']['size'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['upload']['size'] ?> </div>
                    <?php endif ?>
                    <?php  if(isset($_SESSION['error']['upload']['format'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['upload']['format'] ?> </div>
                    <?php endif ?>

                </div>  
            </div>

            <div class="d-flex justify-content-end w-100">
                <input class="btn btn-info w-25 mr-2" type="submit" value="Edit">
                <a href="./" class="btn btn-secondary w-25">Cancel</a>
            </div>
                
        </form>


        <div class="row mt-3">
            <?php while( $images = mysqli_fetch_assoc($imgQuery)) : ?>
                <div id="<?= $images['id']. 1 ?>" class="col-3 position-relative imgDiv">
                    <img class="img-thumbnail" src="uploads/<?= $images['name']?>" id="<?= $images['id']?>">
                    <button onclick="deleteImg(<?= $images['id'] ?>, <?= $images['car_id'] ?>)" class="deleteImg">&times</button>
                    <div class="makeMain"><button onclick="changeAvatar(<?=$images['id']?>, <?=$images['car_id']?>)">Set as main</button></div>                  
                </div> 
            <?php endwhile ?>
        </div>

    </div>    


     
    <script src="js//delete.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</body>
</html>
<?php
    session_unset();
    