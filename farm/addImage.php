<?php

include "../connect.php";

$id_farm = $_POST['id_farm'];

$to = "C:/xampp/htdocs/farm/upload/" ;
$Image = imageUpload("image" , $to);


$stmt = $con->prepare("INSERT INTO `farm-image`(`id`, `id_farm`, `imageUrl`) VALUES (null , '$id_farm' , '$Image')");

$stmt->execute();
 
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success" , "data" => $Image));
} else {
    echo json_encode(array("status" => "failure"));
}