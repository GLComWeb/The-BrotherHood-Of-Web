<?php
    session_start();
    require_once('includes/head_bootstrap.html');
?>
<!-- Ajout d'une formation au centre de formation-->
<body>
    <main class="container">
        <section class="row">
            <div class="col-sm-12">
                <?php // A des fins de test
                      if (isset($_SESSION['idCentre']) ) {
                        echo '<h4>'.$_SESSION['idCentre'].'</h4>';
                      }
                ?>
                <fieldset>
                    <legend>Ajout d'une formation</legend>

                    <form method="POST" action="action_formation.php">
                        <div class="row">
                            <div class="col-sm-4">
                                <p><div class="form-group">
                                    <label for="nom">Nom de la formation *</label>
                                    <p><input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="nom" required></p>
                                </div></p>

                                <div class="form-group">
                                    <label for="dateDebut">Date de début formation *</label>
                                    <p><input type="date" class="form-control input-sm" id="dateDebut" name="dateDebut" placeholder="dateDebut" required></p>
                                </div>

                                <div class="form-group">
                                    <label for="dateFin">Date de fin formation *</label>
                                    <p><input type="date" class="form-control input-sm" id="dateFin" name="dateFin" placeholder="dateFin" required></p>
                                </div>

                                <div class="form-group">
                                    <label for="planning">Lien planning *</label>
                                    <p><input type="url" class="form-control input-sm" id="planning" name="planning" placeholder="planning" required></p>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-default" type="submit" value="Valider"/>
                    </form>
                </fieldset>
            </div>
        </section class="row"><!-- Main section -->
    </main><!-- Main container -->
</body>