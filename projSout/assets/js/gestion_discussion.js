var isSujetValid = false;
var isTextValid = false;

$(function() {
    getSujetDiscussion();

    var sujet  = $('#sujet');
    var texte  = $('#texte');
    var btnValider = $('#valider');
    var erreur = $('#erreur');

    // Vérifie le sujet de la discussion
    sujet.focusout( {sujet: sujet, erreur: erreur}, function(event) {
        const MIN_LEN_SUJET = 3;
        const MAX_LEN_SUJET = 45;
        var objetSujet  = event.data.sujet;
        var objetErreur = event.data.erreur;

        if ( (objetSujet.val().length > MIN_LEN_SUJET) && (objetSujet.val().length < MAX_LEN_SUJET) ) {
            objetErreur.removeClass("text-warning");
            objetSujet.css("border-color", "");
            objetErreur.html("");
            isSujetValid = true;
        } else {
            objetSujet.css("border-color", "red");
            objetErreur.addClass("text-warning");
            objetErreur.html("<p>Vous devez remplir le sujet</p>");
        }
    } );

    // Vérifie le texte de la discussion
    texte.focusout( {texte: texte, erreur: erreur}, function(event) {
        const MIN_LEN_TEXTE = 15;
        var objetTexte  = event.data.texte;
        var objetErreur = event.data.erreur;

        if ( objetTexte.val().length > MIN_LEN_TEXTE ) {
            objetErreur.removeClass("text-warning");
            objetTexte.css("border-color", "");
            objetErreur.html("");
            isTextValid = true;
        } else {
            objetTexte.css("border-color", "red");
            objetErreur.addClass("text-warning");
            objetErreur.html("<p>Vous devez remplir le texte</p>");
        }
    })

    btnValider.click( {sujet: sujet, texte: texte}, function(event) {
        ajouterEnBase(event.data.sujet.val(), event.data.texte.val());
    })
});


/**
 * Ajoute les données en base de donnée
 */
function ajouterEnBase(sujet, texte) {
        
    var message = $('#message');
    if (isSujetValid && isTextValid) {
        $.ajax({
            url: 'ajouter_discussion.php',
            type: 'POST',
            data: { sujet: sujet, texte: texte },
            dataType: 'json',
    
        }).done(function(reponse) {
            if (reponse) { 
                message.removeClass("text-warning");
            } else {
                message.addClass("text-warning");
                message.html("<p>[ERREUR] - Le fil de discussion n'à pas été ajouté en base de donnée!</p>")
            }
    
        }).fail(function(reponse) {
            message.addClass("text-warning");
            message.html("<p>[ERREUR] - Erreur interne AJAX!</p>")
        });
    }
}

/**
 * Retourne tous les sujet de discussion.
 */
function getSujetDiscussion() {
    $.ajax({
        url: 'recuperer_sujet_discussion.php',
        dataType: 'json',
    
    }).done(function(reponse) {
        var table  =  $('.table');
        
        $.each(reponse, function(index, element) {
           table.append('<tr>\
                            <td><a href="#" id="aSujet"></a>' +
                            '<p id="aTexte"></p>'
                           +'<p id="aDate"></p>\
                           </td>\
                        </tr>');

            $('#aSujet').text(element['sujet']);
            $('#aTexte').text(element['texte']);
            $('#aDate').text(element['date_post']);
        })
    
    }).fail(function(reponse) {
        console.log('reponse: ' + reponse);
    });
}