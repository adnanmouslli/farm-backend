<?php

include "../connect.php";

$id_farm = filterRequest('id_farm');
$description = filterRequest('description');
$offer_value = filterRequest('offer_value');
$offer_day = filterRequest('offer_day');


$stmt = $con->prepare("INSERT INTO `offers`(`id`, `id_farm`, `description`, `offer_value`, `offer_day`)
     VALUES (null , '$id_farm' , '$description' , '$offer_value' , '$offer_day')");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

