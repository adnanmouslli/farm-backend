<?php


include "../connect.php" ;

$username =  filterRequest('username') ;  
$password =filterRequest('password') ;
$email = filterRequest('email') ;  
$phone =  filterRequest('phone') ;  
$address = filterRequest('address') ; 



$stmt = $con-> prepare("SELECT * FROM user WHERE email =  '$email' or phone = $phone ");
$stmt->execute() ;

$count =  $stmt->rowCount();


if($count > 0)
 { 
    printFailure() ;
 }
 else{
   $data = array(
    "user_id" => null,
    "username" => $username,
    "email" => $email,
    "phone" => $phone ,
    "address" => $address ,
    "password" => $password ,
     );
   insertData("user" , $data) ; 
 }

