<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['id'], $input['nom'], $input['prix'], $input['description'], $input['photo'])) {
        echo "Données incomplètes.";
        exit;
    }

    $id = $input['id'];
    $nom = $input['nom'];      
    $prix =$input['prix'];
    $description = $input['description'];
    $photo = $input['photo']; 

    $stmt = $db->prepare("UPDATE produits SET nom = ?, prix = ?, description = ?, photo = ? WHERE id = ?");
    $success = $stmt->execute([$nom, $prix, $description, $photo, $id]);

    if ($success && $stmt->rowCount() > 0) {
        echo "mis à jour avec succès.";
    } else {
        echo "erreur lors de la mise à jour.";
    }
    exit; 
}


if (!isset($_GET['id'])) {
    echo "ID du produit manquant.";
    exit;
}

$id = intval($_GET['id']);

$stmt = $db->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if (!$produit) {
    echo "Produit introuvable.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="admin.css">
</head>
<?php include('nav.html'); ?>
<body>
    <div class="form-container">
        <h2>Modifier le Produit</h2>
        <form id="form-modifier-produit">
            <input type="text" id="nom" name="nom" value="<?= $produit['nom'] ?>" required>
            <input type="number" id="prix" name="prix" step="0.001" value="<?= $produit['prix'] ?>" required>
            <textarea id="description" name="description" required><?= $produit['description'] ?></textarea>
            <input type="text" id="photo" name="photo" value="<?= $produit['photo'] ?>" required>
            <button type="button" id="modifier-btn" class="btn-submit">Modifier</button>
        </form>

        <div id="message" style="text-align: center; margin-top: 10px;"></div>
    </div>

    <script src="e.js"></script>
</body>
</html>
