<?php
include ('db_config.php');
require_once 'db_pdo.php';

session_start();

if (isset($_POST['update_product'])&& $_POST['update_product']=='update' && !empty($_POST['id'])){
    $id=$_POST['id'];
//    var_dump($id);
    $user_id = $_POST['user_id'];
    $city_id = $_POST['city_id'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $location = $_POST['location'];
    $floor = $_POST['floor'];
    $elevator = $_POST['elevator'];
    $type = $_POST['type'];
    $parking = $_POST['parking'];
    $date = $_POST['date'];

    $sql = "UPDATE products SET user_id=:user_id, city_id=:city_id, size=:size, price=:price, bedroom=:bedroom, bathroom=:bathroom, location=:location, floor=:floor, elevator=:elevator, type=:type, parking=:parking, date=:date WHERE id=:id";
    $query = $connect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':city_id', $city_id, PDO::PARAM_STR);
    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query->bindParam(':size', $size, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':bedroom', $bedroom, PDO::PARAM_STR);
    $query->bindParam(':bathroom', $bathroom, PDO::PARAM_STR);
    $query->bindParam(':location', $location, PDO::PARAM_STR);
    $query->bindParam(':floor', $floor, PDO::PARAM_STR);
    $query->bindParam(':elevator', $elevator, PDO::PARAM_STR);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query->bindParam(':parking', $parking, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    if ($query->execute()) {
        echo '<script>alert("A lakás szerkesztve")</script>';
        header("Location: user_update.php?id=".$id);
    } else {
        echo '<script>alert("Sikertelen szerkesztés")</script>';
        header("Location: user.php");
    }
}



if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}

$sql = "SELECT * FROM city";
$stmt = $connect->prepare($sql);
$stmt->execute();
$city_name = $stmt->fetchAll();


$sql = "SELECT * FROM user_form";
$stmt = $connect->prepare($sql);
$stmt->execute();
$name = $stmt->fetchAll();

$sql = "SELECT type FROM flat_type";
$stmt = $connect->prepare($sql);
$stmt->execute();
$type = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>New Home</title>
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



<script src="update.js"></script>
<div class="container">
    <div class="admin-product-form-container centered">

        <?php
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result3 = $stmt->fetchAll();
        ?>
        <form onsubmit="check()"  id="form1" name="form1"  method="post" enctype="multipart/form-data" action="user_update.php">
            <h3>Lakás feltöltése</h3>


            <input class="box"  value=" <?php echo $_SESSION['user_name'] ?>" >
            <input id="user_id" name="user_id" type="hidden" value="<?php echo $_SESSION['user_id'] ?>" >
            <span style="color: red" class="error" id="errSelect"></span><br>
            <select id="city_id" name="city_id" class="box">
                <?php foreach($city_name as $city_names){
                    if ($city_names['id'] == $result3[0]['city_id'])
                        echo "<option selected value='".$city_names['id']."'>".$city_names['city_name']."</option>";
                    else
                        echo "<option value='".$city_names['id']."'>".$city_names['city_name']."</option>";
                } ?>
            </select><br>
            <span style="color: red" class="error" id="errSelect2"></span><br>
            <input type="text" placeholder="Lakás mérete" name="size" id="size" class="box" value="<?php echo $result3[0]['size']?>">

            <span style="color: red" class="error" id="errSelect3"></span><br>
            <input type="text" placeholder="Lakás ára" name="price" id="price" class="box" value="<?php echo $result3[0]['price']?>">

            <span style="color: red" class="error" id="errSelect4"></span><br>
            <input type="text" placeholder="Hálószoba" name="bedroom" id="bedroom" class="box" value="<?php echo $result3[0]['bedroom']?>">

            <span style="color: red" class="error" id="errSelect5"></span><br>
            <input type="text" placeholder="Fürdőszoba" name="bathroom" id="bathroom" class="box" value="<?php echo $result3[0]['bathroom']?>">

            <span style="color: red" class="error" id="errSelect6"></span><br>
            <input type="text" placeholder="Utca/Házszám" name="location" id="location" class="box" value="<?php echo $result3[0]['location']?>">

            <span style="color: red" class="error" id="errSelect7"></span><br>
            <input type="text" placeholder="Emelet" name="floor" id="floor" class="box" value="<?php echo $result3[0]['floor']?>">

            <span style="color: red" class="error" id="errSelect8"></span><br>
            <input type="text" placeholder="Lift" name="elevator" id="elevator" class="box" value="<?php echo $result3[0]['elevator']?>">


            <span style="color: red" class="error" id="errSelect1"></span><br>
            <select id="type" name="type" class="box">
                <?php foreach($type as $types){
                    if ($types['type'] == $result3[0]['type'])
                        echo "<option selected value='".$result3[0]['type']."'>".$result3[0]['type']."</option>";
                    else
                        echo "<option value='".$types['type']."'>".$types['type']."</option>";
                } ?>
            </select><br>


            <span style="color: red" class="error" id="errSelect9"></span><br>
            <input type="text" placeholder="Parking" name="parking" id="parking" class="box" value="<?php echo $result3[0]['parking']?>">

            <!--            <span style="color: red" class="error" id="errSelect10"></span><br>-->
            <!--            <input type="text" placeholder="Kép hozzáadása"  name="product_image" id="product_image" class="box">-->

            <span style="color: red" class="error" id="errSelect11"></span><br>
            <input type="date" id="date" name="date" class="box" value="<?php echo $result3[0]['date']?>">
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>">

            <input type="hidden" name="update_product" id="update_product" value="update">
            <input type="submit" class="add-btn"   value="Lakás szerkesztése">

            <a href="user.php"class="btn">Vissza</a>
        </form>

    </div>

</div>
<?php

?>

</body>
</html>
