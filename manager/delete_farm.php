<?php


include "../connect.php";

$id_fram = $_POST['id_farm'];

$stmt = $con->prepare("DELETE FROM `farms` WHERE id = '$id_fram' ");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

