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

// Verifica se il parametro "id" è stato passato nella richiesta DELETE
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    // Query per eliminare il record dal database
    $sql = "DELETE FROM cap_provincia WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Restituisci un messaggio di successo
        echo json_encode(["message" => "Record eliminato con successo"]);
    } else {
        // Se si verifica un errore durante l'eliminazione del record, restituisci un messaggio di errore
        echo json_encode(["error" => "Errore nell'eliminazione del record: " . $conn->error]);
    }
} else {
    // Se il parametro "id" non è stato passato, restituisci un messaggio di errore
    echo json_encode(["error" => "Parametro 'id' mancante nella richiesta"]);
}

// Chiudi la connessione al database
$conn->close();
?>

