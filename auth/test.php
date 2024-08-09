<?php

include "../connect.php";
 
 

$stmt = $con->prepare("SELECT * FROM `user`; ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo   json_encode(array("status" => "success", "data" => $data));

