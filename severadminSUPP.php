<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpbdd";

$link = mysqli_connect($servername, $username, $password, $dbname);

if ($link->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

//supp enseignant
$tableName = "Enseignant";
$columnName = "nom_de_la_colonne";// donner le nom de l'enseignant ou l'etudiant 

// Requête SQL pour supprimer la colonne
$sql = "delete from $tableName where $columnName = $val"; // where nom=$enseignant ...... 

// if ($link->query($sql) === TRUE) {
//     echo "L'$tablename $columnName a été supprimée avec succès de la table $tableName.";
// } else {
//     echo "Erreur lors de la suppression de la colonne: " . $conn->error;
// }

$respone = ($link->query($sql))? "T" : "F";
location("index.php/?res=$respone"); //Return to the page with $respone 

// // supp etudiant  faire la meme chose que enseignant
// $tableName = "etudiant";
// $columnName = "nom_de_la_colonne";

// // Requête SQL pour supprimer la colonne
// $sql = "ALTER TABLE $tableName DROP COLUMN $columnName";

// if ($link->query($sql) === TRUE) {
    //     echo "La colonne $columnName a été supprimée avec succès de la table $tableName.";
    // } else {
        //     echo "Erreur lors de la suppression de la colonne: " . $link->error;
// }

$link->close();
?>