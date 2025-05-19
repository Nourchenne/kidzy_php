// Sélectionner le bouton "Inscription"
const signUpButton = document.getElementById('signUp');

// Sélectionner le bouton "Connexion"
const signInButton = document.getElementById('signIn');

// Sélectionner le conteneur principal qui englobe les deux panneaux
const container = document.getElementById('container');

// Quand on clique sur le bouton "Inscription"
signUpButton.addEventListener('click', () => {
    // Ajouter la classe CSS "right-panel-active" au conteneur
    // Cela va probablement afficher le panneau d'inscription (animation/style)
    container.classList.add("right-panel-active");
});

// Quand on clique sur le bouton "Connexion"
signInButton.addEventListener('click', () => {
    // Retirer la classe "right-panel-active" du conteneur
    // Cela va probablement afficher le panneau de connexion
    container.classList.remove("right-panel-active");
});
