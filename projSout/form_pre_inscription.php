<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8" />
        <title></title>
    </header>
    <body>
        <form method="POST" action="">
            <p><label for="nomEntreprise">Nom entreprise</label><br/>
            <input type="text" id="nomEntreprise" name="nomEntreprise" minlength="3" maxlength="10" required/></p>

            <p><label for="siret">Siret</label><br/>
            <input type="text" id="siret" name="siret" maxlength="18" required/></p>

            <p><label for="nom">Nom</label><br/>
            <input type="text" id="nom" name="nom" minlength="3" maxlength="10" required/></p>

            <p><label for="prenom">Prenom</label><br/>
            <input type="text" id="prenom" name="prenom" minlength="3" maxlength="10" required/></p>

            <p><label for="telephone">Telephone</label><br/>
            <input type="text" id="telephone" name="telephone" maxlength="15" required/></p>

            <p><label for="email">Email</label><br/>
            <input type="email" id="email" name="email" maxlength="20" required/></p>

            <!--<p><label for="password">Mot de passe</label><br/>
            <input type="password" id="password" name="password" maxlength="8" required/></p>-->

            <input type="submit" value="Valider"/>
        </form>
    </body>
</html>