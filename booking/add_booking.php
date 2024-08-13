<?php


include "../connect.php";

$id_farm = filterRequest('id_farm');
$id_user = filterRequest('id_user');
$booking = filterRequest('booking');


    $stmt = $con->prepare("INSERT INTO `booking`(`id`, `id_user`, `id_farm`, `date`, `status`) 
    VALUES (null , '$id_user' , '$id_farm' , '' )");

$stmt->execute();

$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

