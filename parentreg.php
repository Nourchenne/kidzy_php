<?php
include('traitement_parent.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription Parent</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="parentreg.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/logo11.png">
</head>

<body>
<div class="nv">
  <?php include('nav.html'); ?>
</div>

<section class="register-section">
  <div class="register-container">
    <div class="register-image">
      <img src="https://www.parents.com/thmb/cujAcwKH4nMSKJL-VOvsftWC0Z4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/550_101309537-0f2c3c3b6a6b48a69e8fae5169a80587.jpg" alt="Parent avec un enfant">
    </div>

    <div class="register-form-container">
      <h2><span class="highlight">Inscription</span> Parent</h2>
      <p class="intro-text">Rejoignez la communauté Kidzy en quelques étapes simples !</p>

      <form class="register-form" method="POST">
         <input type="text" name="nom" placeholder="Nom complet" required><br>
         <input type="email" name="email" placeholder="Adresse email" required><br>
         <input type="password" name="mdp" placeholder="Mot de passe" required><br>
         <input type="text" name="num" placeholder="Numéro de téléphone" required><br>
         <input type="text" name="adresse" placeholder="Adresse" required><br>
         <input type="number" name="num_enfant" placeholder="Nombre d’enfants" required><br>
         <button type="submit">S'inscrire</button>

         <?php if (!empty($message)) echo $message; ?>

      </form>
    </div>
  </div>
</section>

<?php include('footer.html'); ?>
</body>
</html>
