<?php
require('db.php'); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $stmt = $db->prepare("SELECT * FROM parents WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $parent = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($parent && password_verify($mdp, $parent['mdp'])) {
        header("Location: hparent.php");
        exit();
    }

    $stmt = $db->prepare("SELECT * FROM babysitters WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $sitter = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($sitter && password_verify($mdp, $sitter['mdp'])) {
        header("Location: hsitter.php");
        exit();
    }

    header("Location: login.php?error=1");
    exit();
}
?>
