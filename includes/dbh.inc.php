<?php

$con = "mysql:host=localhost;dbname=competitiisportive";
$dbuser = "root";
$dbpass = "";

try {
    $pDataObj = new PDO($con, $dbuser, $dbpass);
    $pDataObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ConexiuneDB esuata: " . $e->getMessage());
}