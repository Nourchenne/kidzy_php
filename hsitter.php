<!DOCTYPE html>

<?php
require_once('db.php'); 
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Demandes de Garde d’Enfants</title>
  <link rel="stylesheet" href="hs.css"> 
  <link rel="icon" type="image/png" href="img/logo11.png">
</head>

<?php include('nav.html'); ?>
<body>

<h3>Demandes de Garde d’Enfants</h3>

<div class="requests">

    <?php
    try {
        $stmt = $db->prepare("SELECT * FROM babysitting_requests");
        $stmt->execute();
        $requests = $stmt->fetchAll();

        foreach ($requests as $request) {
            echo '<div class="request">
                <h4>' . $request['nom'] . '</h4>
                <p><strong>Email :</strong> ' . $request['email'] . '</p>
                <p><strong>Localisation :</strong> ' . $request['localisation'] . '</p>
                <p><strong>Nombre d’enfants :</strong> ' . $request['nombre_enfants'] . '</p>
                <p><strong>Message :</strong> ' . $request['message'] . '</p>
                <p><strong>Posté le :</strong> ' . $request['created_at'] . '</p>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=' . $request['email'] . '&su=Concernant%20votre%20demande%20de%20garde%20d’enfants&body=Bonjour%20' . $request['nom']. ',%0D%0AJ’ai%20vu%20votre%20demande%20de%20garde%20d’enfants%20et%20souhaite%20en%20discuter%20avec%20vous." target="_blank" class="contact-button">Contacter</a>
                </div>';
        }

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur lors de la récupération des demandes de garde d’enfants : " . $e->getMessage() . "</p>";
    }
    ?>
</div>

<?php include('footer.html'); ?>
</body>
</html>
