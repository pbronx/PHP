<?php
// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottiene il valore inviato dalla macro Excel
    $valore = isset($_POST['valore']) ? $_POST['valore'] : 'Nessun valore ricevuto';
    
    // Salva il valore e l'ora in un file
    $ora = date('H:i');
    $dati = "Aggiornamento ore $ora, valore ricevuto = $valore\n";
    file_put_contents('dati.txt', $dati, FILE_APPEND);
}

// Legge l'ultimo aggiornamento dal file
$ultimoAggiornamento = file_exists('dati.txt') ? file_get_contents('dati.txt') : 'Nessun aggiornamento disponibile';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiornamento Valore</title>
</head>
<body>
    <h1>Ultimo aggiornamento:</h1>
    <p><?php echo nl2br($ultimoAggiornamento); ?></p>
</body>
</html>
