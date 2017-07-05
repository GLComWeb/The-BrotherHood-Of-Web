<?php
    session_start();
    require_once('includes/head_bootstrap.html');
?>
    <title>Ajout d'une formation au centre</title>
</head>
<body>
    <main class="container">
        <section class="row">
            <div class="col-sm-12">
                 <?php // A des fins de test
                      if (isset($_SESSION['idCentre']) ) {
                        echo '<h4>Id Centre formation associé '.$_SESSION['idCentre'].'</h4>';
                      }
                ?>

                <fieldset>
                    <legend>Ajout de formations à un centre</legend>
                        <p>Les champs sont obligatoire *</p>

                        <form class="form-inline" method="POST" action="action_formation.php">
                            <div class="row">
                                <div class="col-sm-offset-1 col-sm-3">
                                    <div class="form-group">
                                        <label for="nom">Nom * </label>
                                        <p><input type="text" class="form-control input-sm" id="nom" name="nom" placeholder="nom"required></p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="dateDebut">Date de début * </label>
                                            <p><input type="date" class="form-control input-sm" id="dateDebut" name="dateDebut" placeholder="dateDebut" required></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-offset-1 col-sm-3">
                                    <div class="form-group">
                                        <label for="dateFin">Date de fin * </label>
                                        <p><input type="date" class="form-control input-sm" id="dateFin" name="dateFin" required></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="planning">Lien planning * </label>
                                            <p><input type="text" class="form-control input-sm" id="planning" name="planning" placeholder="planning" required></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-1">
                                    <input type="submit" class="btn btn-default" value="Ajouter">
                                </div>
                            </div>
                        </form>
                </fieldset>

            </div>
        </section>
    </main>
</body>