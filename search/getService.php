<?php


include "../connect.php";

$search = filterRequest("search") ;


if (is_numeric($search)) {
    $stmt = $con->prepare("SELECT * FROM `farms` WHERE price LIKE '$search%' and status = 1") ;
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
} 

else if (ctype_alpha($search)) {
    $stmt = $con->prepare("SELECT * FROM `farms` WHERE  LIKE '$search%' and status = 1") ;
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
}
else {

    echo json_encode(array("status" => "failure"));

}






