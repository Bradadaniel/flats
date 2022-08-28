<?php

include ('db_config.php');
require_once 'db_pdo.php';

session_start();
if (isset($_POST['message_text']) && isset($_POST['conversation']) && !empty(trim($_POST['message_text'])) && !empty($_POST['target']) && !empty($_POST['product']) && !empty($_POST['conversation'])){
    $nextID = 1;
    $sql = "INSERT INTO messages (message_box_id, userOne_id, userTwo_id, products_id, message) VALUES (:conversation, :userOne_id, :userTwo_id, :product, :message)";
    $query = $connect->prepare($sql);
    $query->bindParam(':userTwo_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $query->bindParam(':userOne_id', $_POST['target'], PDO::PARAM_INT);
    $query->bindParam(':product', $_POST['product'], PDO::PARAM_INT);
    if ($_POST['conversation'] > 0)
        $query->bindParam(':conversation', $_POST['conversation'], PDO::PARAM_INT);
    else
    {
        $sql2 = "SELECT MAX(message_box_id)+1 FROM messages";
        $query2 = $connect->prepare($sql2);
        if ($query2->execute()){
            $nextID = $query2->fetchColumn();
            if (empty($nextID)) $nextID = 1;
            $query->bindParam(':conversation', $nextID, PDO::PARAM_INT);
        }
    }
    $query->bindParam(':message', $_POST['message_text'], PDO::PARAM_STR);
    if ($query->execute()) {
        if ($_POST['conversation'] > 0)
            loadMessages($_POST['conversation'], $connect);
        else
            exit(trim('reload'));
    }
    else{
        exit('<script>alert("Nem sikerült elküldeni az üzenetet")</script>');
    }
}
if (!empty($_POST['openmessages'])) {
    loadMessages($_POST['openmessages'], $connect);
}
function loadMessages($conversation_id, $_connect){
    $returnArray = [];
    $return = "";
    $sql = "SELECT m.id, message, userOne_id, userTwo_id, created, products_id as product, u.name FROM messages m INNER JOIN user_form u ON userTwo_id = u.id WHERE (userOne_id = :user OR userTwo_id = :user) and message_box_id = :message_box_id ORDER BY created asc";
    $query = $_connect->prepare($sql);
    $query->bindParam(':user', $_SESSION['user_id'], PDO::PARAM_INT);
    $query->bindParam(':message_box_id', $conversation_id, PDO::PARAM_INT);
    if ($query->execute()) {
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $item) {
            if ($item->userOne_id == $_SESSION['user_id']) {
                $side = "float: left; background-color: #0080ff;";
            } else {
                $side = "float: right; background-color: #00c3ff";
            }
            $returnArray['target'] = $item->userTwo_id;
            $returnArray['product'] = $item->product;
            $returnArray['conversation'] = $conversation_id;
            $return .= "<div style='$side' class='row border my-1 w-100' data-messageline='1' data-messageid = '$item->id'><div>$item->name ($item->userTwo_id)</div> <div>$item->message</div> <div>$item->created</div></div>";
        }
    }
    $returnArray['message'] = $return;
    exit(json_encode($returnArray));
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="container">
<div class="d-flex justify-content-center my-3" style="height: 90vh">
    <div class='col-3 border px-3 d-flex flex-column gap-2 py-1'>
        <?php
        $sql = "SELECT DISTINCT m.id, message_box_id, message, userOne_id, userTwo_id, MAX(created) as created, products_id as product, u.name FROM messages m INNER JOIN user_form u ON userTwo_id = u.id WHERE (userOne_id = :userOne or userTwo_id = :userOne) GROUP BY message_box_id ORDER BY MAX(created) desc";
        $query = $connect->prepare($sql);
        $query->bindParam(':userOne', $_SESSION['user_id'], PDO::PARAM_INT);
        if ($query->execute()) {
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($result as $item){
                echo "<div class='row border d-flex' style='cursor: pointer' data-messagebox='1' data-messagebox_id = '$item->message_box_id'><div>$item->name ($item->userTwo_id)</div> <div>Tétel #$item->product</div> <div>$item->created</div></div>";
            }
        }
        ?>
    </div>
    <div class="col-8 col-12-sm position-relative" style="height: 90vh">
        <?php
        if (isset($_GET['conversation']) && $_GET['conversation'] == -1) {
            $sql = "SELECT name FROM user_form WHERE id=:user_id";
            $query = $connect->prepare($sql);
            $query->bindParam(':user_id', $_GET['target']);
            $query->execute();
            $targetName = $query->fetchColumn();
            echo "<div class='border w-100 position-absolute top-0'>Új csevegés: " . $targetName . " (" . $_GET['target'] . ") - Tétel #" . $_GET['product'] . "</div>";
        }
        ?>
        <div class='border p-3 h-75' id="message-container" style="overflow-y: auto;"></div>
        <div class="border w-100 position-absolute bottom-0">
            <form class="d-none" method="post" name="send_message" id="send_message"></form>
            <textarea form="send_message" name="message_text" id="message_text" class="w-100" cols="20" rows="5" placeholder="Írjon egy üzenetet.." style="resize: none;"></textarea>

            <div id="reload_parameters">
                <input form='send_message' type='hidden' name='target' value='<?php if (isset($_GET['target'])) echo $_GET['target'];?>'>
                <input form='send_message' type='hidden' name='product' value='<?php if (isset($_GET['product'])) echo $_GET['product'];?>'>
                <input form='send_message' type='hidden' name='conversation' value='<?php
                if (isset($_GET['conversation']))
                    echo $_GET['conversation'];
                else
                    echo "0"
                ?>'>
            </div>
            <input form="send_message" class="w-100" type="submit" value="Küldés">
        </div>
    </div>


</div>
<script src="messages.js"></script>
</body>
</html>

