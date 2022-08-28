<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>New Home</title>
    <link rel="stylesheet" href="table.css">
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

<div style="margin-top: 130px" class="table">
    <div class="table-header">
        <h1>Hitel lehetőségek</h1>
    </div>
    <div class="table-section">
        <table>
            <thead>
            <tr>
                <th>Hitel</th>
                <th>Kamat</th>
                <th>Végösszeg</th>
                <th>Idő</th>
                <th>Értékelés</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1.000€</td>
                <td>15%</td>
                <td>1.150€</td>
                <td>12hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bx-star' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>2.000€</td>
                <td>14%</td>
                <td>2.280€</td>
                <td>16hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bx-star' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>3.000€</td>
                <td>13%</td>
                <td>3.390€</td>
                <td>20hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bx-star' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>4.000€</td>
                <td>12%</td>
                <td>4.480€</td>
                <td>24hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bx-star' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>5.000€</td>
                <td>11%</td>
                <td>5.550€</td>
                <td>28hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bx-star' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>6.000€</td>
                <td>10%</td>
                <td>6.600€</td>
                <td>32hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>7.000€</td>
                <td>9%</td>
                <td>7.630€</td>
                <td>36hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>8.000€</td>
                <td>8%</td>
                <td>8.640€</td>
                <td>40hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>9.000€</td>
                <td>7%</td>
                <td>9.630€</td>
                <td>44hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>10.000€</td>
                <td>6%</td>
                <td>10.600€</td>
                <td>46hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                    </div></td>
            </tr>

            <tr>
                <td>20.000€</td>
                <td>5%</td>
                <td>21.000€</td>
                <td>60hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div></td>
            </tr>

            <tr>
                <td>40.000€</td>
                <td>3%</td>
                <td>41.200€</td>
                <td>90hónap</td>
                <td><div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div></td>
            </tr>
            </tbody>
        </table>
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
</html>