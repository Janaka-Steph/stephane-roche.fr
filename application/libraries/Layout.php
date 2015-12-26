<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {
	private $CI;
	private $var = array();
	private $theme = 'default';

	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/

public function __construct() {
	$this->CI =& get_instance();
	$this->var['output'] = '';

	//	Le titre est composé du nom de la méthode et du nom du contrôleur
	//	La fonction ucfirst permet d'ajouter une majuscule
	$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
	
	//	Nous initialisons la variable $charset avec la même valeur que
	//	la clé de configuration initialisée dans le fichier config.php
	$this->var['charset'] = $this->CI->config->item('charset');


	$this->var['css'] = array();
	$this->var['js'] = array();
}


/* THEMES */

public function set_theme($theme)
{
	if(is_string($theme) AND !empty($theme) AND file_exists('./application/views/templates/' . $theme . '.php')) 
	{
		$this->theme = $theme;
		return true;
	}
	return false;
}



/*
|===============================================================================
| Méthodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/

// View permet d'afficher une vue dans un layout
public function view($name, $data = array()) {

	$this->var['output'] .= $this->CI->load->view($name, $data, true);
	
	$this->CI->load->view('../views/templates/' . $this->theme, array('output' => $this->var));
}



// Views permet de sauvegarder le contenu d'une ou plusieurs vues dans une variable, sans l'afficher immédiatement
public function views($name, $data = array()) {

	// Rappel : le troisième paramètre de la méthode view de la bibliothèque Load permet de retourner le contenu de la vue sans l'afficher.
	$this->var['output'] .= $this->CI->load->view($name, $data, true);

	// Retourner l'instance de Layout permet l'exécution de plusieurs méthodes à la chaîne
	return $this;
}



/*
|===============================================================================
| Méthodes pour modifier les variables envoyées au layout
|	. set_titre
|	. set_charset
|===============================================================================
*/
public function set_titre($titre) {

	if(is_string($titre) AND !empty($titre)) {
		$this->var['titre'] = $titre;
		return true;
	}
	return false;
}

public function set_charset($charset) {

	if(is_string($charset) AND !empty($charset)) {
		$this->var['charset'] = $charset;
		return true;
	}
	return false;
}




/*
|===============================================================================
| Méthodes pour ajouter des feuilles de CSS et de JavaScript
|	. ajouter_css
|	. ajouter_js
|===============================================================================
*/
public function ajouter_css($nom) {

	if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css')) {
		$this->var['css'][] = css_url($nom);
		return true;
	}
	return false;
}

public function ajouter_js($nom) {
	if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js')) {
		$this->var['js'][] = js_url($nom);
		return true;
	}
	return false;
}


}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */