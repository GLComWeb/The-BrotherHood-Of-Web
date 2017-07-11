<?php
include_once('includes/head_bootstrap.html');

?>
    <title>Ajout d'un élève</title>
</head>
<body>
    <main class="container">
        <section class="row">
            <div class="col-sm-12">
                <?php // A des fins de test
                      if (isset($_SESSION['idFormation']) ) {
                        echo '<h4>'.$_SESSION['idFormation'].'</h4>';
                      }
                ?>
                <fieldset>
                    <legend>Ajout d'un élève à la formation</legend>
                    <p>Les champs sont obligatoire *</p>

                    <form class="form-inline" method="POST" action="verf-form-util.php">
                        <?php include_once('includes/utilisateur_form.html'); ?>
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

