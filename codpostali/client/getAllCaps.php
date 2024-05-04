<?php
// Connessione al database (assicurati di includere questo codice in ciascun file)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per selezionare tutti i record dei CAP e delle province
$sql = "SELECT * FROM cap_provincia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inizia la tabella HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>CAP</th><th>Provincia</th></tr>";
    // Output dei dati in una tabella HTML
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['cap']."</td>";
        echo "<td>".$row['provincia']."</td>";
        echo "</tr>";
    }
    // Chiudi la tabella HTML
    echo "</table>";
} else {
    echo "Nessun risultato trovato.";
}

// Chiudi la connessione al database
$conn->close();
?>
