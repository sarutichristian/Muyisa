function checkPassword() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    // Votre mot de passe souhaité
    const passwordCorrect = '1234567';

    if (password === passwordCorrect) {
        // Si le mot de passe est correct, affiche le message et redirige vers une nouvelle page.
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(function() {
            window.location.href = 'ee-com.html'; // Redirection vers une nouvelle page
        }, 2000); // Changez la valeur en millisecondes pour régler le temps avant redirection
    } else {
        alert('Invalid password, try again !');
    }
}
