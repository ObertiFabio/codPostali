<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultati Ricerca CAP</title>
</head>
<body>
    <div>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cap_provincia_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        if(isset($_GET['search_cap'])) {
            $search_cap = $_GET['search_cap'];
            $sql = "SELECT * FROM cap_provincia WHERE cap = '$search_cap'";
        } elseif(isset($_GET['search_provincia'])) {
            $search_provincia = $_GET['search_provincia'];
            $sql = "SELECT * FROM cap_provincia WHERE provincia LIKE '%$search_provincia%'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>ID: ".$row['id'].", CAP: ".$row['cap'].", Provincia: ".$row['provincia']."</li>";
            }
            echo "</ul>";
        } else {
            echo "Nessun risultato trovato.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>