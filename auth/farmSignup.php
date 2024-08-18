<?php


include "../connect.php" ;

$name =  filterRequest('name') ;  
$address =filterRequest('address') ;
$phone = filterRequest('phone') ;  
$description =  filterRequest('description') ;  
$password =  filterRequest('password') ;  
$price =  filterRequest('price') ;
$email =  filterRequest('email') ;   


$to = "C:/xampp/htdocs/farm/upload/" ;

$Image = imageUpload("image" , $to);


$data = array(
"id" => null,
"name" => $name,
"address" => $address,
"phone" => $phone ,
"description" => $description ,
"password" => $password ,
"urlImage" =>  $Image ,
"price" => $price ,
"email" => $email
    );
insertData("farms" , $data) ;  


