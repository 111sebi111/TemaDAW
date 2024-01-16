<?php
declare(strict_types=1);

function mGetCenturi(object $pDataObj){
    $selectCenturi = "select * from centuri;";
    $stmt = $pDataObj->prepare($selectCenturi);

    $stmt->execute();
    $rezultat = $stmt->fetchAll();
    return $rezultat;
}