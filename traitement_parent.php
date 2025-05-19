<?php
require('db.php');

$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp_clair = $_POST['mdp']; 
    $num = $_POST['num'];
    $adresse = $_POST['adresse'];
    $num_enfant = $_POST['num_enfant'];

    $mdp = password_hash($mdp_clair, PASSWORD_DEFAULT);

    $check = $db->prepare("SELECT * FROM parents WHERE email = :email");
    $check->bindParam(':email', $email); 
    $check->execute(); 

    if ($check->rowCount() > 0) { 
        $message = "<p style='color: orange;'>Email est déjà enregistré.</p>";
    } else {
        $insert = $db->prepare("INSERT INTO parents (nom, email, mdp, num, adresse, num_enfant)
                                VALUES (:nom, :email, :mdp, :num, :adresse, :num_enfant)");

        $insert->bindParam(':nom', $nom);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':mdp', $mdp);
        $insert->bindParam(':num', $num);
        $insert->bindParam(':adresse', $adresse);
        $insert->bindParam(':num_enfant', $num_enfant);

        $insert->execute(); 

        $message = "<p style='color: green;'>Inscription réussie !</p>"; 
    }
} else {
    $message = "<p style='color: red;'>Veuillez remplir tous les champs.</p>";
}
