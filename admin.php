<?php
require('db.php'); // Inclusion du fichier de connexion à la base de données

// Suppression générale d'un enregistrement
if (isset($_GET['delete']) && isset($_GET['table'])) {
    $id = intval($_GET['delete']); // Récupère l'id à supprimer et le convertit en entier pour sécurité
    $table = $_GET['table'];       // Récupère le nom de la table concernée

    // Liste des tables autorisées à la suppression pour éviter injection SQL
    $tablesAutorisees = ['babysitters', 'parents', 'babysitting_requests', 'produits', 'contact'];

    // Vérifie que la table demandée est dans la liste des tables autorisées
    if (in_array($table, $tablesAutorisees)) {
        // Prépare la requête DELETE avec un paramètre positionnel
        $stmt = $db->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->execute([$id]); // Exécute la suppression avec l'id sécurisé
    }
}

// Ajout d'un nouveau produit via formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_produit'])) {
    $nom = $_POST['nom'];             // Nom du produit
    $prix = $_POST['prix'];           // Prix du produit
    $description = $_POST['description']; // Description du produit
    $photo = $_POST['photo'];         // URL ou chemin de la photo du produit

    // Prépare la requête d'insertion avec des paramètres positionnels
    $stmt = $db->prepare("INSERT INTO produits (nom, prix, description, photo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prix, $description, $photo]); // Exécute l'insertion avec les données fournies
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin</title>
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js" defer></script> <!-- Lien vers le fichier JS externe -->
</head>
<?php include('nav.html'); ?>
<body>

    <header>
        <h1>Tableau de bord Admin</h1>
    </header>

    <section class="table-section">
        <!-- Table Parents -->
        <div class="table-container">
            <h2>Parents</h2>
            <table>
                <tr><th>ID</th><th>Nom</th><th>Email</th><th>Téléphone</th><th>Adresse</th><th>Enfants</th><th>Actions</th></tr>
                <?php
                $parents = $db->query("SELECT * FROM parents")->fetchAll();
                foreach ($parents as $p) {
                    echo "<tr>
                        <td>{$p['id']}</td>
                        <td>{$p['nom']}</td>
                        <td>{$p['email']}</td>
                        <td>{$p['num']}</td>
                        <td>{$p['adresse']}</td>
                        <td>{$p['num_enfant']}</td>
                        <td><a class='delete-btn' href='?table=parents&delete={$p['id']}'>Supprimer</a></td>
                    </tr>";
                }
                ?>
            </table>
        </div>

        <!-- Table Babysitters -->
        <div class="table-container">
            <h2>Babysitters</h2>
            <table>
                <tr>
                    <th>ID</th><th>Nom</th><th>Email</th><th>Numéro</th><th>CIN</th><th>Adresse</th><th>Âge</th><th>Photo</th><th>CIN Recto</th><th>CIN Verso</th><th>Actions</th>
                </tr>
                <?php
                $babysitters = $db->query("SELECT * FROM babysitters")->fetchAll();
                foreach ($babysitters as $b) {
                    echo "<tr>
                        <td>{$b['id']}</td>
                        <td>{$b['nom']}</td>
                        <td>{$b['email']}</td>
                        <td>{$b['num']}</td>
                        <td>{$b['cin']}</td>
                        <td>{$b['adresse']}</td>
                        <td>{$b['age']}</td>
                        <td>" . (!empty($b['photo']) ? "<img src='{$b['photo']}' width='60' height='60'>" : "Aucune") . "</td>
                        <td>" . (!empty($b['cin_front']) ? "<img src='{$b['cin_front']}' width='60' height='60'>" : "Aucune") . "</td>
                        <td>" . (!empty($b['cin_back']) ? "<img src='{$b['cin_back']}' width='60' height='60'>" : "Aucune") . "</td>
                        <td><a href='?table=babysitters&delete={$b['id']}' class='delete-btn'>Supprimer</a></td>
                    </tr>";
                }
                ?>
            </table>
        </div>

        <!-- Table Demandes de Babysitting -->
        <div class="table-container">
            <h2>Demandes de Babysitting</h2>
            <table>
                <tr><th>ID</th><th>Nom</th><th>Email</th><th>Localisation</th><th>Enfants</th><th>Message</th><th>Actions</th></tr>
                <?php
                $requests = $db->query("SELECT * FROM babysitting_requests")->fetchAll();
                foreach ($requests as $r) {
                    echo "<tr>
                        <td>{$r['id']}</td>
                        <td>{$r['nom']}</td>
                        <td>{$r['email']}</td>
                        <td>{$r['localisation']}</td>
                        <td>{$r['nombre_enfants']}</td>
                        <td>{$r['message']}</td>
                        <td><a class='delete-btn' href='?table=babysitting_requests&delete={$r['id']}'>Supprimer</a></td>
                    </tr>";
                }
                ?>
            </table>
        </div>

        <!-- Table Contact -->
        <div class="table-container">
            <h2>Contact</h2>
            <table>
                <tr><th>ID</th><th>Nom</th><th>Email</th><th>Message</th><th>Date</th><th>Actions</th></tr>
                <?php
                $contact = $db->query("SELECT * FROM contact")->fetchAll();
                foreach ($contact as $cnt) {
                    echo "<tr>
                        <td>{$cnt['id']}</td>
                        <td>{$cnt['nom']}</td>
                        <td>{$cnt['email']}</td>
                        <td>{$cnt['message']}</td>
                        <td>{$cnt['date_contact']}</td>
                        <td><a class='delete-btn' href='?table=contact&delete={$cnt['id']}'>Supprimer</a></td>
                    </tr>";
                }
                ?>
            </table>
        </div>

        <!-- Table Produits -->
        <div class="table-container">
            <h2>Produits</h2>
            <table>
                <tr><th>ID</th><th>Nom</th><th>Prix</th><th>Description</th><th>Photo</th><th>Actions</th></tr>
                <?php
                $produits = $db->query("SELECT * FROM produits")->fetchAll();
                foreach ($produits as $prod) {
                    echo "<tr>
                        <td>{$prod['id']}</td>
                        <td>{$prod['nom']}</td>
                        <td>{$prod['prix']}</td>
                        <td>{$prod['description']}</td>
                        <td><img src='{$prod['photo']}' width='60'></td>
                        <td><a class='edit-btn' href='edit_produit.php?id={$prod['id']}'>Modifier</a> <a class='delete-btn' href='?table=produits&delete={$prod['id']}'>Supprimer</a></td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </section>

    <!-- Formulaire Ajouter Produit -->
    <section class="form-section">
        <h2>Ajouter un Produit</h2>
        <div class="form-container">
            <form method="post">
                <input type="text" name="nom" placeholder="Nom du produit" required>
                <input type="number" name="prix" step="0.001" placeholder="Prix" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="text" name="photo" placeholder="Lien vers la photo (URL)" required>
                <button type="submit" name="ajouter_produit">Ajouter</button>
            </form>
        </div>
    </section>

    <?php include('footer.html'); ?>
</body>
</html>
