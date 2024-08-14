<?php


include "../connect.php";

$id_farm = $_POST['id_farm'];
$id_user = $_POST['id_user'];
$booking = $_POST['booking'];


    $stmt = $con->prepare("INSERT INTO `booking`(`id`, `id_user`, `id_farm`, `date`) 
    VALUES (null , '$id_user' , '$id_farm' , '$booking'  )");

$stmt->execute();

$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

