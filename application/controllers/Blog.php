<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
  protected $erreurs = array(),
            $id,
            $titre,
            $contenu,
            $dateAjout,
            $dateModif;
*/

	/**
	 * Constantes relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode.
	 */
	// const TITRE_INVALIDE = 1;
	//const CONTENU_INVALIDE = 2;


	/**
	 * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
	 * @param $valeurs array Les valeurs à assigner
	 * @return void
	 */


	public function __construct( $valeurs = array() ) {

		parent::__construct();

		$this->load->helper('date');
		$this->load->model('blog_model');
		$this->load->library('pagination');
		//$this->load->helper('functions');

		if (!empty($valeurs)) { // Si on a spécifié des valeurs, alors on hydrate l'objet.
			$this->hydrate($valeurs);
		}
	}
	
	public function index() {

		$data = array();
		$data['title']       = 'Blog';
		$data['description'] = 'Blog sur le développement web • HTML5 CSS Javascript PHP ...';
		$data['articles'] = $this->blog_model->get_last_articles();

		if ($this->input->is_ajax_request()) {

			$this->load->view('pages/liste-articles', $data);

		}else{

			// Breadcrumbs
			// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Blog', site_url('blog') );
			// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();


			$this->simplelayout->view('liste-articles', $data);
		}

	}

	public function article($slug) {

		$data = array();
		$data['title']      = 'Article title';
		$data['description'] = 'Article desc';
		$data['article'] = $this->blog_model->get_row_by_slug($slug);

		if ($this->input->is_ajax_request()) {
			
			$this->load->view('pages/article', $data);

		}else{
			// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Blog', site_url('blog') );
			$this->breadcrumbs->push('Article', site_url('article') );
			// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );

			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();

			$this->simplelayout->view('article', $data);

		}
	}

	// SEARCH
	public function search($word) {
		
		$res = $this->blog_model->get_all_articles();
		var_dump($res);
		if (preg_match($word, $res)) {
			echo $res->art_title;
		} else {
			echo "Terme non présent";
		}
	}


	public function javascript() {
		$data = array();
		$data['title']       = 'Articles sur le Javascript';
		$data['description'] = 'Articles sur le Javascript';
		$data['articles'] = $this->blog_model->get_javascript();
		$data['category'] = 'Javascript';
		
		if ($this->input->is_ajax_request()) {
			
			$this->load->view('pages/liste-articles', $data);

		}else{
			// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Blog', site_url('blog') );
			$this->breadcrumbs->push('Front-end', site_url('article') );
			// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();

			$this->simplelayout->view('liste-articles', $data);
		}
	}
	
	
	public function crypto() {
		$data = array();
		$data['title']            = 'Articles sur les crypto-monnaies';
		$data['description']    = 'Articles sur les crypto-monnaies';
		$data['articles']         = $this->blog_model->get_crypto();
		$data['category']        = 'Crypto-monnaies';
		
		if ($this->input->is_ajax_request()) {
			
			$this->load->view('pages/liste-articles', $data);

		}else{
			// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Blog', site_url('blog') );
			$this->breadcrumbs->push('Crypto-monnaies', site_url('article') );
			// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();

			$this->simplelayout->view('liste-articles', $data);
		}
	}


	public function outils() {
		$data = array();
		$data['title']       = 'Articles sur les outils de dev';
		$data['description'] = 'Articles sur les outils de dev';
		$data['articles'] = $this->blog_model->get_tools();
		$data['category'] = 'Outils';
		
		if ($this->input->is_ajax_request()) {
			
			$this->load->view('pages/liste-articles', $data);

		}else{
			// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Blog', site_url('blog') );
			$this->breadcrumbs->push('Outils', site_url('article') );
			// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();

			$this->simplelayout->view('liste-articles', $data);
		}
	}
}