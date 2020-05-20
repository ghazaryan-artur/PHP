<?php
    session_start();
    
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

    </style>
</head>
<body>
    <div class="w-75 mt-5 mx-auto border border-secondary p-4">
        <h3 class="h3 mx-auto mb-4 text-center">Add car</h3>

        <form action="insert_car.php" method="POST" enctype="multipart/form-data">
            <div class="mb-5">
                <div>
                    <label class="w-100">Car title
                        <input name="title" value="<?php if(isset($_SESSION['title'])){ echo $_SESSION['title'];} ?>" type="text" class="form-control w-100">
                    </label>
                    <?php  if(isset($_SESSION['error']['title'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['title'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car price
                        <input name="price" value="<?php if(isset($_SESSION['price'])){ echo $_SESSION['price'];} ?>" type="text" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['price'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['price'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car count
                        <input name="count" value="<?php if(isset($_SESSION['count'])){ echo $_SESSION['count'];} ?>" type="text" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['count'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['count'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Car description <small>(not requared)</small>
                        <textarea rows="4" name="description" class="form-control"><?php if(isset($_SESSION['description'])){ echo $_SESSION['description'];} ?></textarea>
                    </label>
                    <?php  if(isset($_SESSION['error']['description'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['description'] ?> </div>
                    <?php endif ?>
                </div> 
                <div>
                    <label class="w-100">Car img <small>(first one is going to be an avatar)</small> 
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
                <input class="btn btn-info w-25 mr-2" type="submit" value="Add">
                <a href="./" class="btn btn-secondary w-25">Cancel</a>
            </div>    
        </form>

    </div>    

</body>
</html>
<?php
    session_unset();