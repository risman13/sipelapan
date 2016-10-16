<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function select_user($username, $password)
	{
		$param = array(
			'username' => $username,
			'password' => $password);
		$query = $this->db->query("CALL app_procLogin(?,?)", $param);

		return $query->row_array();
	}

}

/* End of file Login_model.php */
/* Location: ./application/modules/login/models/Login_model.php */