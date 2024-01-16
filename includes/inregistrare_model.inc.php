<?php
declare(strict_types=1);

function get_Utilizator(object $pDataObj, string $utilizator){
    $selectUser = "select utilizator from persoana where utilizator=:utilizator;";
    $stmt = $pDataObj->prepare($selectUser);
    $stmt->bindParam(":utilizator", $utilizator);

    $stmt->execute();
    $rezultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rezultat;
}

function get_Email(object $pDataObj, string $email){
    $selectUser = "select email from persoana where email=:email;";
    $stmt = $pDataObj->prepare($selectUser);
    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $rezultat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rezultat;
}

function setUtilizator(object $pDataObj, string $utilizator, string $parola, string $email){
    $selectUser = "insert into persoana(utilizator, parola, email) values(:utilizator, :parola, :email)";
    $stmt = $pDataObj->prepare($selectUser);
    $stmt->bindParam(":utilizator", $utilizator);
    $stmt->bindParam(":parola", $parola);
    $stmt->bindParam(":email", $email);

    $stmt->execute();
}