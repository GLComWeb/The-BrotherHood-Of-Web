var timer;
var compteur = 0;                                       // defini le nombre de encien message a suprimer dans la page
$(function() {                                      //===========================execution du bloc a la fin du dom===================
    //timer=setInterval(chargerMessages, 2000);                           //execution de la fonction toute les 2 sconde
    $('#envoi').on("click", function (e) {                                           // execution de l'envoi du message
        e.preventDefault(); 														// on empêche le bouton soumettre le formulair
        var message = encodeURIComponent($('#message').val());                      //
        if ( message != "") { 								                        // on vérifie que les variables ne sont pas vides
            $.ajax({
                url: "traitementchat.php", 											// on donne l'URL du fichier de traitement
                type: "POST", 													    // la requête est de type POST
                data: {message: message, compteur: compteur},                  // et on envoie nos données
                dataType: "json",
            }).done(function(reponse) {
                console.log(reponse);
            }).fail(function(reponse) {
                console.log(reponse);
            })
        }
        $('#message').val('');


    });
    compteur=0;

    $('#recep').on("click", function (e) {
        console.log('Chargement message..');                                          
        chargerMessages();
    });
});


function chargerMessages(){                         //==========fonction qui cherche les message dans la base de donnee==============
        $.ajax({
            url : "chargertchat.php",                                               // on donne l'URL du fichier de traitement
            dataType : "json"                                                      // forma de donnee axepte par ajax
        }).done(function(reponse) {                                                 // execution en cas de suxed d'ajax
            //console.log(reponse);
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

    if ( table.length == 0 ){  
                                                             // on copie dans un tableau les donnee reçu de la base de donnee
        $.each(reponse, function (index, element) {
            table[index] = reponse[index];
            $('.list-unstyled1').append(text + mess + index + fin);
            $('.mess' + index).text(element['message']);
        });

    } else {
        var undef;
        var reponseId;
        var tableLen = table.length;
        var reponseLen = reponse.length;
        $.each(reponse, function (index, element) {       //============ si un utilisateur ajoute un nouveau message on compare chaque element du tabeau =============

            //console.log('Id Reponse global : ' + reponse[index]['id']);
            
            // if ( typeof table[index] === 'undefined' ) {                        // si tous le element son egaux alors on ne fait rien
            //     console.log('Non définis');
            // } else {
            //     console.log("Id reponse new : " + reponse[index]['id']);

            //     ++compteur;
            //     $('.list-unstyled1').append(text + mess + index + fin);             // sinon on ajoute les nouveaux message dans le tchat
            //     $('.mess' + index).text(element['message']);

            // }

            console.log(tableLen);
            console.log(reponseLen);
            //reponseId = reponse[i]['id'];

            for (var j = 1; j <= tableLen; j++) {
                
                if (table[j] == reponse[index]) {
                    console.log(j + 'table Trouvé!' + table[j]['id']);
                    console.log(j + 'reponse!' + reponse[index]['id']);
                
                } else {
                    if (typeof table[j] == 'undefined') {
                        $('.list-unstyled1').append(text + mess + index + fin);
                        $('.mess' + index).text(element['message']);
                        console.log(j + 'table Non Trouvé!' + table[j]['id']);
                        console.log(j + 'Non trouvé!' + reponseId);
                    }
                    
                    
                    // ++compteur;
                    // $('.list-unstyled1').append(text + mess + index + fin);
                    // $('.mess' + index).text(element['message']);
                }
            }
                       

        });
    }

    $.each(reponse, function (index, element) {                                 // renplassement le encienne donnee tableau par les nouvelle donnee
            console.log('Id Tab avant : ' + table[index]['id']);
            table[index] = reponse[index];
            //console.log('Id Tab après : ' + table[index]['id']);
        });

}
//chargerMessages();