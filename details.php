<?php
include ('db_config.php');
require_once 'db_pdo.php';

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>New Home</title>
    <link rel="stylesheet" href="details.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
<?php
if (!empty($_GET['product']) ){

    $sql = "SELECT * FROM products WHERE id=:id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':id', $_GET['product']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();



        foreach ($result as $value) {
            $sql = "SELECT city_name
        FROM city WHERE city.id=:city_id";
            $query = $connect->prepare($sql);
            $query->bindParam(':city_id', $value['city_id']);
            $query->execute();
            $result2 = $query->fetchColumn();

            $sql = "SELECT name
        FROM user_form WHERE user_form.id=:user_id";
            $query = $connect->prepare($sql);
            $query->bindParam(':user_id', $value['user_id']);
            $query->execute();
            $result3 = $query->fetchColumn();

            $sql = "SELECT email
        FROM user_form WHERE user_form.id=:user_id";
            $query = $connect->prepare($sql);
            $query->bindParam(':user_id', $value['user_id']);
            $query->execute();
            $result4 = $query->fetchColumn();


            echo '
    <div class="container" id="Catalog">
    <div class="row" id="flat-card">
    
                <div class="cards">
            <img src="' .'uploads'. $value['image'] . '" alt="Avatar" style="width:100%">
            <div class="text-container">
                <h6>' . $value['price'] . ' RSD</h6>
                <div class="flat-name">
                    <div class="flat-name-loc">
                        <h5>' . $value['type'] . '</h5>
                        <h5>' . $result2. '</h5>    
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
                <div class="product-button">
                <br><br>
                <h5 style="color: red">Felhasználó: ' . $result3 . '</h5>
                <h5>Elérés: <a href="mailto: ' . $result4 . '"> ' . $result4 . '</a></h5>
                <h5>Utca: ' . $value['location'] . '</h5>
                <h5>Emelet: ' . $value['floor'] . '</h5>
                <h5>Lift: ' . $value['elevator'] . '</h5>
                <h5>Parking: ' . $value['parking'] . '</h5>
                <h5>Kiadás kezdete: ' . $value['date'] . '</h5>
                <a href="messages.php?conversation=-1&target='.$value['user_id'].'&product='.$value['id'].'"><button>Üzenet küldése</button></a>
                <a href="products.php"><button>Vissza</button></a>
                </div>
               
            </div>
        </div>
    </div>
</div>
';
        }

    }



?>


</body>
</html>