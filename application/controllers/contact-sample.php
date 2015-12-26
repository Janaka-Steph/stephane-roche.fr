<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *  Without Password
 */
class Contact extends CI_Controller {

	public function __construct() {
  		parent::__construct();
  		$this->load->helper('form');
        $this->load->library(array('form_validation','email'));
	}


	public function index() {
	
		$data = array();
		$data['title'] = 'Contact';
		$data['description'] = 'Contactez moi | Embauchez-moi !';
		
		// add breadcrumbs
			// $this->breadcrumbs->push('Section', '/section');
			$this->breadcrumbs->push('Accueil', site_url('home') );
			$this->breadcrumbs->push('Contact', site_url('contact') );		
		// unshift crumb
			// $this->breadcrumbs->unshift('Home', '/');
			// $this->breadcrumbs->unshift('Home', site_url('') );
		// output
			$data['breadcrumbs'] = $this->breadcrumbs->show();
		
		//set validation rules
        	$this->form_validation->set_rules('nom', 'Nom', 'trim|required|max_length[100]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('telephone', 'Telephone', 'trim|numeric|xss_clean');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
			
			$this->form_validation->set_message('max_length', 'Le champ %s ne doit pas excéder 100 caractères');
			$this->form_validation->set_message('required', 'Le champ %s est obligatoire');
			$this->form_validation->set_message('numeric', 'Le champ %s doit être composé de 10 chiffres et sans espace');


			
		if ($this->form_validation->run() == FALSE) {
			// Pas valide
			if ($this->input->is_ajax_request()) {
				$this->load->view('pages/contact');
			}else{
				
				$this->simplelayout->view('contact',$data);	
			}
			
		}else{
			// Valide
			
			// Envoi email
				$nom = $this->input->post('nom');
				$email = $this->input->post('email');
				$telephone = $this->input->post('telephone');
				$message = $this->input->post('message');
				$mail =  "$message \n Telephone : $telephone";
			
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "";
				$config['smtp_user'] = "";
				$config['smtp_pass'] = "";
				$config['smtp_port'] = "";
				//$config['mailtype'] = "html";
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";
			
				$this->email->initialize($config);
		
	        	$this->email->from($email, $nom);
				$this->email->to('webdev@stephane-roche.fr'); 
	        	$this->email->subject('Message from www.stephane-roche.fr');
				$this->email->message($mail);	

				$this->email->send();

				//echo $this->email->print_debugger();
				
			if ($this->input->is_ajax_request()) {
	        	
	        	$this->load->view('pages/formsuccess');
			
			}else{
				
				$this->simplelayout->view('formsuccess',$data);	
			}        
        }
	}
}