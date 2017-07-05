var timer;
var compteur = 0;                                                       //| defini le nombre de encien message a suprimer dans la page
$(function() {                                      //====================|=======execution du bloc a la fin du dom===================
    timer=setInterval(chargerMessages, 2000);                           //|execution de la fonction toute les 2 sconde
        $('#envoi').on("click", function (e) {                                          // execution de l'envoi du message sur button
            e.preventDefault(); 														// on empêche le bouton soumettre le formulair
            var message = encodeURIComponent($('#message').val());                      //
            if ( message != "") { 								                        // on vérifie que les variables ne sont pas vides
                $.ajax({
                    url: "traitementchat.php", 											// on donne l'URL du fichier de traitement
                    type: "POST", 													    // la requête est de type POST
                    data: {message: message, compteur: compteur},                       // et on envoie nos données
                    dataType: "json",
                }).done(function(reponse) {
                    console.log(reponse);
                }).fail(function(reponse) {
                    console.log(reponse);
                })
            }
            $('#message').val('');
        });
        $('#message').on('keydown', function(e) {                                           //execution de l'envoi du message avec le touche entre
            if (e.which == 13) {
            e.preventDefault();                                                             // on empêche le bouton soumettre le formulair
                var message = encodeURIComponent($('#message').val());                      //
                if ( message != "") { 								                        // on vérifie que les variables ne sont pas vides
                    $.ajax({
                        url: "traitementchat.php", 											// on donne l'URL du fichier de traitement
                        type: "POST", 													    // la requête est de type POST
                        data: {message: message, compteur: compteur},                       // et on envoie nos données
                        dataType: "json",
                    }).done(function(reponse) {
                        console.log(reponse);
                    }).fail(function(reponse) {
                        console.log(reponse);
                    })
                }
                $('#message').val('');
                compteur=0;
            }
        });

});
function chargerMessages(){                         //==========fonction qui cherche les message dans la base de donnee==============
        $.ajax({
            url : "chargertchat.php",                                               // on donne l'URL du fichier de traitement
            dataType : "json",                                                      // forma de donnee axepte par ajax
        }).done(function(reponse) {                                                 // execution en cas de suxed d'ajax
            receptionmessage(reponse);
        });
}
var table = [];
function receptionmessage(reponse){                  //======fonction qui afiche les message du tchat dans le html les message=========
    var text = '<li class="left clearfix">\
			        <span class="chat-img1 pull-left">\
						<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">\
					</span>\
					<div class="chat-body1 clearfix">';
    var mess = '<p class="mess';                                                    //structure html pour l'affichage des message dans le tchat
    var fin = '"></p>\
						<div class="chat_time pull-right">09:40PM</div>\
					</div>\
				</li>';
    if ( table.length == 0 ){                                                       // on copie dans un tableau les donnee reçu de la base de donnee
        $.each(reponse, function (index, element) {
            table[index] = element['id'];
            $('.list-unstyled1').append(text + mess + index + fin);
            $('.mess' + index).text(element['message']);
        });
    } else {
        $.each(reponse, function (index, element) {       //============ si un utilisateur ajoute un nouveau message on compare chaque element du tabeau =============
            if (jQuery.inArray(element['id'],table) == -1) {                        // si tous le element son egaux alors on ne fait rien
                $('.list-unstyled1').append(text + mess + index + fin);
                $('.mess' + index).text(element['message']);
                ++compteur;
            }
        });
        $.each(reponse, function (index, element) {                                 // renplassement le encienne donnee tableau par les nouvelle donnee
            table[index] = element['id'];
        });
    }
}


