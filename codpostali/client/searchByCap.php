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

// Verifica se il parametro "cap" è stato passato nella richiesta GET
if(isset($_GET['cap'])) {
    $cap = $_GET['cap'];

    // Query per cercare nel database il record corrispondente al CAP specificato
    $sql = "SELECT * FROM cap_provincia WHERE cap = '$cap'";
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
    // Se il parametro "cap" non è stato passato, restituisci un messaggio di errore
    echo "Parametro 'cap' mancante nella richiesta.";
}

// Chiudi la connessione al database
$conn->close();
?>
