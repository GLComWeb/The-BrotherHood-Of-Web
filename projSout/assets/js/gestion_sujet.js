function ajouterReponse(idDiscussion) {
    var sujet = $('#sujet');
    var texte = $('#texte');

    console.log(idDiscussion);
    $.ajax({
        url: 'ajouter_message_base.php',
        type: 'POST',
        data: { idDiscussion: idDiscussion,
                sujet: sujet.val(),
                texte: texte.val() 
              },
        dataType: 'json'
    }).done(function(reponse) {
        console.log(reponse['result'] + ' ' + reponse['raison']);
        $("table").load(location.href + " table");           // Rafraîchi l'affichage de la table
    
    }).fail(function(reponse) {
        console.log('reponse fail ajouter reponse: ' + reponse);
    });
}