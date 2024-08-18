<?php

include "../connect.php";

$id = filterRequest('id');

$stmt = $con->prepare("DELETE FROM `farm-image` WHERE id = '$id' ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

