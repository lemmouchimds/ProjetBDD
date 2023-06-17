<!DOCTYPE html>
<html>
<head>
    <title>Barre de recherche</title>
</head>
<body>
    <form action="admin.php" method="GET">
        <input type="text" name="keyword" placeholder="Rechercher...">
        <input type="submit" value="Rechercher">
    </form>

    <?php
    
    if(isset($_GET['keyword'])) 
    {
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }
    // rechercher ens et etu
    ?>
</body>
</html>