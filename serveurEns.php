<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpbdd";

$link = mysqli_connect($servername, $username, $password, $dbname);

//insertion
if (isset($_POST['mat']) && isset($_POST['nom']) && isset($_POST['prenom'])) 
{
    $query = "SELECT * FROM etudiant WHERE mat = '$mat'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($data)) {
        $stmt = $link->prepare("INSERT INTO etudiant (mat, nom, prenom) VALUES (?, ?, ?)");
        
        
        $mat = $_POST['mat'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        
        $stmt->bind_param("ssss", $mat, $nom, $prenom);
        $result = $stmt->execute();
    }

    header("Location: ../index.php");
    
}