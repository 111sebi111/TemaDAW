<?php

declare(strict_types=1);

function getUtilizator(object $pDataObj, string $utilizator){
    $selectUser = "select * from persoana where utilizator=:utilizator;";
    $stmt = $pDataObj->prepare($selectUser);
    $stmt->bindParam(":utilizator", $utilizator);

    $stmt->execute();
    $rezultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rezultat;
}