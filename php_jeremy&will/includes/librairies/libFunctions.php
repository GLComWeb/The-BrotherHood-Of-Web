<?php

/*================================ Librairie de fonctions ================================*/

/**
  * Vérifie les champs d'un formulaire passé dans une variable superglobale
  * @param $superglob une variable superglobale
  * @param $champ Un tableau contenant les champs du formulaire, ce tableau sera
  * return true, si tous les champs existe et ne sont pas vide, sino false.
  */
function valid_form($superglog, &$champ)
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

?>