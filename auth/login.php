<?php

include "../connect.php";
 
$password =filterRequest('password') ;
$email = filterRequest('email') ;    

$stmt = $con->prepare("SELECT * FROM `user` WHERE email = '$email' and password = '$password'; ");
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo     json_encode(array("status" => "success", "data" => $data));
} else {
    echo     json_encode(array("status" => "failure"));
}