document.getElementById('modifier-btn').addEventListener('click', function () {
    
    const url = new URL(window.location.href);
    const id = url.searchParams.get('id');

    const nom = document.getElementById('nom').value;
    const prix = document.getElementById('prix').value;
    const description = document.getElementById('description').value;
    const photo = document.getElementById('photo').value;

    const data = {
        id: id,
        nom: nom,
        prix: prix,
        description: description,
        photo: photo
    };

    fetch('edit_produit.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' 
        },
        body: JSON.stringify(data) 
    })
    .then(response => response.text()) 
    .then(resultat => {
        const messageDiv = document.getElementById('message');
        messageDiv.innerText = resultat;

        if (resultat.includes("succès")) {
            messageDiv.style.color = "green";
        } else {
            messageDiv.style.color = "red";
        }
    })
    .catch(error => {
        const messageDiv = document.getElementById('message');
        messageDiv.innerText = "Une erreur est survenue.";
        messageDiv.style.color = "red";
    });
});
