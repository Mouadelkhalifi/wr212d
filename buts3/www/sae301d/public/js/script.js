function togglePasswordVisibilitySignin() {
    var passwordInputSignin1 = document.getElementById("password1_signin");
    var passwordCheckboxSignin = document.getElementById("revealPassword_signin");

    if (passwordCheckboxSignin.checked) {
        passwordInputSignin1.type = "text";
    } else {
        passwordInputSignin1.type = "password";
    }
}

function togglePasswordVisibilitySignup() {
    var passwordInputSignup1 = document.getElementById("password1_signup");
    var passwordCheckboxSignup = document.getElementById("revealPassword_signup");

    if (passwordCheckboxSignup.checked) {
        passwordInputSignup1.type = "text";
    } else {
        passwordInputSignup1.type = "password";
    }
}

function showPopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.add("show");
    }
}

function removePopup(popupId) {
    var popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.remove("show");
    }
}

function closePopup(popupId) {
    removePopup(popupId);
}
function deconnexion() {
    // Réinitialiser les données de l'utilisateur connecté ou effectuer d'autres actions nécessaires
    // Par exemple, vous pouvez supprimer les données de l'utilisateur de votre application
    // et rediriger l'utilisateur vers la page de connexion.


    // Rediriger l'utilisateur vers la page de connexion
    window.location.href = '/connexion';
}

var deconnexionBtn = document.getElementById('deconnexionBtn');

// Ajoutez un gestionnaire d'événements pour détecter le clic sur le bouton de déconnexion
if (deconnexionBtn) {
    deconnexionBtn.addEventListener('click', function (event) {
        event.preventDefault(); // Empêchez le comportement par défaut du lien (la redirection)

        // Appelez la fonction de déconnexion
        deconnexion();
    });
}


document.addEventListener('DOMContentLoaded', function() {
    console.log('Le script est en cours d\'exécution.');


    const registerBtn = document.getElementById('register');
    const container = document.getElementById('container');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });

    //---------------------CONNEXION-----------------------//
    var modifStatutButtonsSignupEtudiant = document.getElementById("etudiant_signup");
    var modifStatutButtonsSignupProf = document.getElementById("prof_signup");
    var afficheEtudiantSignup = document.getElementById("afficheEtudiant_signup");
    var afficheProfSignup = document.getElementById("afficheProf_signup");

    modifStatutButtonsSignupEtudiant.addEventListener("click", function () {
        afficheEtudiantSignup.style.opacity = "1";
        afficheProfSignup.style.opacity = "0";
    });

    modifStatutButtonsSignupProf.addEventListener("click", function () {
        afficheEtudiantSignup.style.opacity = "0";
        afficheProfSignup.style.opacity = "1";
    });

    var modifStatutButtonsSigninEtudiant = document.getElementById("etudiant_signin");
    var modifStatutButtonsSigninProf = document.getElementById("prof_signin");
    var afficheEtudiantSignin = document.getElementById("afficheEtudiant_signin");
    var afficheProfSignin = document.getElementById("afficheProf_signin");

    modifStatutButtonsSigninEtudiant.addEventListener("click", function () {
        afficheEtudiantSignin.style.opacity = "1";
        afficheProfSignin.style.opacity = "0";
    });

    modifStatutButtonsSigninProf.addEventListener("click", function () {
        afficheEtudiantSignin.style.opacity = "0";
        afficheProfSignin.style.opacity = "1";
    });

    //-------------------VALIDATION FORMULAIRE DE CONNEXION-------------------//
    var formSignIn = document.querySelector('.form-container.sign-in form');
    formSignIn.addEventListener('submit', function (event) {
        event.preventDefault();

        var prenom = document.getElementById('prenom_signin').value;
        var nom = document.getElementById('nom_signin').value;
        var mdp = document.getElementById('password1_signin').value;
        var statut = document.querySelector('input[name="statut"]:checked').value;

        fetch('data/etudiants.json')
            .then(response => response.json())
            .then(data => {
                var utilisateurTrouve = data.utilisateurs.find(function (utilisateur) {
                    return utilisateur.prenom.toLowerCase() === prenom.toLowerCase() &&
                        utilisateur.nom.toLowerCase() === nom.toLowerCase() &&
                        utilisateur.mdp === mdp &&
                        utilisateur.statut === statut;
                });

                if (!utilisateurTrouve) {
                    var utilisateursLocalStorage = JSON.parse(localStorage.getItem('utilisateurs'));

                    if (utilisateursLocalStorage) {
                        utilisateurTrouve = utilisateursLocalStorage.find(function (utilisateur) {
                            return utilisateur.prenom.toLowerCase() === prenom.toLowerCase() &&
                                utilisateur.nom.toLowerCase() === nom.toLowerCase() &&
                                utilisateur.mdp === mdp &&
                                utilisateur.statut === statut;
                        });
                    }
                }

                if (utilisateurTrouve) {
                    // Récupérer les données de l'utilisateur connecté
                    var nomUtilisateur = utilisateurTrouve.nom;
                    var prenomUtilisateur = utilisateurTrouve.prenom;
                    var statutUtilisateur = utilisateurTrouve.statut;

                    alert('Connexion réussie');
                    console.log('Nom: ' + nomUtilisateur + ', Prénom: ' + prenomUtilisateur + ', Statut: ' + statutUtilisateur);
                    window.location.href = '/home';
                } else {
                    showPopup("erreurPopup"); // Show the popup for incorrect credentials
                    // Afficher les popups
                    setTimeout(function () {
                        showPopup("erreurPopup");
                        showPopup("infoPopup");
                    }, 16);

// Supprimer les popups après un délai de 5000 millisecondes
                    setTimeout(function () {
                        removePopup("erreurPopup");
                        removePopup("infoPopup");
                    }, 6000);
                    console.log('Nom, prénom ou mot de passe incorrect(s)');
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement du fichier JSON', error);
            });
    });

    //-------------------INSCRIPTION-------------------//
    var formSignUp = document.querySelector('.form-container.sign-up form');
    formSignUp.addEventListener('submit', function (event) {
        event.preventDefault();

        var prenom = document.getElementById('prenom_signup').value;
        var nom = document.getElementById('nom_signup').value;
        var mdp = document.getElementById('password1_signup').value;
        var statut = document.querySelector('input[name="statut"]:checked').value;

        var utilisateurs = JSON.parse(localStorage.getItem('utilisateurs')) || [];

        var nouvelUtilisateur = {
            prenom: prenom,
            nom: nom,
            mdp: mdp,
            statut: statut,
        };

        utilisateurs.push(nouvelUtilisateur);
        localStorage.setItem('utilisateurs', JSON.stringify(utilisateurs));

        window.location.href = '/home';
    });
});
