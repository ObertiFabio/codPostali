<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cap_provincia_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cap_provincia WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record eliminato con successo.";
    } else {
        echo "Errore nell'eliminazione del record: " . $conn->error;
    }
}

$conn->close();
?>