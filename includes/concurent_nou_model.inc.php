<?php
declare(strict_types=1);

function mAddPersoana(object $pDataObj, string $prenume, string $nume, int $greutate, int $varsta){
    $insertPersoana = "insert into persoana (prenume, nume, greutate, varsta) values (:prenume, :nume, :greutate, :varsta);";
    $stmt = $pDataObj->prepare($insertPersoana);
    $stmt->bindParam(":prenume", $prenume);
    $stmt->bindParam(":nume", $nume);
    $stmt->bindParam(":greutate", $greutate);
    $stmt->bindParam(":varsta", $varsta);

    $stmt->execute();
    $rezultat = $pDataObj->lastInsertId();
    return $rezultat;
}

function mAddConcurent(object $pDataObj, int $persoana_id, int $centura_id, int $club_id){
    $insertConcurent = "insert into concurent (persoana_id, centura_id, club_id) values (:persoana_id, :centura_id, :club_id);";
    $stmt = $pDataObj->prepare($insertConcurent);
    $stmt->bindParam(":persoana_id", $persoana_id);
    $stmt->bindParam(":centura_id", $centura_id);
    $stmt->bindParam(":club_id", $club_id);

    $stmt->execute();
}