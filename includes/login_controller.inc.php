<?php

declare(strict_types=1);

function esteUtilizatorIncorect(bool|array $rezultat){
    if(!$rezultat){
        return true;
    }else{
        return false;
    }
}

function esteParolaIncorecta(string $parola, string $parolaDB){
    if(!password_verify($parola, $parolaDB)){
        return true;
    }else{
        return false;
    }
}

function esteInputGol(string $utilizator, string $parola){
    if(empty($utilizator) || empty($parola)){
        return true;
    }else{
        return false;
    }
}