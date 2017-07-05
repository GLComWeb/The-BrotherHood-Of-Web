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
    
    }).fail(function(reponse) {
        console.log('reponse fail ajouter reponse: ' + reponse);
    });
}