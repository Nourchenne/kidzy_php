<?php
include('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        $nom = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $stmt = $db->prepare("INSERT INTO contact (nom, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $message]);

        echo "<script>alert('Votre message a été envoyé avec succès.'); window.location.href='contact.php';</script>";
    } else {
        echo "<script>alert('Tous les champs doivent être remplis.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo11.png">
</head>

<body>
<div class="nv">
    <?php include('nav.html'); ?>
</div>

<section class="contact-page-section">
    <div class="container">
        <div class="sec-title">
            <div class="title">Contactez-nous</div>
            <h2>Nous sommes à votre écoute</h2>
        </div>
        <div class="inner-container">
            <div class="row clearfix">
                
                <div class="form-column col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="contact-form">
                            <form method="post" action="contact.php" id="contact-form">
                                <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="" placeholder="Nom" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="theme-btn btn-style-one">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="info-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <h2>Informations de contact</h2>
                        <ul class="list-info">
                            <li><i class="fas fa-globe"></i>123 Ezzahra, Ben Arous.</li>
                            <li><i class="far fa-envelope"></i>kidzy@gmail.com</li>
                            <li><i class="fas fa-phone"></i>99 887 766</li>
                        </ul>
                        <ul class="social-icon-four">
                            <li class="follow">Suivez-nous : </li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include('footer.html'); ?>
</body>
</html>
