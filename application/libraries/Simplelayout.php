<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Simplelayout {
	private $theme = 'templates';

	public function set_theme($theme) {
		$this->theme = $theme;
	}
	
	public function view($name, $data = array()) {
		$CI =& get_instance();
		$params['main'] = $CI->load->view('/pages/' . $name, $data, true);
		$CI->load->view($this->theme . '/default', $params);
	}
}