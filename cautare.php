<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cautare = $_POST["cautareTurneu"];

    try {
        require_once "includes/dbh.inc.php";
        $selectTurneu = "select * from turneu left join disciplina on turneu.disciplina_id = disciplina.disciplina_id where activ=1 and disciplina.denumire=:cautare";
        $stmt = $pDataObj->prepare($selectTurneu);

        $stmt->bindParam(":cautare", $cautare);

        $stmt->execute();

        $rezultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query esuat: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Rezultate Cautare:</h3>
    <?php
        if(empty($rezultat)){
            echo "<div>";
            echo "<p>Nu am gasit turnee cu disciplina cautata</p>";
            echo "</div>";
        }else{
            foreach($rezultat as $r){
                echo "<div>";
                echo "<p>Data Inceput " . htmlspecialchars($r["data_inceput"]) . "</p>";
                echo "<p>Data Sfarsit " . htmlspecialchars($r["data_sfarsit"]) . "</p>";
                echo "</div>";
            }
        }
    ?>
</body>
</html>