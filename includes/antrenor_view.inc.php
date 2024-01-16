<?php

declare(strict_types=1);

function checkEroriConcurent(){
    if(isset($_SESSION["erori_concurent"])){
        $erori = $_SESSION["erori_concurent"];
        echo "<br>";
        foreach($erori as $eroare){
            echo '<p class="form-error">' . $eroare . '</p>';
        }
        unset($_SESSION["erori_concurent"]);
    }else if(isset($_GET['cn']) && $_GET['cn'] === "succes"){
        echo '<br>';
        echo '<p class="form-success">Concurent adaugat !</p>';
    }
}

function checkEroriClub(){
    if(isset($_SESSION["erori_club"])){
        $erori = $_SESSION["erori_club"];
        echo "<br>";
        foreach($erori as $eroare){
            echo '<p class="form-error">' . $eroare . '</p>';
        }
        unset($_SESSION["erori_club"]);
    }else if(isset($_GET['ci']) && $_GET['ci'] === "succes"){
        echo '<br>';
        echo '<p class="form-success">Club adaugat !</p>';
    }
}

function getCenturi(){
    require_once 'antrenor_model.inc.php';
    require_once 'antrenor_controller.inc.php';
    $centuri = cGetCenturi();
    echo '<label for="cboCenturi">Selecteaza centura:</label>';
    echo '<select id="cboCenturi" name="cboCenturi">';
    foreach($centuri as $centura){
        echo '<option value="' . $centura['centura_id'] . '">' . $centura['descriere'] . '</option>';        
    }
    echo '</select>';
}