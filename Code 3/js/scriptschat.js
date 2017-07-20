var timer;
var compteur = 0;                                                       //| definit le nombre d'anciens messages à supprimer dans la page
$(function() {                                      //====================|=======exécution du bloc a la fin du dom===================
    timer=setInterval(chargerMessages, 2000);                           //|exécution de la fonction toutes les 2 secondes
        $('#envoi').on("click", function (e) {                                          // exécution de l'envoi du message sur button
            e.preventDefault(); 														// on empêche le bouton de soumettre le formulaire
            var message = $('#message').val();                      //
            if ( message != "") { 								                        // on vérifie que les variables ne sont pas vides
                $.ajax({
                    url: "traitementchat.php", 											// on donne l'URL du fichier de traitement
                    type: "POST", 													    // la requête est de type POST
                    data: {message: message, compteur: compteur},                       // et on envoie nos données
                    dataType: "json",
                }).done(function(reponse) {
                    console.log(reponse);
                }).fail(function(reponse) {
                    console.log('reponse ajax1' + reponse);
                })
            }
            $('#message').val('');
        });
        $('#message').on('keydown', function(e) {                                           //exécution de l'envoi du message avec le touche entre
            if (e.which == 13) {
            e.preventDefault();                                                             // on empêche le bouton de soumettre le formulaire
                var message = $('#message').val();                      //
                if ( message != "") { 								                        // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "traitementchat.php", 											// on donne l'URL du fichier de traitement
                        type: "POST", 													    // la requête est de type POST
                        data: {message: message, compteur: compteur},                       // et on envoie nos données
                        dataType: "json",
                    }).done(function(reponse) {
                        console.log(reponse);
                    }).fail(function(reponse) {
                        console.log('reponse ajax2' + reponse);
                    })
                }
                $('#message').val('');
                compteur=0;
            }
        });

});
function chargerMessages(){                         //==========fonction qui cherche les messages dans la base de données==============
        $.ajax({
            url : "chargertchat.php",                                               // on donne l'URL du fichier de traitement
            dataType : "json",                                                      // format de donnée axepte par ajax
        }).done(function(reponse) {                                                 // exécution en cas de suxed d'ajax
            receptionmessage(reponse);
        });
}
var table = [];
var i = 0;
function receptionmessage(reponse){                  //======fonction qui afiche les messages du tchat dans le html les messages=========
    var text = '<li class="left clearfix">\
			        <span class="chat-img1 pull-left">\
						<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">\
					</span>\
					<div class="chat-body1 clearfix">';
    var mess = '<p class="mess';                                                    //structure html pour l'affichage des messages dans le tchat
    var fin = '"></p>\
					</div>\
				</li>';
    if ( table.length == 0 ){                                                       // on copie dans un tableau les données reçues de la base de données
        $.each(reponse, function (index, element) {
            table[index] = element['id'];
            $('.list-unstyled1').append(text + mess + index + fin);
            $('.mess' + index).text(element['message']);
        });
    } else {
        $.each(reponse, function (index, element) {       //============ si un utilisateur ajoute un nouveau message on compare chaque élément du tableau =============
            if (jQuery.inArray(element['id'],table) == -1) {                        // si tous le éléments sont égaux alors on ne fait rien
                $('.list-unstyled1').prepend(text + mess + i + fin);
                $('.mess' + i).text(element['message']);
                ++compteur;
                return;
            }
            i++;
        });
        $.each(reponse, function (index, element) {                                 // remplacement des anciennes données tableau par les nouvelles données
            table[index] = element['id'];
        });
    }
}


