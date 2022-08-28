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
    <link rel="stylesheet" href="style.css">
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
                    <li><a href="rolunk.php">Rólunk</a></li>
                    <li><a href="#tulaj">Tulajdonságok</a></li>
                    <li><a href="products.php">Katalógus</a></li>
                    <a href="login.php"><li id="log-in"><h3><i class='bx bx-log-in' ></i></h3></li></a>
                </ul>
            </div>
            <a href="login.php"><h4><i class='bx bx-log-in' id="log-in2"></i></h4></a>
        </nav>
    </div>
</div>

<div class="picture">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="swpier-picure" src="img/valtakozo1.jpg" alt="Elso"></div>
            <div class="swiper-slide"><img class="swpier-picure" src="img/valtakozo2.jpg" alt="Elso"></div>
            <div class="swiper-slide"><img class="swpier-picure" src="img/valtakozo3.jpg" alt="Elso"></div>
            <div class="swiper-slide"><img class="swpier-picure" src="img/valtakozo4.jpg" alt="Elso"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Kitoltes -->
<!---->
    <div class="text">
        Üdvözöljük az oldalon! <br>
        Találja meg álmai otthonát!
    </div>
<!--    <div class="search">-->
<!--        <form>-->
<!--            <div class="rent-sell">-->
<!--                <input type="radio" id="rent" name="rent-sell" style="display: none"><label for="rent">Kiadó</label>-->
<!--                <input type="radio" id="sell" name="rent-sell" style="display: none"><label for="sell">Eladó</label>-->
<!--            </div>-->
<!--            <div class="select-option">-->
<!--                <select>-->
<!--                    <option>Lakás</option>-->
<!--                    <option>Családi ház</option>-->
<!--                    <option>Garázs</option>-->
<!--                </select>-->
<!--            </div>-->
<!--            <div class="search-bar">-->
<!--                <input type="search" placeholder="Város">-->
<!--            </div>-->
<!--            <div class="min-max-price">-->
<!--                <a style="color: white">Ar</a><br>-->
<!--                <input type="number" placeholder="Min"><span style="color: white">&nbsp;-&nbsp;</span><input type="number" placeholder="Max">-->
<!--            </div>-->
<!--            <div class="min-max-meter">-->
<!--                <a style="color: white">m2</a><br>-->
<!--                <input type="number" placeholder="Min"><span style="color: white">&nbsp;-&nbsp;</span><input type="number" placeholder="Max">-->
<!--            </div>-->
<!--            <div class="select-rooms">-->
<!--                <select>-->
<!--                    <option>1 szoba</option>-->
<!--                    <option>2+ szoba</option>-->
<!--                    <option>3+ szoba</option>-->
<!--                    <option>4+ szoba</option>-->
<!--                    <option>5+ szoba</option>-->
<!--                </select>-->
<!--            </div>-->
<!--            <div class="search-icon">-->
<!--                <button><i class='bx bx-search'></i>Keresés</button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
    <!-- rolunk -->
    <div class="container">
        <div class="row" style="margin:100px 0" id="Rolunk">
            <div class="col"><img src="img/rolunk.jpg"></div>
            <div class="col">
                <h5 style="color:#2288ff;">Rólunk</h5>
                <h1 style="color: #192f6a;">New Home Franchise a modern ingatlan-
                    és albérlet-közvetítő vállalat!</h1>
                <p>A New Home csapata, minőségi ingatlanközvetítőként célul tűzte ki, hogy egy megújuló ingatlanpiacon európai normáknak megfelelő szolgáltatást nyújtson.</p>
                <a href="rolunk.html"><button class="more">Bővebben...</button></a>
            </div>
        </div>
        <div class="tulaj" id="tulaj"></div>
        <div  class="row" id="Tulaj" style="margin-bottom: 150px">
            <div onclick="location.href='carrier.php'" class="card">
                <i class='bx bxs-user'></i>
                <h5><b>Karrier lehetőség a New Home-nál</b></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel?</p>
            </div>

            <div onclick="location.href='table.php'" class="card">
                <i class='bx bxs-user'></i>
                <h5><b>Hitel igénylésének lehetőségei</b></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel?</p>
            </div>

            <div onclick="location.href='agents.php'" class="card">
                <i class='bx bxs-user'></i>
                <h5><b>Értékesitő kereső</b></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel?</p>
            </div>
        </div>
    </div>
</div>
<div class="container" id="Catalog">
    <div class="row" id="flat-text">
        <h5 style="color:#2288ff;">Legújabb</h5>
        <h1 style="color: #192f6a;">Kiadó lakások</h1>
        <a href="products.php"><button class="flat-continue">Tovább</button></a>
    </div>
    <div class="row" id="flat-card">
        <!-- -->
        <?php

        $sql = "SELECT * FROM products ";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $sql = "SELECT city_name
        FROM products WHERE city.id=
        INNER JOIN city
        ON products.city_id = city.city_id";
        $query = $connect->prepare($sql);
        $query->bindParam(':city_id', $city_id);


        ?>
        <?php
        foreach ($result as $value) {
            $sql = "SELECT city_name
        FROM city WHERE city.id=:city_id";
            $query = $connect->prepare($sql);
            $query->bindParam(':city_id', $value['city_id']);
            $query->execute();
            $result2 = $query->fetchColumn();

            echo '
            <div class="cards">
            <img src="' .'uploads'. $value['image'] . '" alt="Avatar" style="width:100%">
            <div class="text-container">
                <h6>' . $value['price'] . ' RSD</h6>
                <div class="flat-name">
                    <div class="flat-name-loc">
                        <h5>' . $value['type'] . '</h5>
                        <a>' . $result2. '</a>
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
            </div>
        </div>';
        }?>
        <!-- -->

        <!-- -->
    </div>
</div>

<div class="email container">
    <h5>Kérdése van?<br>Ossza meg velünk!</h5>
    <form action="">
        <input type="email" placeholder="yourmail@mail.com" maxlength="26" required/>
        <button>Küldés</button>
    </form>
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
    <!-- Valtakozo kepek-->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 5,
            centeredSlides: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>










</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>