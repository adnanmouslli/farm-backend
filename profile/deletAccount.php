<?php

include "../connect.php";


$email = filterRequest('email') ;    
$phone =filterRequest('phone') ;

$stmt = $con->prepare("DELETE FROM `user` WHERE email = '$email' and phone = $phone ;");
$stmt->execute();
 
$count  = $stmt->rowCount();

if ($count > 0) {
    echo     json_encode(array("status" => "success"));
} else {
    echo     json_encode(array("status" => "failure"));
}