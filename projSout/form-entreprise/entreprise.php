<?php session_start();
	include_once('includes/head_bootstrap.html');
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('../includes/inc_bdd.php');

	$return = array();
	if (isset($_POST['id']) ) {
		$idEntreprise = $_SESSION['id'];
		//$idEntreprise = 25;
		$requete = $db->prepare('SELECT entreprise.nom as nomEntreprise,
										entreprise.adresse as adresseEntreprise,
										entreprise.code_postal as codePostalEntreprise,
										entreprise.ville as villeEntreprise,
										entreprise.telephone as telEntreprise,
										entreprise.email as emailEntreprise,
										siret,
										numero_tva,
										utilisateur.nom,
										utilisateur.prenom,
										utilisateur.date_naissance,
										utilisateur.telephone_fixe,
										utilisateur.telephone_mobile,
										utilisateur.adresse,
										utilisateur.code_postal,
										utilisateur.ville,
										utilisateur.email
								 FROM entreprise 
								 INNER JOIN utilisateur ON utilisateur.entreprise_id = entreprise.id WHERE entreprise.id = :id');
		$requete->bindValue(':id', $idEntreprise, PDO::PARAM_INT);
		$succes = $requete->execute();
		if ($succes) {
			$return = $requete->fetchAll();			
			if ( empty($return) ) {
				$return[0]['nomEntreprise'] 	 	= '';
				$return[0]['adresseEntreprise']     = '';
				$return[0]['codePostalEntreprise']  = '';
				$return[0]['villeEntreprise'] 		= '';
				$return[0]['telEntreprise'] 		= '';
				$return[0]['siret'] 				= '';
				$return[0]['numero_tva'] 			= '';
				$return[0]['nom'] 					= '';
				$return[0]['date_naissance'] 		= '';
				$return[0]['telephone_fixe'] 		= '';
				$return[0]['telephone_mobile'] 		= '';
				$return[0]['adresse'] 				= '';
				$return[0]['code_postal'] 			= '';
				$return[0]['ville'] 				= '';
				$return[0]['email'] 				= '';
				$return[0]['emailEntreprise'] 		= '';
				$return[0]['prenom'] 				= '';
			}

		}
	} else {
		$return[0]['nomEntreprise'] 	 	= '';
		$return[0]['adresseEntreprise']     = '';
		$return[0]['codePostalEntreprise']  = '';
		$return[0]['villeEntreprise'] 		= '';
		$return[0]['telEntreprise'] 		= '';
		$return[0]['siret'] 				= '';
		$return[0]['numero_tva'] 			= '';
		$return[0]['nom'] 					= '';
		$return[0]['date_naissance'] 		= '';
		$return[0]['telephone_fixe'] 		= '';
		$return[0]['telephone_mobile'] 		= '';
		$return[0]['adresse'] 				= '';
		$return[0]['code_postal'] 			= '';
		$return[0]['ville'] 				= '';
		$return[0]['email'] 				= '';
		$return[0]['emailEntreprise'] 		= '';
		$return[0]['prenom'] 				= '';
	}
?>
	<title>Mise à jour de votre profile</title>
</head>
	<body>
		<main class="container">
			<section class="row">
				<div class="col-sm-12">
					<fieldset>
						<legend>Information du responsable et de son entreprise</legend>

						<form class="form-inline" method="POST" action="action_entreprise.php">

							<?php include_once('includes/utilisateur_form.html'); ?>

							<p>Votre entreprise:</p>
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="nom">Nom de l'entreprise *</label>
										<p><input type="text" class="form-control input-sm" name="nom" value="<?= $return[0]['nomEntreprise']?>" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="adresse">Adresse *</label>
										<p><input type="text" class="form-control input-sm" name="adresse" value="<?= $return[0]['adresseEntreprise']?>" required/></p>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="codePostal">Code postal *</label>
										<p><input type="text" class="form-control input-sm" name="codePostal" value="<?= $return[0]['codePostalEntreprise']?>"required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="ville">Ville *</label>
										<p><input type="text" class="form-control input-sm" name="ville" value="<?=$return[0]['villeEntreprise']?>"required/></p>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">
										<label for="telephone">Telephone *</label>
										<p><input type="text" class="form-control input-sm" name="telephone" value="<?= $return[0]['telEntreprise']?>" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="siret">numereau de siret *</label>
										<p><input type="text" class="form-control input-sm" name="siret" value="<?= $return[0]['siret']?>" required/></p>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-offset-1 col-sm-3">
									<div class="form-group">		
										<label for="numeroTva">numero tva *</label>
										<p><input type="text" class="form-control input-sm" name="numeroTva" value="<?= $return[0]['numero_tva']?>" required/></p>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<label for="email">E-mail *</label>
										<p><input type="email" class="form-control input-sm" name="email" value="<?= $return[0]['email']?>" required/></p>
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