<?php


include "../connect.php";

$id_u = filterRequest('id_u');

$stmt = $con->prepare("SELECT * FROM `booking` WHERE  id_u = '$id_u' ;");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

?>



