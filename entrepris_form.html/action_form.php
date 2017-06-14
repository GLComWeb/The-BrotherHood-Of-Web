<?php 

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'boutique_wf3');

	include_once('inc_bdd.php');



if((!empty($_POST['login']))&&(!empty($_POST['pass'])))
	{
		$email=trim($_POST['login']);
		$pass=trim($_POST['pass']);   
		     
		$query = $db->prepare('SELECT id,nom,prenom,mot_passe FROM utilisateur WHERE email = ?');
		$query->bindValue(1, $email, PDO::PARAM_STR);
		$query->execute();
		

		$result=$query->fetch();







?>