<?php
declare(strict_types=1);

function date_inregistrare(){
    if(isset($_SESSION["date_inregistrare"]["utilizator"]) && !isset($_SESSION["erori_inregistrare"]["utilizator_folosit"])){
        echo '<input type="text" name="txtUtilizator" placeholder="Utilizator..." value="' . $_SESSION["date_inregistrare"]["utilizator"] . '" autocomplete="off">';
    }else{
        echo '<input type="text" name="txtUtilizator" placeholder="Utilizator..." autocomplete="off">';
    }
    echo '<input type="password" name="txtParola" placeholder="Parola...">';
    if(isset($_SESSION["date_inregistrare"]["email"]) && !isset($_SESSION["erori_inregistrare"]["email_folosit"]) && !isset($_SESSION["erori_inregistrare"]["email_invalid"])){
        echo '<input type="text" name="txtEmail" placeholder="E-Mail" value="' . $_SESSION["date_inregistrare"]["email"] . '" autocomplete="off">';
    }else{
        echo '<input type="text" name="txtEmail" placeholder="E-Mail" autocomplete="off">';
    }
}

function check_signup_errors(){
    if(isset($_SESSION["erori_inregistrare"])){
        $erori = $_SESSION['erori_inregistrare'];
        echo "<br>";

        foreach($erori as $eroare){
            echo '<p class="form-error">' . $eroare . '</p>';
        }

        unset($_SESSION['erori_inregistrare']);
    }else if(isset($_GET["inregistrare"])&& $_GET["inregistrare"]==="succes"){
        echo '<br>';
        echo '<p class="form-success">Signup succes !</p>';
    }
}