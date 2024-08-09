<?php

include "../connect.php";

$username =  filterRequest('username') ;  
$password =filterRequest('password') ;
$email = filterRequest('email') ;  
$phone =  filterRequest('phone') ;  
$address = filterRequest('address') ; 


$stmt = $con->prepare("DELETE FROM `user` WHERE email = '$email' and phone = $phone ;");
$stmt->execute();
 
$count  = $stmt->rowCount();

if ($count > 0) {
    echo     json_encode(array("status" => "success"));
} else {
    echo     json_encode(array("status" => "failure"));
}