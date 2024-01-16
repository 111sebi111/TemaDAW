<?php
declare(strict_types=1);

function insereazaClub(object $pDataObj, int $utilizator, string $denumire){
    $selectUser = "insert into club_sportiv (denumire, antrenor) values (:denumire, :antrenor);";
    $stmt = $pDataObj->prepare($selectUser);
    $stmt->bindParam(":denumire", $denumire);
    $stmt->bindParam(":antrenor", $utilizator);

    $stmt->execute();
    $rezultat = $pDataObj->lastInsertId();
    return $rezultat;
}