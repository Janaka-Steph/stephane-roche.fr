<?php

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('blog_model');
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('form');


        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('home');
        }

        $this->data['description'] = "Admin dashboard";
        $this->data['title'] = 'Admin';
        $this->breadcrumbs->push('Accueil', site_url('home'));
        $this->breadcrumbs->push('Admin dashboard', site_url('admin'));
        $this->data['breadcrumbs'] = $this->breadcrumbs->show();
    }

    public function index() {

        $this->data['articles'] = $this->blog_model->get_all_articles();

        if ($this->input->is_ajax_request()) {

            $this->load->view('pages/admin', $data);
        } else {

            $this->breadcrumbs->push('Accueil', site_url('home'));
            $this->breadcrumbs->push('Admin', site_url('admin'));
            $data['breadcrumbs'] = $this->breadcrumbs->show();

            $this->simplelayout->view('admin_View', $this->data);
        }
    }

    // Editer un article
    public function edit($art_id) {

        $this->breadcrumbs->push('Update article', site_url('admin'));
        $this->data['breadcrumbs'] = $this->breadcrumbs->show();

        // Chargement des rubriques
        $this->data['rubrics'] = $this->blog_model->read_rubric();

        // Mise en place du formulaire
        //$this->form_validation->set_rules('art_title', 'Titre', 'trim|required');
        //$this->form_validation->set_rules('art_content', 'Contenu', 'trim|required');
        //$this->form_validation->set_rules('rub', 'Rubrique', 'required');

        // Assignations du formulaire
        //$art_title = $this->input->post('art_title');
        //$art_content = $this->input->post('art_content');
        //$rub_id = $this->input->post('rub');

        $this->data['page'] = 'edit_content';
        $row = $this->blog_model->get_row($art_id);
        $this->data['art_id'] = $row->art_id;
        $this->data['rub_id'] = $row->rub_id;
        $this->data['art_title'] = $row->art_title;
        $this->data['art_content'] = $row->art_content;
        $this->data['title'] = 'Update ' . $this->data['art_title'];

        //if ($this->form_validation->run() !== FALSE):
            //$this->blog_model->update_article($art_id, $rub_id, $art_title, $art_content);
            //$this->session->set_flashdata('success', 'Article "' . $art_title . '" modifié.');
            //redirect('admin');
        //endif;


        $this->simplelayout->view('adminEditArticle', $this->data);
    }

    public function validateForm($art_id) {
        // Regles de validation du formulaire
        $this->form_validation->set_rules('art_title', 'Titre', 'trim|required');
        $this->form_validation->set_rules('art_content', 'Contenu', 'trim|required');
        $this->form_validation->set_rules('rub', 'Rubrique', 'required');

        // Assignations du formulaire
        $art_title = $this->input->post('art_title');
        $art_content = $this->input->post('art_content');
        $rub_id = $this->input->post('rub');
        // Use dashes to separate words;
        // third param is true to change all letters to lowercase
        $slug = url_title($this->input->post('art_title'), 'dash', true);

        if ($this->form_validation->run() !== FALSE){
            $this->blog_model->update_article($art_id, $rub_id, $art_title, $art_content);
            $this->session->set_flashdata('success', 'Article "' . $art_title . '" modifié.');
            redirect('admin');
        } else {
            echo 'pb';
        }
    }

    public function add() {

        $this->data['page'] = 'add_content';
        $this->data['title'] = 'Ajouter un article';
        $query = $this->blog_model->get_last_article();
        $arrQuery = $query->result_array();
        $art_id = 1 + $arrQuery['0']['art_id'];
        $rub_id = 1;
        
        $this->breadcrumbs->push('New article', site_url('admin'));
        $this->data['breadcrumbs'] = $this->breadcrumbs->show();

        // Chargement des rubriques
        $this->data['rubrics'] = $this->blog_model->read_rubric();
        
        $this->blog_model->create_article($art_id, $rub_id, $art_title = "", $art_content = "");


        // Réécriture du titre pour la future URL de l'article
        //$c_url_rw = url_title(convert_accented_characters($c_title), '-', TRUE);
        
        //$this->simplelayout->view('adminEditArticle', $this->data);

        //redirect('adminEditArticle');

        //if ($this->form_validation->run() !== FALSE):
            //$this->blog_model->create_article($art_id, $rub_id, $art_title, $art_content, $slug);
            //$this->session->set_flashdata('success', 'Article "' . $art_title . '" ajouté.');
            redirect('admin', 'location');
        //endif;
    }

    public function addEditNew() {

        $this->breadcrumbs->push('New article', site_url('admin'));
        $this->data['breadcrumbs'] = $this->breadcrumbs->show();

        $this->data['page'] = 'edit_content';
        $this->data['title'] = 'Nouvel article';

        $lastArt = $this->blog_model->get_last_article()->row();
        $this->data['art_id'] = $lastArt->art_id + 1;
        $this->data['rub_id'] = 1;
        // Chargement des rubriques
        $this->data['rubrics'] = $this->blog_model->read_rubric();

        $this->blog_model->create_article($this->data['art_id'], $this->data['rub_id'], "", "");

        $this->simplelayout->view('adminEditArticle', $this->data);
    }



    public function delete($id) {
    	$this->blog_model->delete_article($id);
    	redirect('admin');
    }

    //editer_article($art_id, $rub_id, $titre = null, $content = null)
    //editer_slug($art_id, $slug)
    //supprimer_article($id)	 
}
