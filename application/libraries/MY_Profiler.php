<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Profiler extends CI_Profiler {

	protected $_available_sections = array(
										'uri_string',										
										'controller_info',
										'benchmarks',
										'memory_usage',
										'get',
										'post',
										'queries',
										'http_headers',
										'session_data',
										'config'
										);

	
}