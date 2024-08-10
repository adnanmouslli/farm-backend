<?php



include "../connect.php" ;


$id_farm = $_POST["id_farm"];

$stmt = $con->prepare("SELECT * FROM `farm-evaluation` WHERE id_farm = '$id_farm'");
$stmt->execute();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC) ;
$count = $stmt -> rowCount() ;

$sum = 0 ;

foreach($data as $rate) {
    $sum += $rate['evaluation'] ;
}


if ($count > 0) {
    $rating = $sum / $count ;
    echo     json_encode(array("status" => "success" , "data" => $rating));
} else {
    echo     json_encode(array("status" => "failure"));
} 
