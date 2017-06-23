// BARRE DE NAVIGATION //

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// SUR MOBILE : ON CACHE LE MENU APRES CLICK SUR UN LIEN //
$(function(){
	$('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
 	});
});

// FORMULAIRE DE CONTACT //

$(function(){
	$("#valider").on("click", validerForm);
	$("#nom").on("change", changeNom);
	$("#prenom").on("change", changePrenom);
	$("#email").on("change", changeEmail);
	$("#objet").on("change",changeObjet);
	$("#message").on("change", changeMessage);
});

function validerForm(){
	// Récupérer les données
	var nom = $("#nom").val();
	var prenom = $("#prenom").val();
	var email = $("#email").val();
	var objet = $("#objet").val();
	var message = $("#message").val();

	if (nom != "" && prenom != "" && email != "" && objet != "" && message.length > 20) {
		// Afficher la confirmation
		$("#confirmation").html("<p> Formulaire validé ! </p>");
		$("#formulaire").hide();
	}else{
		if (nom == "" && prenom == "" && email == "" && objet == "") {
			// Bordure rouge sur email
			$("#nom").css("borderColor", "red");
			$("#prenom").css("borderColor", "red");
			$("#email").css("borderColor", "red");
			$("#objet").css("borderColor", "red");
		}
		if (message.length <=20) {
			// Bordure rouge sur message
			$("#message").css("borderColor", "red");
		}
	}
}

function changeNom(){
	$("#nom").css("borderColor", "green");
}

function changePrenom(){
	$("#prenom").css("borderColor", "green");
}

function changeEmail(){
	$("#email").css("borderColor", "green");
}

function changeObjet(){
	$("#objet").css("borderColor", "green");
}

function changeMessage(){
	$("#message").css("borderColor", "green");
}