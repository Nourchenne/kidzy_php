<?php
require('db.php');
$produits = $db->query("SELECT * FROM produits")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Produits</title>
    <link rel="stylesheet" href="hp.css">
</head>
<?php include('nav.html'); ?>
<body>

    <section class="articles">
        <h3>Nos Produits</h3>

        <?php
        foreach ($produits as $prod) {
            echo '<div class="article">';
            echo '<img src="' . $prod['photo'] . '" alt="Image du produit">';
            echo '<h3>' . $prod['nom'] . '</h3>';
            echo '<p class="price">' . number_format($prod['prix'], 3) . ' TND</p>';
            echo '<p>' . $prod['description'] . '</p>';
            echo '</div>';
        }
        ?>


    </section>

    <?php include('footer.html'); ?>
</body>
</html>
