<?php

@include 'db_config.php';

session_start();


if(isset($_POST['submit'])){


    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $pass = md5($_POST['password']);
    if (!empty($_POST['user_type'])){
        $user_type = $_POST['user_type'];
    }else{
        $user_type ='';
    }


    $select = " SELECT * FROM user_form WHERE email= '$email' && password= '$pass' ";

    $result = mysqli_query($connect, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        if($row['user_type'] == 'admin'){ //
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');

        }elseif ($row['user_type'] == 'user'){
            $_SESSION['user_id'] = $row['id'];//
            $_SESSION['user_name'] = $row['name'];
            header('location:user.php');

        }else{
            $error[] = 'helytelen email vagy jelszo';
        }

    }


};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Login</title>
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
                    <li><a href="#">Tulajdonságok</a></li>
                    <li><a href="products.php">Katalógus</a></li>
                    <li><a href="#">Hirdetés</a></li>
                    <a href="login.php"><li id="log-in"><h3><i class='bx bx-log-in' ></i></h3></li></a>
                </ul>
            </div>
            <a href="login.php"><h4><i class='bx bx-log-in' id="log-in2"></i></h4></a>
        </nav>
    </div>
</div>


<div class="form-container">
    <form action="" method="post">
        <h3>Jelentkezz be most</h3>
        <?php
        if(isset($error)){
            foreach ($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
        <input type="email" name="email" required placeholder="irja be az emailt">
        <input type="password" name="password" required placeholder="adjon meg egz jelszot">
        <input type="submit" name="submit" value="Bejelentkezes" class="form-btn">
        <p>nincs meg accountja? <a href="register.php"> regisztralj most</a></p>
    </form>
</div>


</body>
</html>
<?php
