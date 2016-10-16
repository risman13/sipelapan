<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('__backend');

		//add js
		$this->output->js('assets/js/plugins/pickers/daterangepicker.js');
		$this->output->js('assets/js/plugins/visualization/d3/d3.min.js');
		$this->output->js('assets/js/plugins/visualization/d3/d3_tooltip.js');
		$this->output->js('assets/js/plugins/forms/styling/switchery.min.js');
		$this->output->js('assets/js/plugins/forms/styling/uniform.min.js');
		$this->output->js('assets/js/plugins/forms/selects/bootstrap_multiselect.js');
		$this->output->js('assets/js/pages/dashboard.js');

		$this->load->view('__template/navbar');
	}

	public function index()
	{
 		$this->load->view('dashboard_content');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */