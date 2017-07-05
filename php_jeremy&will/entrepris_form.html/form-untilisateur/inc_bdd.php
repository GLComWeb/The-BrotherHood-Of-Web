<?php

	// Tableau d'options supplémentaires pour la connexion
	$db_options= array(
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
						// On force l'encodage en utf8
						PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
						// On récupère tous les résultats en tableau associatif
						PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
						// On affiche des warnings pour les erreurs, à commenter en prod
	);

	try
	{
		$db = new PDO('mysql:host='.HOST.';dbname='.DB,
					 USER,
					 PASS, 
					 $db_options);
	}
	catch (Exception $e)
	{
		//error_log('['.$e->getCode().'] '.$e->getMessage(), 3, 'logs/mysql-errors.log');
		echo '['.$e->getCode().'] '.$e->getMessage();
		//affichage d'une erreur le cas échéant
	}

		

?>