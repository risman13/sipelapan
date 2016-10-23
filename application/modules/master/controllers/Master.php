<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_pekerjaan_model');
		$this->load->model('master_suku_model');
		$this->load->model('master_pendidikan_terakhir_model');
		$this->load->model('master_motif_kejahatan_model');
		$this->load->model('master_pangkat_model');
		$this->load->model('master_agama_model');
		$this->load->model('master_warganegara_model');
		$this->load->model('master_grup_wilayah_model');

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

///======================================================================================================

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

///======================================================================================================

	/* begin master data pendidikan terakhir */
	public function data_pendidikan_terakhir()
	{
		$data = array(
			'data_pendidikan_terakhir' => $this->master_pendidikan_terakhir_model->select_master_pendidikan_terakhir(), 
		);

		$this->load->view('data_pendidikan_terakhir_content', $data, FALSE);
	}

	public function data_pendidikan_terakhir_tambah()
	{
		$this->form_validation->set_rules('nama_pendidikan_terakhir', 'Nama Pendidikan Terakhir', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pendidikan_terakhir'));
		} 
		else 
		{
			$response = $this->master_pendidikan_terakhir_model->insert_master_pendidikan_terakhir(strtoupper($this->input->post('nama_pendidikan_terakhir')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pendidikan_terakhir'));
		}
	}

	public function data_pendidikan_terakhir_edit()
	{
		$this->form_validation->set_rules('nama_pendidikan_terakhir', 'Nama Pendidikan Terakhir', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pendidikan_terakhir'));
		} 
		else 
		{
			$response = $this->master_pendidikan_terakhir_model->update_master_pendidikan_terakhir(strtoupper($this->input->post('nama_pendidikan_terakhir')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pendidikan_terakhir'));
		}
	}

	public function data_pendidikan_terakhir_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_pendidikan_terakhir_model->delete_master_pendidikan_terakhir($this->input->post('id_pendidikan_terakhir'));

		echo json_encode($response);
	}
	/* end master data pendidikan terakhir */

///======================================================================================================

	/* begin master data motif kejahatan */
	public function data_motif_kejahatan()
	{
		$data = array(
			'data_motif_kejahatan' => $this->master_motif_kejahatan_model->select_master_motif_kejahatan(), 
		);

		$this->load->view('data_motif_kejahatan_content', $data, FALSE);
	}

	public function data_motif_kejahatan_tambah()
	{
		$this->form_validation->set_rules('nama_motif_kejahatan', 'Nama Motif Kejahatan', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_motif_kejahatan'));
		} 
		else 
		{
			$response = $this->master_motif_kejahatan_model->insert_master_motif_kejahatan(strtoupper($this->input->post('nama_motif_kejahatan')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_motif_kejahatan'));
		}
	}

	public function data_motif_kejahatan_edit()
	{
		$this->form_validation->set_rules('nama_motif_kejahatan', 'Nama Motif Kejahatan', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_motif_kejahatan'));
		} 
		else 
		{
			$response = $this->master_motif_kejahatan_model->update_master_motif_kejahatan(strtoupper($this->input->post('nama_motif_kejahatan')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_motif_kejahatan'));
		}
	}

	public function data_motif_kejahatan_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_motif_kejahatan_model->delete_master_motif_kejahatan($this->input->post('id_motif_kejahatan'));

		echo json_encode($response);
	}
	/* end master data motif kejahatan */

///======================================================================================================

	/* begin master data pangkat */
	public function data_pangkat()
	{
		$data = array(
			'data_pangkat' => $this->master_pangkat_model->select_master_pangkat(), 
		);

		$this->load->view('data_pangkat_content', $data, FALSE);
	}

	public function data_pangkat_tambah()
	{
		$this->form_validation->set_rules('nama_pangkat', 'Nama Pangkat', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pangkat'));
		} 
		else 
		{
			$response = $this->master_pangkat_model->insert_master_pangkat(strtoupper($this->input->post('nama_pangkat')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pangkat'));
		}
	}

	public function data_pangkat_edit()
	{
		$this->form_validation->set_rules('nama_pangkat', 'Nama Pangkat', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pangkat'));
		} 
		else 
		{
			$response = $this->master_pangkat_model->update_master_pangkat(strtoupper($this->input->post('nama_pangkat')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_pangkat'));
		}
	}

	public function data_pangkat_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_pangkat_model->delete_master_pangkat($this->input->post('id_pangkat'));

		echo json_encode($response);
	}
	/* end master data pangkat */

///======================================================================================================

	/* begin master data agama */
	public function data_agama()
	{
		$data = array(
			'data_agama' => $this->master_agama_model->select_master_agama(), 
		);

		$this->load->view('data_agama_content', $data, FALSE);
	}

	public function data_agama_tambah()
	{
		$this->form_validation->set_rules('nama_agama', 'Nama Agama', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_agama'));
		} 
		else 
		{
			$response = $this->master_agama_model->insert_master_agama(strtoupper($this->input->post('nama_agama')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_agama'));
		}
	}

	public function data_agama_edit()
	{
		$this->form_validation->set_rules('nama_agama', 'Nama Agama', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_agama'));
		} 
		else 
		{
			$response = $this->master_agama_model->update_master_agama(strtoupper($this->input->post('nama_agama')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_agama'));
		}
	}

	public function data_agama_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_agama_model->delete_master_agama($this->input->post('id_agama'));

		echo json_encode($response);
	}
	/* end master data agama */	

///======================================================================================================

	/* begin master data warganegara */
	public function data_warganegara()
	{
		$data = array(
			'data_warganegara' => $this->master_warganegara_model->select_master_warganegara(), 
		);

		$this->load->view('data_warganegara_content', $data, FALSE);
	}

	public function data_warganegara_tambah()
	{
		$this->form_validation->set_rules('nama_warganegara', 'Nama Warga Negara', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_warganegara'));
		} 
		else 
		{
			$response = $this->master_warganegara_model->insert_master_warganegara(strtoupper($this->input->post('nama_warganegara')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_warganegara'));
		}
	}

	public function data_warganegara_edit()
	{
		$this->form_validation->set_rules('nama_warganegara', 'Nama Warganegara', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_warganegara'));
		} 
		else 
		{
			$response = $this->master_warganegara_model->update_master_warganegara(strtoupper($this->input->post('nama_warganegara')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_warganegara'));
		}
	}

	public function data_warganegara_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_warganegara_model->delete_master_warganegara($this->input->post('id_warganegara'));

		echo json_encode($response);
	}
	/* end master data warganegara */	

///======================================================================================================

	/* begin master data grup wilayah */
	public function data_grup_wilayah()
	{
		$data = array(
			'data_grup_wilayah' => $this->master_grup_wilayah_model->select_master_grup_wilayah(), 
		);

		$this->load->view('data_grup_wilayah_content', $data, FALSE);
	}

	public function data_grup_wilayah_tambah()
	{
		$this->form_validation->set_rules('nama_grup_wilayah', 'Nama Grup Wilayah', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_grup_wilayah'));
		} 
		else 
		{
			$response = $this->master_grup_wilayah_model->insert_master_grup_wilayah(strtoupper($this->input->post('nama_grup_wilayah')));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_grup_wilayah'));
		}
	}

	public function data_grup_wilayah_edit()
	{
		$this->form_validation->set_rules('nama_grup_wilayah', 'Nama Grup Wilayah', 'trim|required|max_length[20]', 
			array('required' => '%s Tidak boleh kosong', 'max_length' => 'Panjang maksimal %s 20 karakter'));

		if ($this->form_validation->run() == FALSE) 
		{
			$_SESSION['ResponTitle']  = 'Gagal Simpan!';
			$_SESSION['ResponMesage'] = validation_errors();
			$_SESSION['ResponColor']  = 'danger';			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_grup_wilayah'));
		} 
		else 
		{
			$response = $this->master_grup_wilayah_model->update_master_grup_wilayah(strtoupper($this->input->post('nama_grup_wilayah')), 
				$this->input->post('id'));

			$_SESSION['ResponTitle']  = $response['return_title'];
			$_SESSION['ResponMesage'] = $response['return_mesage'];
			$_SESSION['ResponColor']  = $response['return_color'];			
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('master/data_grup_wilayah'));
		}
	}

	public function data_grup_wilayah_hapus()
	{
		$this->output->unset_template();

		$response = $this->master_grup_wilayah_model->delete_master_grup_wilayah($this->input->post('id_grup_wilayah'));

		echo json_encode($response);
	}
	/* end master data grupwilayah */	
}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */