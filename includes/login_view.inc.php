<?php

declare(strict_types=1);

function checkLoginErori(){
    if(isset($_SESSION["erori_login"])){
        $erori = $_SESSION["erori_login"];
        echo "<br>";
        foreach($erori as $eroare){
            echo '<p class="form-error">' . $eroare . '</p>';
        }
        unset($_SESSION["erori_login"]);
    }else if(isset($_GET['login']) && $_GET['login'] === "succes"){
        echo '<br>';
        echo '<p class="form-success">Login succes !</p>';
    }
}