<?php


include "../connect.php" ;

$username =  filterRequest('username') ;  
$password =filterRequest('password') ;
$email = filterRequest('email') ;  
$phone =  filterRequest('phone') ;  



$stmt = $con-> prepare("SELECT * FROM user WHERE email =  '$email' or phone = $phone ");
$stmt->execute() ;

$count =  $stmt->rowCount();


if($count > 0)
 { 
    printFailure() ;
 }
 else{
   $data = array(
    "id" => null,
    "username" => $username,
    "email" => $email,
    "phone" => $phone ,
    "password" => $password ,
    
     );
   insertData("user" , $data) ; 
 }

