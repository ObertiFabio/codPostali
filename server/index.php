<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandi CAP e Provincia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        code {
            background-color: #f4f4f4;
            padding: 2px 4px;
            border-radius: 4px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Comandi CAP e Provincia</h1>
    </header>
    <section>
        <h2>Comandi disponibili:</h2>
        <ul>
            <li>Ricerca per CAP: <code>http://localhost/cap/search.php?search_cap=XXXXX</code></li>
            <li>Ricerca per Provincia: <code>http://localhost/cap/search.php?search_provincia=Nome_Provincia</code></li>
            <li>Modifica Record: <code>http://localhost/cap/update.php?id=ID_RECORD&new_cap=Nuovo_CAP&new_provincia=Nuova_Provincia</code></li>
            <li>Elimina Record: <code>http://localhost/cap/delete.php?id=ID_RECORD</code></li>
            <li>Aggiungi Record: <code>http://localhost/cap/create.php?new_cap=Nuovo_CAP&new_provincia=Nuova_Provincia</code></li>
        </ul>
    </section>
    <section>
        <h2>Tabella Province</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cap_provincia_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM cap_provincia";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>CAP</th><th>Provincia</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['cap']."</td>";
                echo "<td>".$row['provincia']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nessun risultato trovato.";
        }

        $conn->close();
        ?>
    </section>
</body>
</html>