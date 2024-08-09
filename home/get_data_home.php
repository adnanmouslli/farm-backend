<?php


include "../connect.php";

//getAllData("employee" , "1 = 1") ;

$stmt = $con->prepare("SELECT  * FROM `employee` ");
$stmt->execute();
$data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count1  = $stmt->rowCount();


$stmt = $con->prepare("SELECT MIN(id_ser) AS id_ser, MIN(price_ser) AS price_ser, MIN(url_image) AS url_image, MIN(id_emp) AS id_emp, MIN(Description) AS Description, MIN(max_time) AS max_time, MIN(bookingEnd) AS bookingEnd, MIN(bookingStart) AS bookingStart, name_ser , MAX(offer) AS offer FROM `service` e GROUP BY name_ser;");
$stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count2  = $stmt->rowCount();


if ($count1 > 0 || $count2 > 0) {
    echo json_encode(array("status" => "success", "data1" => $data1 , "data2" => $data2));
} else {
    echo json_encode(array("status" => "failure"));
}

?>
