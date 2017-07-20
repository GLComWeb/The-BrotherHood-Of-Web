// BARRE DE NAVIGATION //

$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// SMOOTH SCROLL (Défilement animé)
$(function() {
        $('.js-scrollTo').on('click', function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var speed = 750; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
            return false;
        });
    });

// SUR MOBILE : ON CACHE LE MENU APRES CLICK SUR UN LIEN //
$(function () {
    $('.navbar-collapse a').click(function () {
        $(".navbar-collapse").collapse('hide');
    });
});

// FORMULAIRE DE CONTACT //

$(function () {
    $("#valider").on("click", validerForm);
    $("#name").on("change", changeNom);
    $("#firstname").on("change", changePrenom);
    $("#email").on("change", changeEmail);
    $("#subject").on("change", changeObjet);
    $("#message").on("change", changeMessage);
});

function validerForm() {
    // Récupérer les données
    var name = $("#nom").val();
    var firstname = $("#firstname").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    if (name != "" && firstname != "" && email != "" && subject != "" && message.length > 20) {
        // Afficher la confirmation
        $("#confirmation").html("<p> Votre message a bien été envoyé ! </p><p> L'équipe Learn Station va traiter votre demande et va tout mettre en oeuvre pour vous assurer une réponse dans les plus bref délais. </p>");
        $("#formulaire").hide();
    } else {
        if (name == "" && firstname == "" && email == "" && subject == "") {
            // Bordure rouge sur email
            $("#name").css("borderColor", "red");
            $("#firstname").css("borderColor", "red");
            $("#email").css("borderColor", "red");
            $("#subject").css("borderColor", "red");
        }
        if (message.length <= 20) {
            // Bordure rouge sur message
            $("#message").css("borderColor", "red");
        }
    }
}

function changeNom() {
    $("#name").css("borderColor", "green");
}

function changePrenom() {
    $("#firstname").css("borderColor", "green");
}

function changeEmail() {
    $("#email").css("borderColor", "green");
}

function changeObjet() {
    $("#subject").css("borderColor", "green");
}

function changeMessage() {
    $("#message").css("borderColor", "green");
}
