<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('GMT');
		$this->load->model('auth_model');
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
			$this->login();
		}
	}

	public function login()
	{
		if (($this->session->tempdata('login_failed') >= 5) AND (date('i')-$this->session->tempdata('last_failed')<2))
		{
			$this->load->view('failed_login_content');
		}
		else if ($this->session->tempdata('login_failed') >= 5)
		{
			$this->session->sess_destroy();
			$this->load->view('login_content');
		}
		else 
		{
			$this->load->view('login_content');
		}
	}

	public function cek_login()
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
			$authResponse = $this->auth_model->select_user($this->input->post('username'), md5($this->input->post('password')));
		}

		if ($authResponse['ResponCode'] == 1) 
		{
			$sessionData = array(
				'logged_in' => TRUE,
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
			$minute = date('i');
			if (!$this->session->tempdata('login_failed')) 
			{
				$login_failed = 1;
			} 
			else 
			{
				$login_failed = $this->session->tempdata('login_failed');
				$login_failed++;
			}	

			$sessionData = array(
				'login_failed' => $login_failed, 
				'last_failed' => $minute,
			);
			$this->session->set_tempdata($sessionData, 180);

			$_SESSION['ResponMesage'] = $authResponse['ResponMesage'].
			'<br><strong> '.$this->session->userdata('login_failed').' kali gagal login. Jika 5 kali salah, anda harus menungu selama 3 menit untuk dapat login kembali</strong>';

			$_SESSION['ResponColor']  = $authResponse['ResponColor'];
			$_SESSION['ResponTitle']  = $authResponse['ResponTitle'];
			$this->session->mark_as_flash(array('ResponMesage', 'ResponColor', 'ResponTitle'));
			redirect(base_url('auth'));
		}
	}

	public function logout()
	{
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
	    $this->session->sess_destroy();
	    redirect(base_url('auth'));
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/Auth/controllers/Auth.php */