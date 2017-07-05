/**
 * Exécution à la fin du chargement du DOM html5
 */
$(function() {
    $('#nomEntreprise').focusout(checkEntreprise);
    $('#siret').focusout(checkSiret);
    $('#nomUtilisateur').focusout(checkNom);
    $('#prenomUtilisateur').focusout(checkPrenom);
    $('#telFixe').focusout(checkTelephone);
    // Vérifie la présence de l'email dans la base de donnée
    $('#email').focusout(checkEmail);

    // Envoie du pseudo et du message au fichier PHP pour affichage dans l'ecran de chat
    // L'évènement est passé automatiquement
    $('form').on('submit', sendPreInscription);
});

var isValidEntreprise;
var isValidSiret;
var isValidNom;
var isValidPrenom;
var isValidTelephone;
var isValidEmail;

/**
 * Récupère le pseudo et le message dans les champs
 */
function sendPreInscription(evt) {
    evt.preventDefault();
    if ( isValidEntreprise && isValidSiret && isValidNom && isValidPrenom && isValidTelephone && isValidEmail ) {
        $.ajax({
        type: 'POST',
        url:  'enregistrer_entreprise.php',
        data: { nomEntreprise: $('#nomEntreprise').val(),
                siret:  $('#siret').val(),
                nomUtilisateur: $('#nomUtilisateur').val(),
                prenomUtilisateur: $('#prenomUtilisateur').val(),
                telephone: $('#telFixe').val(),
                email: $('#email').val()
              }
        
        }).done(function(reponse) {
            if (reponse['result'] == true) {
                console.log('Envoie du mail réussi');
            } else {
                console.log('L\'enregistrement à échoué');
            }

        }).fail(function(erreur) {
            console.log(erreur);
        });
    }

} // -------- FIN function --------

function checkEntreprise() {
    var nomEntreprise = $('#nomEntreprise').val();

    if (nomEntreprise != '') {
        isValidEntreprise = true;
    } else {
        isValidEntreprise = false;
    }
}

function checkSiret() {
    var siret = $('#siret').val();

    if (siret != '') {
        isValidSiret = true;
    } else {
        isValidSiret = false;
    }
}

function checkNom() {
    var nom = $('#nom').val();

    if (siret != '') {
        isValidNom = true;
    } else {
        isValidNom = false;
    }
}

function checkPrenom() {
    var prenom = $('#prenom').val();

    if (prenom != '') {
        isValidPrenom = true;
    } else {
        isValidPrenom = false;
    }
}

function checkTelephone() {
    var telephone = $('#telephone').val();

    if (siret != '') {
        isValidTelephone = true;
    } else {
        isValidTelephone = false;
    }
}

/**
  Vérifie l'email
 */
function checkEmail() {
    var email = $('#email').val();

    if (email != '') {
        isValidEmail = true;
    } else {
        isValidEmail = false;
    }    
}
