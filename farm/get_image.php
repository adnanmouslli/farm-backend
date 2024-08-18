<?php

include "../connect.php";

$id_farm = filterRequest('id_farm');

$stmt = $con->prepare("SELECT * FROM `farm-image` WHERE id_farm = '$id_farm' ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

