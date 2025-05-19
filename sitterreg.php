<?php
include('traitement_sitter.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription Babysitter</title>
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
      <img src="img/b2.jpg" alt="Babysitter avec un enfant">
    </div>

    <div class="register-form-container">
      <h2><span class="highlight">Inscription</span> Babysitter</h2>
      <p class="intro-text">Rejoignez Kidzy et trouvez des familles formidables !</p>

      <form class="register-form" method="POST">
        <input type="text" name="nom" placeholder="Nom complet" required>
        <input type="email" name="email" placeholder="Adresse email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input type="tel" name="num" placeholder="Numéro de téléphone" required>
        <input type="text" name="cin" placeholder="CIN" required>
        <input type="text" name="adresse" placeholder="Adresse" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="photo" placeholder="URL de la photo" required>
        <input type="text" name="cin_front" placeholder="URL de la face avant du CIN" required>
        <input type="text" name="cin_back" placeholder="URL de la face arrière du CIN" required>
        <button type="submit">S'inscrire</button>

        <?php if (!empty($message)) echo $message; ?>

      </form>
    </div>
  </div>
</section>

<?php include('footer.html'); ?>
</body>
</html>
