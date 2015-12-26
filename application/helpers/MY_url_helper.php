<?php

// Permet de passer plusieurs paramètres à site_url()
function site_url($uri = '') {
	if(! is_array($uri)) {
		// Tous les paramètres sont insérés dans un tableau
		$uri = func_get_args();
	}

	// On ne modifie rien ici
	$CI =& get_instance();
	return $CI->config->site_url($uri);
}

// Permet de créer facilement des liens
function url($text, $uri = '') {
	if(! is_array($uri)) {
		$uri = func_get_args();

		// Suppression de la variable $text 
		array_shift($uri);
	}

	echo '<a href="' . site_url($uri) . '">' . htmlentities($text) . '</a>';
	return '';
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */