<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('__backend');

		$this->output->section('navbar', '__template/__backend/navbar');
		$this->output->section('pageheader', '__template/__backend/pageheader');
		$this->output->section('footer', '__template/__backend/footer');
	}

	public function index()
	{
 		$this->load->view('data_pekerjaan_content');
	}

	public function data_pekerjaan()
	{
		$this->load->view('data_pekerjaan_content');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */