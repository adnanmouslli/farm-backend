<?php


include "../connect.php";

$id_u = filterRequest('id_u');
$idSer = filterRequest('idSer');



$stmt = $con->prepare("UPDATE `booking` SET `status`=1 where id_u = $id_u and id_ser = $idSer ; ");
$stmt->execute();
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failure"));
}





?>
