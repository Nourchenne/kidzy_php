<!DOCTYPE html>

<?php
require('db.php'); 
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil Parent</title>  
  <link rel="stylesheet" href="hp.css">  
  <link rel="icon" type="image/png" href="img/logo11.png">
</head>

<?php include('nav.html'); ?>
<body>

<div class="publication-box">
    <h3>Publier une Demande de Garde d’Enfants</h3>
    
    <?php 
    if (isset($_GET['success'])) {
    echo '<p style="color: green; text-align: center;">Demande envoyée avec succès.</p>';}
    if (isset($_GET['error'])) {
    echo '<p style="color: red; text-align: center;">Une erreur est survenue. Veuillez réessayer.</p>';}
    ?>

<form action="request.php" method="post">
    <input type="text" name="nom" placeholder="Votre nom" required><br>
    <input type="email" name="email" placeholder="Votre adresse email" required><br>        
    <input type="text" name="localisation" placeholder="Votre localisation" required><br>        
    <input type="number" name="nombre_enfants" placeholder="Nombre d’enfants" required min="1"><br>        
    <textarea name="message" placeholder="Informations supplémentaires (facultatif)"></textarea><br>        
    <button type="submit" class="publish-btn">Envoyer la demande</button>
</form>

</div>

<div class="articles">
    <h3>Nos Babysitters</h3>

    <?php
    try {
        $stmt = $db->prepare("SELECT * FROM babysitters");        
        $stmt->execute();
        
        $babysitters = $stmt->fetchAll();
        
        foreach ($babysitters as $sitter) {
             echo ' <div class="article">
             <img src="' . $sitter['photo'] . '" alt="' . $sitter['nom'] . '">             
             <h3>' . $sitter['nom'] . '</h3>             
             <p>Age : ' . $sitter['age'] . ' ans</p>             
             <p>Email : <a href="mailto:' . $sitter['email'] . '">' . $sitter['email'] . '</a></p>             
             <p>Téléphone : ' . $sitter['num'] . '</p>             
             <p>Adresse : ' . $sitter['adresse'] . '</p>             
             <a href="https://mail.google.com/mail/?view=cm&fs=1&to=' . $sitter['email']. '&su=Demande%20de%20babysitting&body=Bonjour%20' . $sitter['nom']. ',%0D%0AJe%20suis%20intéressé(e)%20par%20vos%20services%20de%20garde%20d’enfants." target="_blank" class="contact-btn">Contacter</a>             
            </div>';
        }

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur lors de la récupération des babysitters : " . $e->getMessage() . "</p>";
    }
    ?>
</div>

<?php include('footer.html'); ?>

</body>
</html>
