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

// Verifica se il parametro "provincia" è stato passato nella richiesta GET
if(isset($_GET['provincia'])) {
    $provincia = $_GET['provincia'];

    // Query per cercare nel database i CAP corrispondenti al nome della provincia specificato
    $sql = "SELECT * FROM cap_provincia WHERE provincia = '$provincia'";
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
} else {
    // Se il parametro "provincia" non è stato passato, restituisci un messaggio di errore
    echo "Parametro 'provincia' mancante nella richiesta.";
}

// Chiudi la connessione al database
$conn->close();
?>
