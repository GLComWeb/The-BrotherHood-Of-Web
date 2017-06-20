<?php
    require_once('includes/head_bootstrap.html');
?>
<!-- Inscription de l'élève à une formation -->
<body>
    <main class="container">
        <section class="row">
            <div class="col-sm-12">
                <p>Infos centre de formation</p>
                <p>Infos formation</p>
                    
                    <fieldset>
                        <legend>Inscription utilisateur</legend>

                            <form class="form-inline" method="POST" action="insertBDD.php">
                                <?php require_once('includes/utilisateur_form.html'); ?>
                            </form>
                        
                    </fieldset>
                
            </div>
        </section class="row"><!-- Main section -->
    </main><!-- Main container -->
</body>