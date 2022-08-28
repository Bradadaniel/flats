<?php
include ('db_config.php');
require_once 'db_pdo.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>New Home</title>
    <link rel="stylesheet" href="products.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<div class="container-fluid" id="header" >
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
<!---->


<div class="container" id="Catalog">
    <form class="product-search" id="product-search" method="post">
        <input style="width: 50%" placeholder="Kereső" name="search" id="search_input" type="text">
        <button id="search_button" type="submit">Keresés</button>
    </form>
    <div class="row" id="flat-card">
        <!-- -->
        <?php

        $sql = "SELECT * FROM products ";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

//        $sql = "SELECT city_name
//        FROM products WHERE city.id=
//        INNER JOIN city
//        ON products.city_id = city.city_id";
//        $query = $connect->prepare($sql);
//        $query->bindParam(':city_id', $city_id);


        ?>

        <?php
        if (isset($_POST['search']) || empty($_POST['search'])){
        require "search.php";
        if (count($result)>0) {
            foreach ($result as $value) {
//
                $sql = "SELECT city_name
                FROM city WHERE city.id=:city_id";
                $query = $connect->prepare($sql);
                $query->bindParam(':city_id', $value['city_id']);
                $query->execute();
                $result2 = $query->fetchColumn();
                //
                $sql = "SELECT name
        FROM user_form WHERE user_form.id=:user_id";
                $query = $connect->prepare($sql);
                $query->bindParam(':user_id', $value['user_id']);
                $query->execute();
                $result3 = $query->fetchColumn();
                echo '
            <div class="cards">
            <img src="' . 'uploads' . $value['image'] . '" alt="Avatar" style="width:100%">
            <div class="text-container">
                <h6>' . $value['price'] . ' RSD</h6>
                <div class="flat-name">
                    <div class="flat-name-loc">
                        <h5>' . $value['type'] . '</h5>
                        <a>' . $result2 . '</a>    
                        <a style="color: red">' . $result3 . '</a>    
                    </div>
                    <div class="flat-icons">
                        <div>
                            <i class="bx bx-bed"></i><a>' . $value['bedroom'] . '</a>
                        </div>
                        <div>
                            <i class="bx bx-bath" ></i><a>' . $value['bathroom'] . '</a>
                        </div>
                    </div>
                </div>
                <form action="details.php" method="get">
                <div class="product-button">
                <input type="hidden" name="product" value="' . $value['id'] . '">
                <a type="submit"><button>Bővebben</button></a>
                </div>
                </form>
            </div>
        </div>';
            }
        }else{
            echo "<div>Nincs eredmény</div>";
        }
        }
        ?>
    </div>
    </div>
    </div>




        <div class="container-fluid" id="Footer-fluid">
            <div class="container" id="Footer">
                <div class="Footer-text">
                    <div class="footer-box">
                        <h2>New Home</h2>
                    </div>
                    <div class="footer-box">
                        <h3>Gyors linkek</h3>
                        <a href="">Ügynökség</a>
                        <a href="">Épületek</a>
                        <a href="">Értékelések</a>
                    </div>
                    <div class="footer-box">
                        <h3>Irodáink</h3>
                        <a href="">Szabadka</a>
                        <a href="">Topolya</a>
                        <a href="">Újvidék</a>
                    </div>
                    <div class="footer-box">
                        <h3>Elérhetőség</h3>
                        <a href="">+381612766605</a>
                        <a href="">danibrada29@gmail.com</a>
                        <div class="footer-icons">
                            <a href=""> <i class='bx bxl-facebook'></i></a>
                            <a href=""><i class='bx bxl-instagram-alt' ></i></a>
                            <a href=""><i class='bx bxl-twitter' ></i></a>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <span>© New Home.kft All Right Reserved</span>
                </div>
            </div>
        </div>
</body>






