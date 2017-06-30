var isSujetValid = false;
var isTextValid = false;
var nombreSujetTotal = 0;
// var nombrePageEntre;

$(function() {
    var sujet  = $('#sujet');
    var texte  = $('#texte');
    var btnValider = $('#valider');
    var erreur = $('#erreur');
    //nombrePageEntre = $('#nombreSujetPage').val();
    getSujetDiscussion();

    // Vérifie le sujet de la discussion
    sujet.focusout( {sujet: sujet, erreur: erreur}, function(event) {      // Ajoute et envoie les données à travers un évènement JQuery
        const MIN_LEN_SUJET = 3;
        const MAX_LEN_SUJET = 45;
        var objetSujet  = event.data.sujet;     // Récupère les données dans l'évènenement avec event.data
        var objetErreur = event.data.erreur;

        // ================== Vérifie la longueur des données entrées ==================
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
    });

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
    
            success : function(reponse) {
                if (reponse) { 
                    message.removeClass("text-warning");
                } else {
                    message.addClass("text-warning");
                    message.html("<p>[ERREUR] - Le fil de discussion n'à pas été ajouté en base de donnée!</p>")
                }
            },
            error : function(reponse) {
                message.addClass("text-warning");
                message.html("<p>[ERREUR] - Erreur interne AJAX!</p>")
            },
            complete : function(reponse, status) {  // Exécute ce bloc une fois que l'appel AJAX à été complété entièrement.
                getSujetDiscussion();   // Actualise la page
            }
        });
    }
}

/**
 * Retourne tous les sujet de discussion.
 */
function getSujetDiscussion() {
    // var offset = getOffset(numeroPageEntre, nombreSujetPage);
    // console.log(sujetPage);

    $('.ligne').remove();
    $.ajax({
        url: 'recuperer_sujet_discussion.php',
        dataType: 'json',
    
    }).done(function(reponse) {     // Retourne le nombre de ligne de la base de donnée, avec LIMIT
        var tableBody  =  $('tbody');
        nombreSujetTotal = reponse['nbr_sujet'];        //Nombre de sujet au total dans la base de données

        $('.page').attr('href', '2');
        $('.page').text('2 ');
        $('.nombreTotalSujet').text(nombreSujetTotal);

        var aSujet  = '<tr class="ligne">\
                        <td><a href="#" id="aSujet';
        var aTexte  = '"></a>\
                            <p id="aTexte';
        var aDate = '"></p>\
                            <p id="aDate';
        var fin = '"></p>\
                        </td>\
                    </tr>';
        
        $.each(reponse['sujets'], function(index, element) {
        tableBody.append(aSujet + index +
                            aTexte + index +
                            aDate  + index +
                            fin);

            $('#aSujet' + index).text(element['sujet']);
            $('#aTexte' + index).text(element['texte']);
            $('#aDate'  + index).text(element['date_post']);
        });
       
    
    }).fail(function(reponse) {
        console.log('reponse fail getSujetDiscussion: ' + reponse);
    });
}

/**
 * Retourne l'offset du sujet à envoyer à la base de donnée
 * @param {*} numeroPage Le numéro de la page demandé
 * @param {*} nombreSujetPage Le nombre de sujet par page sélectionné
 */
function getOffset(numeroPage, nombreSujetPage) {
    $nombrePageTotal = nombreSujetTotal / nombreSujetPage; // Doit être un INT

    if ( (numeroPage > $nombrePageTotal) || (numeroPage < nombrePageTotal) ) {
        // Page 404
        return;
    }

    return (nombreSujetPage * numeroPage) -1;
}