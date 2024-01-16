<?php

declare(strict_types=1);

function cAddPersoana(object $pDataObj, string $prenume, string $nume, int $greutate, int $varsta){
    $rezultat = mAddPersoana($pDataObj, $prenume, $nume, $greutate, $varsta);
    return $rezultat;
}

function cAddConcurent(object $pDataObj, int $persoana_id, int $centura_id, int $club_id){
    mAddConcurent($pDataObj, $persoana_id, $centura_id, $club_id);
}