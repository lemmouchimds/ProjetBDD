<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpbdd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    if ($isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $sql = "SELECT * FROM Enseignant WHERE colonne LIKE '%$keyword%';";
       
        $result = $conn->query($sql);
       
    }


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barre de recherche</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="keyword" placeholder="Rechercher...">
        <input type="submit" value="Rechercher">
    </form>

    <?php
    if ($result->num_rows > 0) {
            
        while($row = $result->fetch_assoc()) {
            echo "Matricule: " . $row["matricule_ens"]. " - Nom: " . $row["nom_ens"]. " - Prenom: " . $row["prenom_ens"]. "<br>";
        }
    } else {
        echo "Aucun enseignant trouvé";
    }
    ?>
    <!-- boutton pour aller a ens insertion -->
</body>
</html>