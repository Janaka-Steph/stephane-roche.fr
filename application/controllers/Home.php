<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
		
	 public function __construct() {
  	
		 parent::__construct();  	
		 $this->load->helper('date');
		 $this->load->model('blog_model');
		 $this->load->library('pagination');
		 //$this->load->helper('functions');
	}




	public function index() 	  
	{
	
		$data = array();
		$data['title'] = "Home • Blog et Portfolio d'un développeur web";
		$data['description'] = "Bienvenue sur mon portfolio où je présente mes réalisations de sites internet. Visitez aussi la section blog pour connaître les dernières nouveautés en matière de web design et de développement web.";
		$data['articles'] = $this->blog_model->get_last_articles();    	
		
		if ($this->input->is_ajax_request()) 
		{
						
			$this->load->view('pages/home', $data);

		}else{
		
			// add breadcrumbs
				// $this->breadcrumbs->push('Section', '/section');
				$this->breadcrumbs->push('Accueil', site_url('home') );
			// unshift crumb
				// $this->breadcrumbs->unshift('Home', '/');
				// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();
			
			$this->simplelayout->view('home',$data);
		}
	}
	
	
	/* Méthode _remap = Toutes les méthodes de la class Welcome sont redirigées vers maintenance()

	public function maintenance()
	{
		echo "Désolé, c'est la maintenance.";
	}
	public function _remap($method) { 
		$this->maintenance();
	}*/
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */