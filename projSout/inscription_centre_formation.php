<?php
    require_once('includes/head_bootstrap.html');
?>
<body>
    <main class="container">
        <section class="row">
            <div class="col-sm-12">
                <p>Nom Entreprise</p>

                <fieldset>
                    <legend>Inscription Centre de formation</legend>
                        <p>Les champs sont obligatoire *</p>

                        <form class="form-inline" method="POST" action="centreFormation.php">
                            <!-- Cet utilisateur aura le rôle de directeur, le fichier est inclus une seule fois-->
                            <?php require_once('includes/utilisateur_form.html'); ?>    

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group col-sm-offset-1">
                                        <label for="nomCentre">Nom centre * </label>
                                        <p><input type="text" class="form-control input-sm" id="nomCentre" name="nomCentre" placeholder="nomCentre" size=15 required></p>
                                    </div>
                                
                                    <div class="form-group col-sm-offset-1">
                                        <label for="adresse">Adresse * </label>
                                        <p><input type="text" class="form-control input-sm" id="adresse" name="adresse" placeholder="adresse" size=30 required></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group col-sm-offset-1">
                                        <label for="codePostal">Code postal * </label>
                                        <p><input type="text" class="form-control input-sm" id="codePostal" name="codePostal" placeholder="codePostal" size=10 required></p>
                                    </div>

                                    <div class="form-group col-sm-offset-1">
                                        <label for="siret">Siret * </label>
                                        <p><input type="text" class="form-control input-sm" id="siret" name="siret" placeholder="siret" size=20 required></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group col-sm-offset-1">
                                        <label for="telephone">Numéro de téléphone * </label>
                                        <p><input type="telephone" class="form-control input-sm" id="telephone" name="telephone" placeholder="telephone" size=20 required></p>
                                    </div>
                                
                                    <div class="form-group col-sm-offset-1">
                                        <label for="secteur">Secteur * </label>
                                        <p><input type="secteur" class="form-control input-sm" id="secteur" name="secteur" placeholder="secteur" size=15 required></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-1">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                </fieldset>

            </div>
        </section>
    </main>
</body>