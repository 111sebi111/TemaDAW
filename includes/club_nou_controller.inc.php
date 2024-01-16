<?php
declare(strict_types=1);

function esteInputGol(string $denumire){
    if(empty($denumire)){
        return true;
    }else{
        return false;
    }
}

function adaugaClub(object $pDataObj, int $utilizator, string $denumire){
    $rezultat = insereazaClub($pDataObj, $utilizator, $denumire);
    return $rezultat;
}