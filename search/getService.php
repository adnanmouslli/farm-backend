<?php


include "../connect.php";

$search = filterRequest("search") ;


$stmt = $con->prepare("SELECT MIN(id_ser) AS id_ser, MIN(price_ser) AS price_ser, MIN(url_image) AS url_image, MIN(id_emp) AS id_emp, MIN(Description) AS Description, MIN(max_time) AS max_time, MIN(bookingEnd) AS bookingEnd, MIN(bookingStart) AS bookingStart, name_ser FROM `service` e WHERE name_ser LIKE '$search%' GROUP BY name_ser;");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

