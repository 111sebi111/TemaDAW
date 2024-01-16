<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $utilizator = $_POST["txtUtilizator"];
    $parola = $_POST["txtParola"];
    // $optiune = ['cost'=>12];
    // $parolaHash = password_hash($parola, PASSWORD_BCRYPT, $optiune);

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_controller.inc.php';

        //handling pentru erori
        $erori = [];

        if(esteInputGol($utilizator, $parola)){
            $erori["input_gol"] ="Introduceti toate datele !";
        }
        $rezultat = getUtilizator($pDataObj, $utilizator);
        if(esteUtilizatorIncorect($rezultat)){
            $erori["login_incorect"] ="Utilizator incorect !";
        }
        if(!esteUtilizatorIncorect($rezultat) && esteParolaIncorecta($parola, $rezultat["parola"])){
            $erori["login_incorect"] ="Parola incorecta !";
        }

        require_once 'config_session.inc.php';

        if($erori){
            $_SESSION["erori_login"] = $erori;
            header("Location: ../index.php");
            die();
        }
        //######################
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $rezultat["persoana_id"];
        session_id($sessionId);

        $_SESSION["utilizator_id"] = $rezultat["persoana_id"];
        $_SESSION["utilizator_utilizator"] = htmlspecialchars($rezultat["utilizator"]);
        $_SESSION['last_regeneration'] = time();

        header("Location: ../index.php?login=succes");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Login Esuat: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}