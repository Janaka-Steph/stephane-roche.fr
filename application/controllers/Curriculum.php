<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum extends CI_Controller {


	public function __construct() {
  	
  		parent::__construct();
	}


	public function index() {
	
		
		$data = array();
		$data['title'] = 'Curriculum Vitae';
		$data['description'] = 'Curriculum Vitae';
	
	
		if ($this->input->is_ajax_request()) 
		{
						
			$this->load->view('pages/cv');

		}else{


		// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('CV', site_url('curriculum') );			
		// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );

		// output
		$data['breadcrumbs'] = $this->breadcrumbs->show();		
		
		$this->simplelayout->view('cv',$data);

		}

	}
	
}	
?>