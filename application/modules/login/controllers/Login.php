<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('__backend');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) 
		{
			redirect(base_url('dashboard'));
		} 
		else 
		{
			$this->load->view('login_content');
		}
	}

	public function auth()
	{
		if (!($this->input->post('username')) AND !($this->input->post('password'))) 
		{
			$authResponse = array(
				'ResponMesage' => 'Access forbidden!',
				'ResponColor' => 'danger',
				'ResponTitle' => 'Not Allowed!',
				'ResponCode' => 0);
		}
		else
		{
			$authResponse = $this->login_model->select_user($this->input->post('username'), md5($this->input->post('password')));
		}

		if ($authResponse['ResponCode'] == 1) 
		{
			$sessionData = array(
				'id_users' => $authResponse['id_users'],
				'id_user_groups' => $authResponse['id_user_groups'],
				'username' => $authResponse['username'],
				'email' => $authResponse['email'],
				'nama_lengkap' => $authResponse['nama_lengkap'],
				'lok_foto' => $authResponse['lok_foto'],
				'forget_key' => $authResponse['forget_key'],
				'group_level' => $authResponse['group_level'],
				'group_name' => $authResponse['group_name'],
				'role' => $authResponse['role'],
			);

			$this->session->set_userdata($sessionData);
			redirect(base_url('dashboard'));
		} 
		else 
		{
			$_SESSION['ResponMesage'] = $authResponse['ResponMesage'];
			$_SESSION['ResponColor']  = $authResponse['ResponColor'];
			$_SESSION['ResponTitle']  = $authResponse['ResponTitle'];
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('login'));
		}
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */