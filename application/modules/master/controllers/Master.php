<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_pekerjaan_model');
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
 		$this->load->view('data_pekerjaan_content');
	}

	/* begin master data pekerjaan */
	public function data_pekerjaan()
	{
		$data = array(
			'data_pekerjaan' => $this->master_pekerjaan_model->select_master_pekerjaan(), 
		);

		$this->load->view('data_pekerjaan_content', $data, FALSE);
	}

	public function data_pekerjaan_tambah()
	{
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pekerjaan'));
		} 
		else 
		{
			$response = $this->master_pekerjaan_model->insert_master_pekerjaan(strtoupper($this->input->post('nama_pekerjaan')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pekerjaan'));
		}
	}
	/* end master data pekerjaan */
}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */