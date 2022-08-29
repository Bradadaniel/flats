<?php
@include 'db_config.php';
require_once 'db_pdo.php';

session_start();

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
    <title>User Page</title>
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

<div class="container" id="admin-con">
    <div class="content">
        <h3>Felhasznalo </h3>
        <h1>Üdv <span><?php
                echo $_SESSION['user_name']
                ?></span></h1>
        <a href="login.php" class="btn">login</a>
        <a href="register.php" class="btn">register</a>
        <a href="logout.php" class="btn">logout</a>
        <a href="messages.php"  class="btn">Üzenetek</a>
        <a href="products.php"  class="btn">Katalógus</a>
<!--        <a href="userdata_update.php"  class="btn">Adatok módositása</a>-->
    </div>
</div>


<script src="script.js"></script>
<div class="container" id="admin-form">
    <script></script>
    <div class="admin-product-form-container">
        <form onsubmit="check()"  id="form1" name="form1"  method="post" enctype="multipart/form-data">
            <h3>Lakás feltöltése</h3>

            <input class="box"  value=" <?php echo $_SESSION['user_name'] ?>" >
            <input id="user_id" name="user_id" type="hidden" value="<?php echo $_SESSION['user_id'] ?>" >
            <span style="color: red" class="error" id="errSelect"></span><br>
            <select id="city_id" name="city_id" class="box">
                <?php foreach($city_name as $city_names): ?>
                    <option selected disabled hidden>- Válasszon helységet -</option>
                    <option value="<?= $city_names['id']; ?>"><?= $city_names['city_name']; ?></option>
                <?php endforeach; ?>
            </select><br>
            <span style="color: red" class="error" id="errSelect2"></span><br>
            <input type="text" placeholder="Lakás mérete" name="size" id="size" class="box">

            <span style="color: red" class="error" id="errSelect3"></span><br>
            <input type="text" placeholder="Lakás ára" name="price" id="price" class="box">

            <span style="color: red" class="error" id="errSelect4"></span><br>
            <input type="text" placeholder="Hálószoba" name="bedroom" id="bedroom" class="box">

            <span style="color: red" class="error" id="errSelect5"></span><br>
            <input type="text" placeholder="Fürdőszoba" name="bathroom" id="bathroom" class="box">

            <span style="color: red" class="error" id="errSelect6"></span><br>
            <input type="text" placeholder="Utca/Házszám" name="location" id="location" class="box">

            <span style="color: red" class="error" id="errSelect7"></span><br>
            <input type="text" placeholder="Emelet" name="floor" id="floor" class="box">

            <span style="color: red" class="error" id="errSelect8"></span><br>
            <input type="text" placeholder="Lift" name="elevator" id="elevator" class="box">


            <span style="color: red" class="error" id="errSelect1"></span><br>
            <select id="type" name="type" class="box">
                <?php foreach($type as $types): ?>
                    <option selected disabled hidden>- Válasszon egy tipust -</option>
                    <option value="<?= $types['type']; ?>"><?= $types['type']; ?></option>
                <?php endforeach; ?>
            </select><br>


            <span style="color: red" class="error" id="errSelect9"></span><br>
            <input type="text" placeholder="Parking" name="parking" id="parking" class="box">

            <span style="color: red" class="error" id="errSelect10"></span><br>
            <input type="file" placeholder="Kép hozzáadása"  name="product_image" id="product_image" accept="*/uploads" class="box">
            <!--            -->
            <!--            <input name="file" type="file"  required="required" class="form-control"/>-->
            <!--            -->

            <span style="color: red" class="error" id="errSelect11"></span><br>
            <input type="date" id="date" name="date" class="box">

            <input type="submit" class="add-btn" name="add_product" id="add_product"  value="Lakás hozzáadása">


        </form>
    </div>

    <?php
//$_SESSION['user_id']
    $sql = "SELECT * FROM products WHERE user_id= :user_id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();


    //    delete
    if (isset($_GET['delete'])){
        $id= $_GET['delete'];
        $sql = "DELETE FROM products WHERE id=$id";
        $stmt= $connect->prepare($sql);
        $stmt->execute([]);
    }

    ?>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
            <tr>
                <th>Kép</th>
                <th>Felhasználó</th>
                <th>Város</th>
                <th>Méret</th>
                <th>Ár</th>
                <th>Hálószoba</th>
                <th>Fördőszoba</th>
                <th>Cim</th>
                <th>Emelet</th>
                <th>Tipus</th>
                <th>Parking</th>
                <th>Beköltözési dátum</th>
                <th colspan="2">Művelet</th>
            </tr>
            </thead>
            <?php
            foreach ($result as $value) {
                $sql = "SELECT name
        FROM user_form WHERE user_form.id=:user_id";
                $query = $connect->prepare($sql);
                $query->bindParam(':user_id', $value['user_id']);
                $query->execute();
                $result3 = $query->fetchColumn();

                $sql = "SELECT city_name
        FROM city WHERE city.id=:city_id";
                $query = $connect->prepare($sql);
                $query->bindParam(':city_id', $value['city_id']);
                $query->execute();
                $result2 = $query->fetchColumn();
                echo  '<tr>
                            <td><img width="80px" height="80px" src ="' .'uploads'. $value['image'] . '"></td>
                            <td>' . $result3 . '</td>
                            <td>' . $result2 . '</td>
                            <td>' . $value['size'] . ' m²</td>
                            <td>' . $value['price'] . ' din</td>
                            <td>' . $value['bedroom'] . '</td>
                            <td>' . $value['bathroom'] . '</td>
                            <td>' . $value['location'] . '</td>
                            <td>' . $value['floor'] . '</td>
                            <td>' . $value['type'] . '</td>
                            <td>' . $value['parking'] . '</td>
                            <td>' . $value['date'] . '</td>  
                            <td colspan="2">
                            <a href="user_update.php?id='.$value['id'].'" type="submit" value="' . $value['id'] . '" class="btn"><i class="bx bx-edit-alt"></i> Szerk.</a>
                            <a href="user.php?delete='.$value['id'].'" type="submit"  value="' . $value['id'] . '" class="btn"><i class="bx bx-trash"></i>Törl.</a>
                            </td>
                     </tr>';
            }
            ?>

        </table>
    </div>
</div>

<?php
require_once 'db_pdo.php';


if (isset($_POST['user_id']) && ($_POST['city_id']) && ($_POST['type'])) {
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

    $product_image = $_FILES['product_image']['name'];
    $tmp_dir = $_FILES['product_image']['tmp_name'];
    $imagesSize=$_FILES['product_image']['size'];

    $upload_dir='uploads';
    $imgExt=strtolower(pathinfo($product_image, PATHINFO_EXTENSION));
    $valid_extension=array('jpeg','jpg','png',);
    $images= rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$images);




//        if ($city_id != 'Válasszon' && $type != 'Válasszon') {
    $sql = "INSERT INTO products (city_id, user_id, size, price, bedroom, bathroom, location, floor, elevator, type, parking, date, image) VALUES (:city_id, :user_id, :size, :price, :bedroom, :bathroom, :location, :floor, :elevator, :type, :parking, :date, :image)";
    $query = $connect->prepare($sql);
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
    $query->bindParam(':image', $images);
    if ($query->execute()) {
        echo '<script>alert("A lakás hozzáadva")</script>';
        header("Refresh: 2");
    } else {
        header("Location: user.php");
    }
//        }
}
?>

</body>

</html>
<?php
