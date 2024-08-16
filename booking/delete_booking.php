<?php


include "../connect.php";

$id_u = filterRequest('id_u');
$idSer = filterRequest('idSer');
$date = filterRequest('date');



$stmt = $con->prepare("DELETE FROM `booking` WHERE id_user = $id_u AND id_farm = $idSer AND date = '$date' ");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}


