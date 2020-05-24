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
	<div class="container">
		<h1 class="mx-auto mt-5 w-75 ">Welcome to our site registration page!</h1>
	</div>
    <div class="w-75 mt-5 mx-auto border border-secondary p-4">
        <h5 class="h5 mb-4 text-center">Please, fill correctly every fields</h5>

        <form action="insertData.php" method="POST">
            <div class="mb-5">
                <div>
                    <label class="w-100">Your name
                        <input name="name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];} ?>" type="text" class="form-control w-100">
                    </label>
                    <?php  if(isset($_SESSION['error']['name'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['name'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Your email
                        <input name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>" type="text" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['email'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['email'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Your password
                        <input name="password" type="password" class="form-control">
                    </label>
                    <?php  if(isset($_SESSION['error']['password'])) : ?>
                        <div class="alert alert-danger" role="alert"> <?= $_SESSION['error']['password'] ?> </div>
                    <?php endif ?>
                </div>
                <div>
                    <label class="w-100">Confirm password
                        <input name="confPassword" type="password" class="form-control">
                    </label>
                </div> 
                  
            </div>
            <div class="d-flex justify-content-end w-100">
                <a href="./" class="btn btn-secondary w-25">Cancel</a>
                <input class="btn btn-success w-25 ml-2" type="submit" value="Registred">
            </div>    
        </form>

    </div>    

</body>
</html>
<?php
    session_unset();