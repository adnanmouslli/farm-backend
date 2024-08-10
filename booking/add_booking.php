<?php


include "../connect.php";

$id_u = filterRequest('id_u');
$idSer = filterRequest('idSer');
$nameSer = filterRequest('nameSer');
$services_duration = filterRequest('services_duration');
$bookingStart = filterRequest('bookingStart');
$bookingEnd = filterRequest('bookingEnd');


$stmt = $con->prepare("SELECT * FROM `booking` WHERE bookingStart = '$bookingStart' and id_ser = $idSer ; ");

$stmt->execute();

$count  = $stmt->rowCount();

if($count > 0)
{
    echo json_encode(array("status" => "notEmpty")); 
}
else {
    $stmt = $con->prepare("INSERT INTO `booking`(`id_u`, `id_ser`,`name_ser` , `services_duration`, `bookingStart`, `bookingEnd`) 
VALUES ($id_u , $idSer , '$nameSer' ,  $services_duration , '$bookingStart' , '$bookingEnd' )");

$stmt->execute();

$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}


}

