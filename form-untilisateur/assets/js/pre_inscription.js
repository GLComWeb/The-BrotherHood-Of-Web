/**
 * Exécution à la fin du chargement du DOM html5
 */
$(function() {
    $('#nomEntreprise').focusout(checkEntreprise);
    $('#siret').focusout(checkSiret);
    $('#nom').focusout(checkNom);
    $('#prenom').focusout(checkPrenom);
    $('#telephone').focusout(checkTelephone);
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
    if ( isValidEntreprise && isValidSiret && isValidNom && isValidPrenom && isValidTelephone 
            && isValidEmail ) {

        var nomEntreprise = $('#nomEntreprise').val();
        var siret = $('#siret').val();
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var telephone = $('#telephone').val();
        var email = $('#email').val();

        $.ajax({
            type: 'POST',
            url:  'preInscription_ajax.php',
            data: { nomEntreprise: nomEntreprise,
                    siret: siret,
                    nom: nom,
                    prenom: prenom,
                    telephone: telephone,
                    email: email,
                    },
            dataType: 'json'
            
        }).done(function(reponse) {
            if (reponse['result']) {
                $('#message').html(reponse['raison']);
            } else {
                $('#message').html(reponse['raison']);
            }

            }).fail(function(erreur) {
                console.log(erreur);
            });
    } else {
        $('#message').html('[ERREUR] - Vous devez remplir tous les champs!');
    }
} // -------- FIN function --------

function checkEntreprise() {
    var nomEntreprise = $('#nomEntreprise').val();

    if (nomEntreprise != '') {
        isValidEntreprise = true;
    } else {
        isValidEntreprise = false;
    }
    console.log(isValidEntreprise);
}

function checkSiret() {
    var siret = $('#siret').val();

    if (siret != '') {
        isValidSiret = true;
    } else {
        isValidSiret = false;
    }
    console.log(isValidSiret);
}

function checkNom() {
    var nom = $('#nom').val();

    if (siret != '') {
        isValidNom = true;
    } else {
        isValidNom = false;
    }
    console.log(isValidNom);
}

function checkPrenom() {
    var prenom = $('#prenom').val();

    if (prenom != '') {
        isValidPrenom = true;
    } else {
        isValidPrenom = false;
    }
    console.log(isValidPrenom);
}

function checkTelephone() {
    var telephone = $('#telephone').val();

    if (siret != '') {
        isValidTelephone = true;
    } else {
        isValidTelephone = false;
    }
    console.log(isValidTelephone);
}

/**
  Vérifie et ajoute un nom et l'email à la base de donnée comme pre-inscription
 */
function checkEmail() {
    var email = $('#email').val();

    if (email != '') {
        isValidEmail = true;
    } else {
        isValidEmail = false;
    }
    console.log(isValidEmail);
}
