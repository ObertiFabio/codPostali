<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per ottenere tutti i CAP e le Province
$sql = "SELECT * FROM cap_provincia";
$result = $conn->query($sql);

// Controlla se ci sono risultati
if ($result->num_rows > 0) {
    // Crea un array per i risultati
    $caps = array();
    while($row = $result->fetch_assoc()) {
        // Aggiungi ogni riga all'array
        $caps[] = $row;
    }
    // Restituisci i risultati come JSON
    header('Content-Type: application/json');
    echo json_encode($caps);
} else {
    // Se non ci sono risultati, restituisci un messaggio di errore
    echo "Nessun risultato trovato.";
}

// Chiudi la connessione al database
$conn->close();
?>
