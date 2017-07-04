<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8" />
        <script src="assets/js/jquery-3.2.1.js"></script>
        <script src="assets/js/pre_inscription.js"></script>
        <title></title>
    </header>
    <body>
        <form method="POST" action="">
            <p><label for="nomEntreprise">Nom entreprise</label><br/>
            <input type="text" id="nomEntreprise" name="nomEntreprise" minlength="3" maxlength="10" required/></p>

            <p><label for="siret">Siret</label><br/>
            <input type="text" id="siret" name="siret" maxlength="18" required/></p>

            <p><label for="nom">Nom</label><br/>
            <input type="text" id="nomUtilisateur" name="nomUtilisateur" minlength="3" required/></p>

            <p><label for="prenom">Prenom</label><br/>
            <input type="text" id="prenomUtilisateur" name="prenomUtilisateur" minlength="3" required/></p>

            <p><label for="telephone">Telephone</label><br/>
            <input type="text" id="telFixe" name="telFixe" required/></p>

            <p><label for="email">Email</label><br/>
            <input type="email" id="email" name="email" required/></p>

            <input type="submit" value="Valider"/>
        </form>
        <div id="message"></div>
    </body>
</html>