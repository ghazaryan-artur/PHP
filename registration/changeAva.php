<?php  
    session_start();
    $id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="my-5 text-center">Edit main foto.</h3>
        <form action="updateImg.php" method="POST" enctype="multipart/form-data">
            <input name="id" class="d-none" type="text" value="<?= $id ?>">

            <div class="input-group-prepend">
                <input name="password" type="password" placeholder="For security, please write your password" class="form-control" id="inputGroupFileAddon01">
            </div>
            
            <div class="input-group my-5">
                <div class="custom-file">
                    <input name="img" type="file" class="custom-file-input" id="inputGroupFile" aria-describedby="inputGroupFileAddon">
                    <label class="custom-file-label" for="inputGroupFile">Choose foto</label>
                </div>
                <div class="input-group-prepend">
                    <input  type="submit" value="Upload" class="input-group-text" id="inputGroupFileAddon">
                </div>
            </div>

        </form>
    </div>
</body>
</html>
<?php 
        session_unset();
