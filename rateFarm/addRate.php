<?php


$id_farm = filterRequest('id_farm');
$if_user = filterRequest('if_user');
$evaluation = filterRequest('evaluation');




$stmt = $con->prepare("INSERT INTO `farm-evaluation`(`id`, `id_farm`, `if_user`, `evaluation`) 
                VALUES ( '$id_farm' , '$if_user' , '$evaluation' )");
                
$stmt->execute();