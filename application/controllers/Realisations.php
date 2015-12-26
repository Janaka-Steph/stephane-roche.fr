<?php

class Realisations extends CI_Controller {


	public function __construct() {
  	
		 parent::__construct();  	
		 $this->load->library('breadcrumbs');	
		 $this->load->library('pagination');
	}




	public function index() 	  
	{
		if ($this->input->is_ajax_request()) 
		{
			$data = array();
			//$data['charset'] = $this->CI->config->item('charset');
			$data['title']      = 'Réalisations';
			$data['description'] = 'Mes réalisations dans le domaine du développement web'; 	
		
			// Breadcrumbs 
			// add breadcrumbs
				// $this->breadcrumbs->push('Section', '/section');
				$this->breadcrumbs->push('Accueil', site_url('home') );
				$this->breadcrumbs->push('Réalisations', site_url('realisations') );
			// unshift crumb
				// $this->breadcrumbs->unshift('Home', '/');
				// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();
			
			
			$this->load->view('pages/realisations', $data);

		}else{
			
			$data = array();
			//$data['charset'] = $this->CI->config->item('charset');
			$data['title']      = 'Réalisations';
			$data['description'] = 'Mes réalisations dans le domaine du développement web'; 	
		
			// Breadcrumbs 
			// add breadcrumbs
				// $this->breadcrumbs->push('Section', '/section');
				$this->breadcrumbs->push('Accueil', site_url('home') );
				$this->breadcrumbs->push('Réalisations', site_url('realisations') );
			// unshift crumb
				// $this->breadcrumbs->unshift('Home', '/');
				// $this->breadcrumbs->unshift('Home', site_url('') );
			// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();
			
			$this->simplelayout->view('realisations',$data);
		}
	}
}