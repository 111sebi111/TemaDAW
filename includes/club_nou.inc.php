<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "config_session.inc.php";
    require_once "dbh.inc.php";
    require_once "club_nou_model.inc.php";
    require_once "club_nou_controller.inc.php";
    if(!isset($_SESSION["utilizator_id"])){
        header("Location: ../index.php");
        die();
    }
    $utilizator = $_SESSION["utilizator_id"];
    $denumire = $_POST["txtDenumireClub"];

    $erori = [];
    if(esteInputGol($denumire)){
        $erori["fara_club"] = "Completati denumirea clubului.";
    }
    if($erori){
        $_SESSION["erori_club"] = $erori;
        header("Location: antrenor.php");
        die();
    }
    $club_id = adaugaClub($pDataObj, $utilizator, $denumire);
    $_SESSION["club_id"] = htmlspecialchars($club_id);
    header("Location: antrenor.php?ci=succes");
    $pdo = null;
    $stmt = null;
    die();
}
else{
    header("Location: ../index.php");
    die();
}
