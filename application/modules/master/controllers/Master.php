<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_pekerjaan_model');
		$this->load->model('master_suku_model');

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

	public function data_pekerjaan_edit()
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
			$response = $this->master_pekerjaan_model->update_master_pekerjaan(strtoupper($this->input->post('nama_pekerjaan')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pekerjaan'));
		}
	}

	public function data_pekerjaan_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_pekerjaan_model->delete_master_pekerjaan($this->input->post('id_pekerjaan'));

		echo json_encode($response);
	}
	/* end master data pekerjaan */



	/* begin master data suku */
	public function data_suku()
	{
		$data = array(
			'data_suku' => $this->master_suku_model->select_master_suku(), 
		);

		$this->load->view('data_suku_content', $data, FALSE);
	}

	public function data_suku_tambah()
	{
		$this->form_validation->set_rules('nama_suku', 'Nama Suku', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_suku'));
		} 
		else 
		{
			$response = $this->master_suku_model->insert_master_suku(strtoupper($this->input->post('nama_suku')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_suku'));
		}
	}

	public function data_suku_edit()
	{
		$this->form_validation->set_rules('nama_suku', 'Nama Suku', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_suku'));
		} 
		else 
		{
			$response = $this->master_suku_model->update_master_suku(strtoupper($this->input->post('nama_suku')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_suku'));
		}
	}

	public function data_suku_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_suku_model->delete_master_suku($this->input->post('id_suku'));

		echo json_encode($response);
	}
	/* end master data suku */
}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */