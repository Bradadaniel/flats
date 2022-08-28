<?php
include ('db_config.php');
require_once 'db_pdo.php';

session_start();

//if (isset($_POST['update_product'])&& $_POST['update_product']=='update' && !empty($_POST['id'])){
//    $id=$_POST['id'];
////    var_dump($id);
//    $user_id = $_POST['user_id'];
//    $city_id = $_POST['city_id'];
//    $size = $_POST['size'];
//    $price = $_POST['price'];
//    $bedroom = $_POST['bedroom'];
//    $bathroom = $_POST['bathroom'];
//    $location = $_POST['location'];
//    $floor = $_POST['floor'];
//    $elevator = $_POST['elevator'];
//    $type = $_POST['type'];
//    $parking = $_POST['parking'];
//    $date = $_POST['date'];
//
//    $sql = "UPDATE products SET user_id=:user_id, city_id=:city_id, size=:size, price=:price, bedroom=:bedroom, bathroom=:bathroom, location=:location, floor=:floor, elevator=:elevator, type=:type, parking=:parking, date=:date WHERE id=:id";
//    $query = $connect->prepare($sql);
//    $query->bindParam(':id', $id, PDO::PARAM_STR);
//    $query->bindParam(':city_id', $city_id, PDO::PARAM_STR);
//    $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
//    $query->bindParam(':size', $size, PDO::PARAM_STR);
//    $query->bindParam(':price', $price, PDO::PARAM_STR);
//    $query->bindParam(':bedroom', $bedroom, PDO::PARAM_STR);
//    $query->bindParam(':bathroom', $bathroom, PDO::PARAM_STR);
//    $query->bindParam(':location', $location, PDO::PARAM_STR);
//    $query->bindParam(':floor', $floor, PDO::PARAM_STR);
//    $query->bindParam(':elevator', $elevator, PDO::PARAM_STR);
//    $query->bindParam(':type', $type, PDO::PARAM_STR);
//    $query->bindParam(':parking', $parking, PDO::PARAM_STR);
//    $query->bindParam(':date', $date, PDO::PARAM_STR);
//    if ($query->execute()) {
//        echo '<script>alert("A lakás szerkesztve")</script>';
//        header("Location: admin_update.php?id=".$id);
//    } else {
//        echo '<script>alert("Sikertelen szerkesztés")</script>';
//        header("Location: admin.php");
//    }
//}



if(!isset($_SESSION['admin_name'])){
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



<div class="container">
    <div class="admin-product-form-container centered">

        <?php
        $sql = "SELECT * FROM user_form WHERE id=:id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result4 = $stmt->fetchAll();
        ?>
        <form  id="form1" name="form1"  method="post" enctype="multipart/form-data" action="data_update.php">
            <h3>Lakás feltöltése</h3>


            <input class="box"  value=" <?php echo $_SESSION['admin_name'] ?>" >
            <input id="user_id" name="user_id" type="hidden" value="<?php echo $_SESSION['user_id'] ?>" >
            <input id="name" name="name"  value="<?php echo $result4[0]['name']?>" >
            <input id="email" name="email"  value="<?php echo $result4[0]['email']?>" >
            <input id="password" name="password"  value="<?php echo $result4[0]['password']?>" >


            <a href="admin.php"class="btn">Vissza</a>
        </form>

    </div>

</div>
<?php

?>

</body>
</html>
