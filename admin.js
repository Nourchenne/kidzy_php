// Attendre que le contenu de la page soit complètement chargé
document.addEventListener('DOMContentLoaded', function () {
    
    // Sélectionner tous les éléments avec la classe "delete-btn" (boutons de suppression)
    const deleteLinks = document.querySelectorAll('.delete-btn');

    // Pour chaque bouton de suppression trouvé
    deleteLinks.forEach(link => {
        // Ajouter un écouteur d'événement au clic
        link.addEventListener('click', function (e) {
            // Afficher une boîte de confirmation "Êtes-vous sûr ?"
            if (!confirm('Êtes-vous sûr ?')) {
                // Si l'utilisateur clique sur "Annuler", empêcher l'action par défaut (ex: navigation)
                e.preventDefault();
            }
        });
    });
});
