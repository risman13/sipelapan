<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('__backend');
	}

	public function index()
	{
		$this->load->view('login_content');
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */