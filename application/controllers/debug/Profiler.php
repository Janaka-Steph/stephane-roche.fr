<?php

class Profiler extends CI_Controller {
	public function index() {
		$this->output->enable_profiler(true);
	}
}

/* Location: ./application/controllers/debug/profiler.php */