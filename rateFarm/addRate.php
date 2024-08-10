<?php

include "../connect.php" ;


$id_farm = $_POST["id_farm"];
$id_user = $_POST["id_user"];
$evaluation = $_POST["evaluation"];


$stmt = $con->prepare("SELECT * FROM `farm-evaluation` WHERE id_user = '$id_user' and id_farm = '$id_farm'");
$stmt->execute();
$count = $stmt -> rowCount() ;

if($count > 0) {

    $stmt = $con->prepare("UPDATE `farm-evaluation` SET `evaluation`= '$evaluation' WHERE id_farm = '$id_farm' AND id_user = '$id_user'");
                    
    $stmt->execute();
    $count = $stmt -> rowCount();
    
    if ($count > 0) {
        echo     json_encode(array("status" => "success"));
    } else {
        echo     json_encode(array("status" => "failure"));
    } 


}
else {

$stmt = $con->prepare("INSERT INTO `farm-evaluation`(`id`, `id_farm`, `id_user`, `evaluation`) 
VALUES (null , '$id_farm' , '$id_user' , '$evaluation' )");
                
$stmt->execute();
$count = $stmt -> rowCount();

if ($count > 0) {
    echo     json_encode(array("status" => "success"));
} else {
    echo     json_encode(array("status" => "failure"));
}

}




