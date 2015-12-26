<?php if(! defined('BASEPATH')) exit('No direst script access allowed');

class Blog_model extends CI_Model {    


	/*
	* Blog_model
	*
	* ajouter_article($art_id, $rub_id, $titre, $content, $slug)
	* editer_article($art_id, $titre, $content, $slug)
	* supprimer_article($id)
	* count($where = array())
	* liste_article($ = 10, $debut = 0)
	*/

	function __construct()
    {
        parent::__construct();
    }
    

	protected $table ='article';

	/* CRUD */

	// Ajouter un article
	/*
	* @param string $auteur  L'auteur de l'article
	* @param string $titre  Le titre de l'article
	* @param string $contenu  Le contenu de l'article
	*/
	public function create_article($art_id,$rub_id,$titre = null,$content = null) {
		
		$now = new DateTime ( NULL, new DateTimeZone('UTC'));

		// Use dashes to separate words;
		// third param is true to change all letters to lowercase
		$slug = url_title($titre, 'dash', true);

		$data = array(
			'art_id' => $art_id,
			'rub_id' => $rub_id,
			'art_title' => $titre,
			'art_content' => $content,
			'art_date' => $now->format('Y-m-d H:i:s'),
			'art_url_rw' => $slug
		);
 
		$this->db->insert($this->table, $data);
	}	




	// Update un article déjà existant
	/*
	* @param integer $art_id  L'id de l'article a modifier
	* @param integer $rub_id  L'id de la rubrique l'article a modifier
	* @param string $titre  Le titre de l'article
	* @param string $content  Le contenu de l'article
	*/
	public function update_article($art_id, $rub_id, $titre = null, $content = null) {
		
		$date = new DateTime(null, new DateTimeZone('Europe/Paris'));

		// Use dashes to separate words;
		// third param is true to change all letters to lowercase
		$slug = url_title($titre, 'dash', true);
		
		$data = array(
			'rub_id' => $rub_id,
			'art_title' => $titre,
			'art_content' => $content,
			'art_datemodif'   => $date->format('Y-m-d H:i:s'),
			'art_url_rw' => $slug
		);
		//$this->db->_protect_identifiers = FALSE;
		$this->db->update($this->table, $data, "art_id = $art_id");

		//$sql = "UPDATE $this->table SET art_id = '{$art_id}', r_id = '{$rub_id}', art_title = '{$titre}', art_content = '{$content}'  WHERE art_id = $art_id";
		//$this->db->query($sql);
	}


	// Edite le slug de l'article
	/*
	* @param integer $art_id  L'id de l'article a modifier
	* @param string $slug  L'url seo friendly de l'article 
	*/
	public function edit_slug($art_id, $slug) {
		
		$this->db->update($this->table, array('art_url_rw' => $slug), "art_id = $art_id");

	}

	// Supprimer un article
	/*
	* @param integer $id  L'id de la article a modifier
	* @return bool Le résultat de la requete
	*/
	public function delete_article($id){
		$this->db->delete($this->table, array('art_id' => $id)); 
	}


	/* GETTERS */

	// Retourne le nombre d'article
	/*
	*@return integer  Le nombre de article 
	*/
	
	// Retourne tous les articles
	public function get_all_articles() { 	
		return $query = $this->db->get($this->table);	
	}

	
	// Retourne un enregistrement/article - Spécifiez la colonne dans la vue
	public function get_row($id) {
		$query = $this->db->get_where($this->table, array('art_id' => $id));
		return ($query->num_rows() > 0) ? $query->row() : false;
	}


	// Retourne un enregistrement/article - Spécifiez la colonne dans la vue
	public function get_row_by_slug($slug) {
		$query = $this->db->get_where($this->table, array('art_url_rw' => $slug));
		return ($query->num_rows() > 0) ? $query->row() : false;
	}
	

	/* 
	* Retourne les 5 derniers articles
	*/
	public function get_last_articles() {
		$this->db->order_by('art_date', 'desc');
		$query = $this->db->get($this->table, 5);
		return $query;
	} 
	
	/* 
	* Retourne le dernier article
	*/
	public function get_last_article() {
		$this->db->order_by('art_date', 'desc');
		$query = $this->db->get($this->table, 1);
		return $query;
	} 


	// Read : Lire toutes les rubriques 
	public function read_rubric() {
		$this->db->select('r_id, r_title, r_description')
				->from('rubrique')
				->order_by('r_id', 'DESC');
		
		$query = $this->db->get();
		return $query;
	}


	public function count_all() {
		return (int) $this->db->count_all_results($this->table);
	}
	

	/* Menu blog */
		
	public function get_javascript() {
		$query = $this->db->get_where($this->table, array('rub_id' => 1));
		return $query;
	}
	
	public function get_crypto() {
		$query = $this->db->get_where($this->table, array('rub_id' => 2));
		return $query;
	}
	
	public function get_tools() {
		$query = $this->db->get_where($this->table, array('rub_id' => 3));
		return $query;
	}
			
}

/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */