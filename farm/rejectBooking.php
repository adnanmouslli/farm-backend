<?php

include "../connect.php";

$idBooking = filterRequest('idBooking');

$stmt = $con->prepare("DELETE FROM `booking` WHERE id = '$idBooking' ");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}

