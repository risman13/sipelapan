<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyidik extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//model
		$this->load->model('penyidik_model');
		$this->load->model('master/master_pangkat_model');
		$this->load->model('master/master_pendidikan_terakhir_model');
		$this->load->model('master/master_grup_wilayah_model');
		$this->load->model('master/master_polres_model');
		$this->load->model('master/master_satuan_model');

		//upload
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '3072';
		$this->load->library('upload', $config);

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
		$this->output->js('assets/js/plugins/forms/styling/uniform.min.js');
		$this->output->js('assets/js/plugins/forms/styling/switch.min.js');
		$this->output->js('assets/js/plugins/forms/inputs/formatter.min.js');

		$this->output->section('navbar', '__template/__backend/navbar');
		$this->output->section('pageheader', '__template/__backend/pageheader');
		$this->output->section('footer', '__template/__backend/footer');
	}

	/*== BEGIN AJAX REQUEST ONLY ==*/
	public function ajax_list()
    {
    	if (!$this->input->is_ajax_request()) 
    	{
            redirect(base_url('auth/forbidden'));
        } 
        else
        {
        	$this->output->unset_template();

	    	$this->load->library('Datatable', array('model' => 'penyidik_dt_model', 'rowIdCol' => 'id_penyidik'));

	    	$jsonArray = $this->datatable->datatableJson(array());		

			$this->output->set_header("Pragma: no-cache");
	        $this->output->set_header("Cache-Control: no-store, no-cache");
	        $this->output->set_content_type('application/json')->set_output(json_encode($jsonArray));
        }
    }

    public function getPolresByGrupWilayah($id_grup_wilayah)
    {
    	if (!$this->input->is_ajax_request()) 
    	{
            redirect(base_url('auth/forbidden'));
        } 
        else 
        {
	    	$this->output->unset_template();

	    	$data = array(
	    		'data_polres' => $this->master_polres_model->select_master_polres_by($id_grup_wilayah),
	    	);

	    	$this->load->view('view_polres_ajax', $data, FALSE);
    	}
    }

    public function getSatuanByPolres($id_polres)
    {
    	if (!$this->input->is_ajax_request()) 
    	{
            redirect(base_url('auth/forbidden'));
        } 
        else 
        {
	    	$this->output->unset_template();

	    	$data = array(
	    		'data_satuan' => $this->master_satuan_model->select_master_satuan_by($id_polres),
	    	);

	    	$this->load->view('view_satuan_ajax', $data, FALSE);
    	}
    }
    /*== END AJAX REQUEST ONLY ==*/

	public function index()
	{
		
	}

	public function lihat_data()
	{
		$this->load->view('penyidik_lihat_data_content');
	}

	public function tambah_data()
	{
		$data = array(
			'data_pangkat' => $this->master_pangkat_model->select_master_pangkat(),
			'data_pendidikan_terakhir' => $this->master_pendidikan_terakhir_model->select_master_pendidikan_terakhir(),
			'data_grup_wilayah' => $this->master_grup_wilayah_model->select_master_grup_wilayah(),
		);

		$this->load->view('penyidik_tambah_data_content', $data, FALSE);
	}

	public function tambah_data_act()
	{
		//$this->output->unset_template();
		//print_r($this->input->post());

		$this->form_validation->set_rules('nama_penyidik', 'Nama Penyidik', 'trim|required', array('required' => '%s Tidak boleh kosong'));
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => '%s Tidak boleh kosong'));
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required', array('required' => '%s Tidak boleh kosong'));
		$this->form_validation->set_rules('nrp', 'NRP', 'trim|required|int', array('required' => '%s Tidak boleh kosong', 'int' => 'Data %s tidak valid, hanya boleh berisi angka'));
		$this->form_validation->set_rules('nrp', 'NRP', 'trim|required|numeric', array('required' => '%s Tidak boleh kosong', 'numeric' => 'Data %s tidak valid, hanya boleh berisi angka'));
		$this->form_validation->set_rules('no_hp', 'No. HP', 'trim|required|max_length[14]', array('required' => '%s Tidak boleh kosong', 'max_length' => '%s maksimal 12 karakter'));
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', array('required' => '%s Tidak boleh kosong'));
		$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'trim|required', array('required' => '%s Tidak boleh kosong'));
		$this->form_validation->set_rules('tahun_ijazah', 'Tahun Ijazah', 'trim|required|max_length[4]', array('required' => '%s Tidak boleh kosong', 'max_length' => '%s maksimal 4 karakter'));
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email', array('required' => '%s Tidak boleh kosong', 'valid_email' => '%s tidak valid'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('penyidik/tambah_data'));
		} 
		else 
		{
			$no_hp = str_replace(' ', '', $this->input->post('no_hp'));
			$flag_aktif = ($this->input->post('status_aktif') == 'on') ? 'Y' : 'T';
			
			if ( ! $this->upload->do_upload('foto'))
			{
				$response = $this->penyidik_model->insert_penyidik($this->input->post('satuan'), $this->input->post('pangkat'), strtoupper($this->input->post('nama_penyidik')), $this->input->post('nrp'), $this->input->post('jabatan'), $no_hp, $this->input->post('email'), $this->input->post('pendidikan_terakhir'), $this->input->post('tahun_ijazah'), $this->input->post('gelar'), $this->input->post('perguruan_tinggi'), NULL, $flag_aktif);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				
				$response = $this->penyidik_model->insert_penyidik($this->input->post('satuan'), $this->input->post('pangkat'), strtoupper($this->input->post('nama_penyidik')), $this->input->post('nrp'), $this->input->post('jabatan'), $no_hp, $this->input->post('email'), $this->input->post('pendidikan_terakhir'), $this->input->post('tahun_ijazah'), $this->input->post('gelar'), strtoupper($this->input->post('perguruan_tinggi')), $data['upload_data']['file_name'], $flag_aktif);
			}

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('penyidik/tambah_data'));
		}
	}

}

/* End of file Penyidik.php */
/* Location: ./application/modules/penyidik/controllers/Penyidik.php */