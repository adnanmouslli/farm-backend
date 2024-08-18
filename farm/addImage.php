<?php

include "../connect.php";

$id_farm = $_POST['id_farm'];

$to = "C:/xampp/htdocs/farm/upload/" ;
$Image = imageUpload("image" , $to);


$stmt = $con->prepare("INSERT INTO `farm-image`(`id`, `id_farm`, `imageUrl`) VALUES (null , '$id_farm' , '$Image')");
$stmt->execute();
$count = $stmt -> rowCount();

$id = $con -> lastInsertId();

$stmt = $con->prepare("SELECT * FROM `farm-image` WHERE id = '$id' ");
$stmt->execute();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);



if ($count > 0) {
    echo json_encode(array("status" => "success" , "data" => $data[0]));
} else {
    echo json_encode(array("status" => "failure"));
}