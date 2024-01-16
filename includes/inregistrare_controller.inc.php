<?php
declare(strict_types=1);

function esteInputGol(string $utilizator, string $parola, string $email){
    if(empty($utilizator) || empty($parola) || empty($email)){
        return true;
    }else{
        return false;
    }
}

function esteEmailInvalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function esteUtilizatorFolosit(object $pDataObj, string $utilizator){
    if(get_Utilizator($pDataObj, $utilizator)){
        return true;
    }else{
        return false;
    }
}

function esteEmailFolosit(object $pDataObj, string $email){
    if(get_Email($pDataObj, $email)){
        return true;
    }else{
        return false;
    }
}

function createUtilizator(object $pDataObj, string $utilizator, string $parola, string $email){
    setUtilizator($pDataObj, $utilizator, $parola, $email);
}