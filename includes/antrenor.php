<?php
require_once 'config_session.inc.php';
require_once 'antrenor_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Inregistrare Club</h3>
    <form action="club_nou.inc.php" method="POST">
        <input type="text" name="txtDenumireClub" placeholder="Denumire...">
        <button>Adauga Club</button>        
    </form>
    <?php
    checkEroriClub();
    ?>
    <h3>Concurent nou</h3>
    <form action="concurent_nou.inc.php" method="POST">
        <input type="text" name="txtPrenume" placeholder="Prenume...">
        <input type="text" name="txtNume" placeholder="Nume...">
        <input type="text" name="txtVarsta" placeholder="Varsta...">
        <input type="text" name="txtGreutate" placeholder="Greutate...">
        <?php getCenturi() ?>
        <button>Adauga Concurent</button>
    </form>
    <?php
    checkEroriConcurent();
    ?>
</body>
</html>