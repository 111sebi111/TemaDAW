<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $utilizator = $_POST["txtUtilizator"];
    $parola = $_POST["txtParola"];
    $optiune = ['cost'=>12];
    $parolaHash = password_hash($parola, PASSWORD_BCRYPT, $optiune);
    $email = $_POST["txtEmail"];

    try {
        require_once "dbh.inc.php";
        require_once "inregistrare_model.inc.php";
        require_once "inregistrare_controller.inc.php";

        //handling pentru erori
        $erori = [];

        if(esteInputGol($utilizator, $parola, $email)){
            $erori["input_gol"] ="Introduceti toate datele !";
        }
        if(esteEmailInvalid($email)){
            $erori["email_invalid"] ="Email-ul folosit este invalid !";
        }
        if(esteUtilizatorFolosit($pDataObj, $utilizator)){
            $erori["utilizator_folosit"] ="Utilizatorul este deja inregistrat !";
        }
        if(esteEmailFolosit($pDataObj, $email)){
            $erori["email_folosit"] ="Email-ul este deja inregistrat !";
        }

        require_once 'config_session.inc.php';

        if($erori){
            $_SESSION["erori_inregistrare"] = $erori;

            $date_inregistrare = ["utilizator"=>$utilizator, "email"=>$email];
            $_SESSION["date_inregistrare"] = $date_inregistrare;

            header("Location: ../index.php");
            die();
        }
        //######################

        createUtilizator($pDataObj, $utilizator, $parolaHash, $email);
        header("Location: ../index.php?inregistrare=succes");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Inregistrare Esuat: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}