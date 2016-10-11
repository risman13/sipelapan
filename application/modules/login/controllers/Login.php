<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function index()
	{
		$content = array('');

		$this->template->frontend($content);
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */