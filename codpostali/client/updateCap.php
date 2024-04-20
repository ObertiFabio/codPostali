<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione al database
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Leggi i dati dal corpo della richiesta
$data = json_decode(file_get_contents("php://input"), true);

// Verifica se i dati richiesti sono stati passati
if (isset($data['id']) && isset($data['cap']) && isset($data['provincia'])) {
    $id = $data['id'];
    $updatedCap = $data['cap'];
    $updatedProvincia = $data['provincia'];

    // Query per aggiornare il record nel database
    $sql = "UPDATE cap_provincia SET cap='$updatedCap', provincia='$updatedProvincia' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Restituisci un messaggio di successo
        echo json_encode(["message" => "Record aggiornato con successo"]);
    } else {
        // Se si verifica un errore durante l'aggiornamento del record, restituisci un messaggio di errore
        echo json_encode(["error" => "Errore nell'aggiornamento del record: " . $conn->error]);
    }
} else {
    // Se i dati richiesti non sono stati passati, restituisci un messaggio di errore
    echo json_encode(["error" => "Parametri mancanti nella richiesta"]);
}

// Chiudi la connessione al database
$conn->close();
?>
