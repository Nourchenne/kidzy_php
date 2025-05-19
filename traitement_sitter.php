<?php
require('db.php'); 

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp_clair = $_POST['mdp']; 
    $num = $_POST['num'];
    $cin = $_POST['cin'];
    $adresse = $_POST['adresse'];
    $age = $_POST['age']; 
    $photo = $_POST['photo'];
    $cin_front = $_POST['cin_front'];
    $cin_back = $_POST['cin_back'];

    // Hachage
    $mdp = password_hash($mdp_clair, PASSWORD_DEFAULT);

    $check = $db->prepare("SELECT * FROM babysitters WHERE email = :email"); 
    $check->bindParam(':email', $email); 
    $check->execute();

    if ($check->rowCount() > 0) { 
        $message = "<p style='color: orange;'>Email est déjà enregistré.</p>"; 
    } else {
        $insert = $db->prepare("INSERT INTO babysitters 
                                (nom, email, mdp, num, cin, adresse, age, photo, cin_front, cin_back)
                                VALUES 
                                (:nom, :email, :mdp, :num, :cin, :adresse, :age, :photo, :cin_front, :cin_back)");

        $insert->bindParam(':nom', $nom);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':mdp', $mdp);
        $insert->bindParam(':num', $num);
        $insert->bindParam(':cin', $cin);
        $insert->bindParam(':adresse', $adresse);
        $insert->bindParam(':age', $age); 
        $insert->bindParam(':photo', $photo);
        $insert->bindParam(':cin_front', $cin_front);
        $insert->bindParam(':cin_back', $cin_back);

        $insert->execute();

        $message = "<p style='color: green;'>Inscription réussie !</p>";
    }

} else {
    $message = "<p style='color: red;'>Veuillez remplir tous les champs.</p>";
}
