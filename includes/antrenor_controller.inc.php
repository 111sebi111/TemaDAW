<?php
declare(strict_types=1);

function cGetCenturi(){
    require_once 'dbh.inc.php';
    $rezultat = mGetCenturi($pDataObj);
    $pdo = null;
    $stmt = null;
    return $rezultat;
}