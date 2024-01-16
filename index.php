<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/inregistrare_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Inregistrare</h3>
    <form action="includes/inregistrareHandler.inc.php" method="post">
        <?php
        date_inregistrare();
        ?>
        <button>Inregistreaza</button>
    </form>
    <?php
    check_signup_errors();
    ?>
    <h3>Login</h3>
    <form action="includes/loginHandler.inc.php" method="post">
        <input type="text" name="txtUtilizator" placeholder="Utilizator...">
        <input type="password" name="txtParola" placeholder="Parola...">
        <button>Login</button>
    </form>
    <?php
    checkLoginErori();
    ?>
    <h3>Cautare turneu in functie de disciplina</h3>
    <form class="frmCautare" action="cautare.php" method="POST">
        <label for="txtCautare">Turnee:</label>
        <input id="txtCautare" type="text" name="cautareTurneu" placeholder="Disciplina...">
        <button>Cauta</button>
    </form>
</body>
</html>