<?php


include "../connect.php";



$stmt = $con->prepare("SELECT  * FROM `farms` ");
$stmt->execute();
$data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count1  = $stmt->rowCount();


$stmt = $con->prepare("SELECT * FROM `farm-image`");
$stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count2  = $stmt->rowCount();


$stmt = $con->prepare("SELECT of.* , fa.name , fa.price FROM `offers` of join `farms` fa ON of.id_farm = fa.id;");
$stmt->execute();
$data3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count3  = $stmt->rowCount();



if ($count1 > 0) {
    echo json_encode(array("status" => "success", "data1" => $data1 , "data2" => $data2 , "data3" => $data3));
} else {
    echo json_encode(array("status" => "failure"));
}

?>
