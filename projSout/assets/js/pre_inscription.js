/**
 * Exécution à la fin du chargement du DOM html5
 */
$(function() {
    $('#nomEntreprise').focusout(checkEntreprise);
    $('#siret').focusout(checkSiret);
    $('#nom').focusout(checkNom);
    $('#prenom').focusout(checkPrenom);
    $('#telephone').focusout(checkTel);
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
        url:  'check_email_ajax.php',
        data: { nom: nom, email: email },
        dataType: 'json'
        
        }).done(function(reponse) {
        console.log(reponse);

        }).fail(function(erreur) {
        console.log(erreur);
        });
    }

    if (pseudo == '') {
        erreur.html('<p>[ERREUR] - vous devez fournir votre pseudo</p>');
    }

    if (message == '') {
        erreur.html('<p>[ERREUR] - vous devez fournir votre message</p>');
    }
    
    $.ajax({
        type: 'POST',
        url: 'saveInBdd.php',
        data: { pseudo: pseudo, message: message },

    }).done(function(reponse) {
            //console.log('Reponse:' + reponse);

            if (reponse == true) {
                $('#chatEcran').html(reponse);
            
            } else {
                erreur.html('<p>[ERREUR] - Une érreur est survenue durant la requête de la base de donnée</p>');
            }

        }).fail(function(reponse) {
            erreur.html('<p>[ERREUR] - Une érreur est survenue sur la fonction ajax!</p>' );
        });
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
  Vérifie et ajoute un nom et l'email à la base de donnée comme pre-inscription
 */
function checkEmail() {
    var email = $('#email').val();

    if (email != '') {
        isValidEmail = true;
    } else {
        isValidEmail = false;
    }    
}
