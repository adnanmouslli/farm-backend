<?php


include "../connect.php";

$idSer = filterRequest('idSer');

$stmt = $con->prepare("SELECT * FROM `booking` WHERE id_ser = $idSer ;");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();


if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

?>



