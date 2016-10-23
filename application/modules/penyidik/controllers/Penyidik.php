<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyidik extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penyidik_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('__backend');

		$this->output->js('assets/js/plugins/tables/datatables/datatables.min.js');
		$this->output->js('assets/js/plugins/forms/selects/select2.min.js');
		$this->output->js('assets/js/plugins/notifications/sweet_alert.min.js');

		$this->output->section('navbar', '__template/__backend/navbar');
		$this->output->section('pageheader', '__template/__backend/pageheader');
		$this->output->section('footer', '__template/__backend/footer');
	}

	public function index()
	{
		
	}

	public function lihat_data()
	{
		$data = array('');

		$this->load->view('penyidik_lihat_data_content', $data, FALSE);
	}

	public function ajax_list()
    {
    	$this->output->unset_template();

    	$this->load->library('Datatable', array('model' => 'penyidik_dt_model', 'rowIdCol' => 'id_pekerjaan'));

    	$jsonArray = $this->datatable->datatableJson(array());		

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($jsonArray));
    }

}

/* End of file Penyidik.php */
/* Location: ./application/modules/penyidik/controllers/Penyidik.php */