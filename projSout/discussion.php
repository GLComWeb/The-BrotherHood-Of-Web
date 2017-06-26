<?php require_once('includes/head_bootstrap.html'); ?>
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <title>Forum de discussion</title>
</head>
<body>
    <main class="container-fluid">
        <section class="row">
            
            <div class="col-sm-4">
                <p>Nombre de sujet</p>
            </div>
            
            <div class="col-sm-4">
                <p>trie des sujets</p>
            </div>

            <div class="col-sm-4">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#monModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Ajouter discussion
                </button>
            </div>

            <div class="modal fade" id="monModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p class="modal-title">Ajouter une nouvelle discussion</p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <p><input type="text" class="form-control input-sm" id="sujet" name="sujet" placeholder="sujet" required></p>
                            </div>
                            <div class="form-group">
                                <label for="sujet">Votre text</label>
                                <p><textarea class="form-control" rows="3"></textarea></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Enregistrer</button> <!-- Ajout en Ajax dans la base de donnée -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </section>
        
        <section class="row">
            <div class="col-sm-12 thread">
                <table class="table table-responsive table-striped">
                    <!-- Dans une boucle, le php retournera la liste des sujets enregistré dans la base -->
                    <tr>
                        <td><a href="#">Sujet</a></td> <!-- Lien vers une page détaillant la discussion -->
                    </tr>
                    <tr>
                        <td>
                            Quelques ligne du sujet principal
                            <p>date de poste " par " auteur</p>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</body>
        