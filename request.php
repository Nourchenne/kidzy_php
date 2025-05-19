<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $localisation = $_POST['localisation'];
    $nombre_enfants = $_POST['nombre_enfants'];
    $message = $_POST['message'] ?? ''; 

    $stmt = $db->prepare("INSERT INTO babysitting_requests (nom, email, localisation, nombre_enfants, message) 
                          VALUES (:nom, :email, :localisation, :nombre_enfants, :message)");

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':localisation', $localisation);
    $stmt->bindParam(':nombre_enfants', $nombre_enfants);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        header('Location: hparent.php?success=1');
    } else {
        header('Location: hparent.php?error=1');
    }
}
