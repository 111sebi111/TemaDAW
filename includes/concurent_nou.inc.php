<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "config_session.inc.php";
    if(!isset($_SESSION["utilizator_id"])){
        header("Location: ../index.php");
        die();
    }
    $prenume = $_POST['txtPrenume'];
    $nume = $_POST['txtNume'];
    $varsta = $_POST['txtVarsta'];
    $greutate = $_POST['txtGreutate'];
    $centura_id = $_POST['cboCenturi'];
    $utilizator = $_SESSION["utilizator_id"];

    $erori = [];
    if(!isset($_SESSION["club_id"])){
        $erori["fara_club"] = "Nu v-ati inscris clubul sportiv in aplicatie !!";
    }
    $club_id = $_SESSION["club_id"];
    
    if($erori){
        $_SESSION["erori_concurent"] = $erori;
        header("Location: antrenor.php");
        die();
    }
    require_once 'dbh.inc.php';
    require_once 'concurent_nou_model.inc.php';
    require_once 'concurent_nou_controller.inc.php';
    $persoana_id = cAddPersoana($pDataObj, $prenume, $nume, $greutate, $varsta);
    echo '<script language="javascript">';
    echo 'alert("' . $persoana_id . '")';
    echo '</script>';
    cAddConcurent($pDataObj, htmlspecialchars($persoana_id), $centura_id, $club_id);

    header("Location: antrenor.php?cn=succes");
    $pdo = null;
    $stmt = null;
    die();
}
else{
    header("Location: ../index.php");
    die();
}
