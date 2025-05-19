<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="l.css">
	<link rel="icon" type="image/png" href="img/logo11.png">
</head>
<div class="nv">
	<?php include('nav.html'); ?>
</div>
<body>

<main>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form>
				<h1>Créer un compte</h1>
				<span>Inscrivez-vous en tant que :</span>
				<div class="role-buttons">
					<button type="button" id="registerParent" class="bb" onclick="window.location.href='parentreg.php'">Parent</button>
					<button type="button" id="registerBabysitter" class="bb" onclick="window.location.href='sitterreg.php'">Babysitter</button>
				</div>
			</form>
		</div>

		<div class="form-container sign-in-container">
			<form method="POST" action="traitement_login.php">
				<h1>Connexion</h1>
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="mdp" placeholder="Mot de passe" required />
				<!--<a href="#">Mot de passe oublié ?</a>-->
				<button type="submit" class="bb">Se connecter</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1 class="wb">Welcome Back!</h1>
					<p></p>
					<button class="ghost" id="signIn">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1 class="wb">Hello, Friend!</h1>
					<p></p>
					<button class="ghost" id="signUp">S'inscrire</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	  if (isset($_GET['error'])) {
		echo "<p style='color: red; text-align:center;'>Email ou mot de passe invalide.</p>";
	  }
	?>
</main>

<script src="login.js"></script>
<div class="ft">
<?php include('footer.html'); ?>
</div>
</body>
</html>
