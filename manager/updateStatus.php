<?php


include "../connect.php";

$id_farm = filterRequest('id_farm');




$stmt = $con->prepare("UPDATE `farms` SET `status`= 1 WHERE id = '$id_farm' ");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}
