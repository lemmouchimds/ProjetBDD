<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpbdd";

$link = mysqli_connect($servername, $username, $password, $dbname);

//insertion
if (isset($_POST['mat']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date'])) 
{
    $query = "SELECT * FROM etudiant WHERE mat = '$mat'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (empty($data)) {
        $stmt = $link->prepare("INSERT INTO etudiant (mat, nom, prenom, date) VALUES (?, ?, ?, ?)");
        
        
        $mat = $_POST['mat'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date = $_POST['date'];
        
        
        $stmt->bind_param("ssss", $mat, $nom, $prenom, $date);
        $result = $stmt->execute();
    }

    header("Location: ../index.php");
    
}