<?php

include "../connect.php";


$NewUsername =  filterRequest('NewUsername') ;  
$email = filterRequest('email');
$NewEmail = filterRequest('NewEmail') ;  
$ConfirmPassword =  filterRequest('ConfirmPassword') ;

$stmt = $con->prepare(
    "UPDATE `user` SET `username`= '$NewUsername' ,`email`= '$NewEmail' 
     WHERE email = '$email' and password = '$ConfirmPassword' ;");
$stmt->execute();
 
$count  = $stmt->rowCount();

if ($count > 0) {
    echo     json_encode(array("status" => "success"));
} else {
    echo     json_encode(array("status" => "failure"));
}