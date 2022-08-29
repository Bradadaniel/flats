<?php
@include 'db_config.php';
session_start();


if(isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $opw= md5($_POST['opassword']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $sql= mysqli_query($connect,"SELECT email,password FROM user_form WHERE email='$email' AND password='$opw'");
    $num = mysqli_fetch_array($sql);

    if ($num > 0) {
        $connect = mysqli_query($connect, "UPDATE user_form SET password='$pass' WHERE email='$email'");
    }

}



?>
}
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>
<body>
<div class="container-fluid" id="header">
    <div class="container">
        <div class="contacts">
            <span><i class='bx bx-envelope' ></i><a>email@valami.com</a></span>
            <span> <i class='bx bx-phone'></i><a>+391/545-6565</a></span>
        </div>
        <hr style="color: black; margin: 0">
        <nav class="navbar">
            <a href="index.php" class="logo"><h4><i class='bx bx-home'></i>New Home</h4></a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class='bx bx-menu'></i></label>
            <div class="menu">
                <ul class="list">
                    <li><a href="index.php">Kezdőoldal</a></li>
                    <li><a href="rolunk.html">Rólunk</a></li>
                    <li><a href="#tulaj">Tulajdonságok</a></li>
                    <li><a href="products.php">Katalógus</a></li>
                    <a href="login.php"><li id="log-in"><h3><i class='bx bx-log-in' ></i></h3></li></a>
                </ul>
            </div>
            <a href="login.php"><h4><i class='bx bx-log-in' id="log-in2"></i></h4></a>
        </nav>
    </div>
</div>

<div class="form-container" style="margin-top: 100px">
    <form action="" method="post" name="chngpwd">
        <h3>Álljts be új jelszavat</h3>

        <input type="email" name="email" required placeholder="irja be az emailt">
        <input type="password" name="opassword" required placeholder="adjon meg a regi jelszavat">
        <input type="password" name="password" required placeholder="adjon meg egz jelszot">
        <input type="password" name="cpassword" required placeholder="erositse meg a jelszavat">

        <input type="submit" name="submit" value="Új jelszó" class="form-btn">
        <p>Mégsem szeretne új jelszót? <a href="login.php"> jelentkezz be</a></p>
    </form>
</div>
</body>