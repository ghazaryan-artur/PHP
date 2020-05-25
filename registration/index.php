<?php
    session_start();
    include 'db-connect.php';
    
    if(isset($_SESSION['isLogined']) && $_SESSION['isLogined'] == 1){
        $id = $_SESSION['id'];
        $user = mysqli_fetch_assoc(mysqli_query($link, "SELECT `email`, `name`, `image`  FROM `users` WHERE `id` = '$id'"));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        nav {
            height: 70px;
            background:#005999;
            width: 100vw;
            display: flex;
            justify-content: space-around;
        }
        ul {
            width: 70%;
            display: flex;
            height: 100%;
        }
        li {
            display: block;
            height: 100%;
            width: 10vw;
            color: white;
            text-align: center;
            padding-top: 22px;
        }
        li:hover {
            background: #39f;
        }
        .loginBlock{
            display: flex;
            width: 20vw;
            position: relative;
        }
        .loginBlock div{
            width: 50%;
            
        }
        .loginBlock div a,
        .loginBlock div span{
            color: white;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .login,
        .reg {
            padding-top: 22px;
            cursor: pointer;
        }
        .login {
            background-color: rgb(35, 35, 228);

        }
        .reg{
            background-color: rgb(30, 201, 73);
        }
        .loginBlock .hiddenBlock{
            display:none;
            position:absolute;
            z-index: 1000;
            height: 220px;
            width: 20vw;
            top: 70px;
            padding: 15px;
            background: whitesmoke;
            cursor: default ;
        }
        .hiddenBlock div {
            padding-top:22px;
        }
        .hiddenBlock input{
            border: none;
            border-bottom: turquoise 1px solid;
            width: 190%;
        }
        .hiddenBlock input:focus{
            outline: none;
            border-bottom: turquoise 1px solid;
        }
        .error {
            color: red !important;
        }
        .logined{
            background: #39f;

        }
        .logined div {
            text-align: center;
            width: 50%;
            padding: 22px !important;
            padding-top: 10px !important;
            color: white;
        }
        #avatar {
            padding: 10px !important;
            height: 100%
        }
        #avatar img  {
            height: 100%
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li>Торговля</li>
            <li>Клиентам</li>
            <li>Промо-акция</li>
            <li>Партнерам</li>
            <li>О нас</li>
        </ul>
        <div class="loginBlock">
            <?php if(isset($_SESSION['isLogined']) && $_SESSION['isLogined'] == 1 )  { ?>
                <div class="logined d-flex justify-content-between w-100">
                    <div class="">Hello, <?= $user['name'] ?></div>
                    <div id="avatar"><img alt="Profile foto" src="uploads/<?=$user['image']?>"></div>
                    <div class=""><a href="login.php?isLogined=0">Sign Out</a></div>
                </div>


            <?php } else { ?>
                <div class="hiddenBlock">
                    <form action="login.php" method="POST">
                        <div class="mb-2">
                            <input value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; unset($_SESSION['email']);} ?>" name="email" placeholder="Your email" type="email">
                        </div>
                        <div>     
                            <input name="password" placeholder="Your password" type="password" >
                        </div>
                        <div class="w-100 p-0" style="height: 24px">
                            <?php  if(isset($_SESSION['error'])) : ?>
                                <span class="error"><?= $_SESSION['error'] ?></span>
                            <?php endif ?>
                        </div>
                        <input value="Sign in" type="submit" class="btn btn-success w-50 mx-auto mt-3 d-block">
                    </form>
                </div>
                <div onclick="show()" class="login"><span>Sign in</span></div>
                <div class="reg"><a href="registration.php">Registration</a></div>
            <?php } ?>            
        </div>
    </nav>
    <div class="w-100">
        <?php  if(isset($_SESSION['isLogined']) && $_SESSION['isLogined'] == 1 ) : ?>
            <img src="images/selfpage.png" alt="All page">
        <?php else : ?>
            <img src="images/mainpage.png" alt="All page">
        <?php endif ?>
    </div>



    <script>
        function show(){
            if(document.getElementsByClassName('hiddenBlock')[0].style.display == 'block'){
                document.getElementsByClassName('hiddenBlock')[0].style.display = 'none';
                document.getElementsByClassName('login')[0].style.backgroundColor = "rgb(35, 35, 228)";
                
            } else {
                document.getElementsByClassName('hiddenBlock')[0].style.display = 'block';
                document.getElementsByClassName('login')[0].style.backgroundColor = "rgb(8, 8, 148)";
            }
        }
    </script>
    <?php if (isset($_SESSION['error'])) : ?>
        <script>show()</script>
    <?php endif ?>

</body>
</html>
<?php 
    unset($_SESSION['error']);