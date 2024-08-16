<?php


include "../connect.php";

$id_u = filterRequest('id_u');

$stmt = $con->prepare("SELECT * FROM `booking` b JOIN `farms` f on b.id_farm = f.id WHERE id_user = '$id_u' ;");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

