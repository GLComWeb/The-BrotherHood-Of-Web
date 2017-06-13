<?php
//Une fonction qui prend deux chaînes de caractères en argument, et qui retourne la première chaîne encadrée de balises de la seconde chaîne Exemple : « Bonjour » et « p »  "<p>Bonjour</p>"
function affichage_arg($bonjour,$p)
{
	return "<".$p."/>".$bonjour."<".$p."/>";
}

//*****************Une fonction qui affichera un lorem ipsum court.**************************
function lorem_ipsum_court()
	{
		echo "ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum1.","<br>";
	};

//****************************Une fonction qui affichera un lorem ipsum long.****************	
function lorem_ipsum_long()
{

		echo "<br>","ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum1.
					ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum1.";
		

}
//****Une fonction qui retourne la taille d’un tableau à une dimension passé en argument.*****
function taille_tab($tab)
{
	return count($tab);
}
//Une fonction qui affiche dans une <table> un tableau numéroté à une dimension passé en argument. (affichage en une colonne)
function tableau1($table)
{
	echo"<table>";
			foreach ($table as $key => $value)
			{
				echo "<tr>";
					echo "<td>";
					echo ($value);
					echo "</td>";
				echo "</tr>";
			}
	echo "</table>";
}
//Une fonction qui affiche dans une <table> un tableau associatif à une dimension passé en argument. (affichage en deux colonnes : clé, valeur)
function tableau2($tableau2)
{
	echo"<table>";
		foreach ($tableau2 as $key => $value)
		{
			echo "<tr>";
				echo "<td>";
				echo ($key);
				echo "</td>";

				echo "<td>";
				echo ($value);
				echo "</td>";
			echo "</tr>";
		}
	echo "</table>";	

}
//Une fonction qui calcule l’hypoténuse d’un triangle rectangle en lui donnant les deux autres côtés en argument
function calcul_hypo($a, $b)
{
	return sqrt($a**2+$b**2);
}
//Une fonction qui calcule la moyenne de toutes les valeurs numériques d’un tableau numéroté à une dimension (ce tableau sera passé en argument, et retournera la moyenne).
function calcul_moy($tab)
{
	$somme = 0;

	foreach ($tab as $value) {
		$somme += $value;
	}

	echo $somme/taille_tab($tab);
}
//Une fonction qui prend un tableau (numéroté ou associatif) et un élément (entier, chaîne …) et qui retourne la clé associée à l’élément. Si l’élément recherché n’est pas dans le tableau, la fonction retournera NULL.
//Exemple : $tableau = array(‘Titi’, ‘Tata’, ‘Toto’) ;
//$element = ‘Toto’ ;fonction($tableau, $element)  2 (Toto est à la case [2])	


function tableau_elem($tableau, $element)
{

	while ($tableau_elem = current($tableau_elem))
	{
   	 
	   	 if ($tableau_elem == 'toto')
	   	 {
	        
	        echo key($element);
	   	 }
    
   	 next($tableau_elem);
   	}
}

function valid_form($superglog, $champ)
{
	$valide = true;
	foreach ($champ as $element)
	{
		if(!isset($superglog[$element]))
		{
			$valide = false;
		}

		if(empty($superglog[$element]))
		{
			$valide = false;
		}
	}

	return $valide;
}

// Génération d'une chaine aléatoire
function gene_mot_passe($nb_car, $chaine)
{
	$nb_lettre = strlen($chaine) -1;
	$generation ='';
	
	for($i = 0;$i < $nb_car; $i ++)
	{
		$post = mt_rand(0, $nb_lettre);
		$car = $chaine[$post];
		$generation .= $car;
	}
		return $generation;


echo chaine_aleatoir(8);
}

//verification de mon de passe 
function verif_pass($pass1, $pass2)
{	
	$retour = false;
	if($pass1 == $pass2)
	{
		$retour = true;
	}

	return $retour;
}

function echappement($chaine)
{
	return htmlentities(strip_tags($chaine));
}


















?>

