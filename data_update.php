<?php
include ('db_config.php');
require_once 'db_pdo.php';

session_start();


if (isset($_POST['update_product'])&& $_POST['update_product']=='update' && !empty($_POST['id'])){
    $id=$_POST['id'];
//    var_dump($id);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    $sql = "UPDATE user_form SET name=:name, email=:email, user_type=:user_type WHERE id=:id";
    $query = $connect->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':user_type', $user_type, PDO::PARAM_STR);
    if ($query->execute()) {
        echo '<script>alert("A lakás szerkesztve")</script>';
        header("Location: data_update.php?id=".$id);
    } else {
        echo '<script>alert("Sikertelen szerkesztés")</script>';
        header("Location: admin.php");
    }
}



$sql = "SELECT * FROM user_form";
$stmt = $connect->prepare($sql);
$stmt->execute();
$name = $stmt->fetchAll();
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
        $result3 = $stmt->fetchAll();
        ?>
        <form onsubmit="check()"  id="form1" name="form1"  method="post" enctype="multipart/form-data" action="data_update.php">
            <h3>Felhasználó szerkesztése</h3>

            <input type="text" placeholder="Fel. nev" name="name" id="name" class="box" value="<?php echo $result3[0]['name']?>">

            <input type="text" placeholder="Email" name="email" id="email" class="box" value="<?php echo $result3[0]['email']?>">

            <input type="text" placeholder="Tipus" name="user_type" id="user_type" class="box" value="<?php echo $result3[0]['user_type']?>">


            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'];?>">

            <input type="hidden" name="update_product" id="update_product" value="update">
            <input type="submit" class="add-btn"   value="Felhasználó szerkesztése">

            <a href="admin.php" class="btn">Vissza</a>
        </form>

    </div>

</div>


</body>
</html>

