<?php 
	include_once('includes/head_bootstrap.html');
?>
	<title>Ajout d'une entreprise</title>
</head>
	<body>
		<main class="container">
			<section class="row">
				<div class="col-sm-12">
					<fieldset>
						<legend>Information du responsable et de l'entreprise</legend>

						<form class="form-inline" method="POST" action="action_entreprise.php">

							<?php include_once('includes/utilisateur_form.html'); ?>

							<p>Votre entreprise:</p>
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="nom">Nom de l'entreprise *</label>
										<p><input type="text" class="form-control input-sm" name="nom" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="adresse">Adresse *</label>
										<p><input type="text" class="form-control input-sm" name="adresse" required/></p>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="codePostal">Code postal *</label>
										<p><input type="text" class="form-control input-sm" name="codePostal" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="ville">Ville *</label>
										<p><input type="text" class="form-control input-sm" name="ville" required/></p>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="telephone">Telephone *</label>
										<p><input type="text" class="form-control input-sm" name="telephone" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="siret">numereau de siret *</label>
										<p><input type="text" class="form-control input-sm" name="siret" required/></p>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">		
										<label for="numeroTva">numero tva *</label>
										<p><input type="text" class="form-control input-sm" name="numeroTva" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="email">E-mail *</label>
										<p><input type="email" class="form-control input-sm" name="email" required/></p>
									</div>
								</div>
							</div>

							<div class="col-sm-offset-1 col-sm-3">
								<input type="submit"  class="btn btn-default" name="Valider">
							</div>
						</form>
					</fieldset>
				</div>
			</section>
		</main>
	</body>
</html>