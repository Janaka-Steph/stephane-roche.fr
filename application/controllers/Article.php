<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	
	public function __construct() {
  		parent::__construct();
  		$this->load->helper('date');
  		$this->load->model('blog_model');
  		//$this->load->library('pagination');	
	}

	public function index() {
	
		$data = array();
		$data['title'] = 'Article';
		$data['description'] = 'Article desc';
		$data['article'] = $this->blog_model->get_row(11);    	
	
		if ($this->input->is_ajax_request()) 
		{
			$this->load->view('pages/article',$data);

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
		
		$this->simplelayout->view('article',$data);

		}
	}
	
}