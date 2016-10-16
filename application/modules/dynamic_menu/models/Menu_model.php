<?php
/**
 * @Author: ramadhansutejo
 * @Date:   2016-06-25 11:51:24
 * @Last Modified by:   codegeek
 * @Last Modified time: 2016-07-11 10:27:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function select_parent_menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('menu_role', 'menu_role.id_menu = menu.id_menu');
		$this->db->where('menu_role.id_user_groups', $this->session->userdata('id_user_groups'));
		$this->db->where('menu.aktif', 'Y');
		$this->db->where('menu.id_parent', 0);
		$this->db->order_by('menu.nourut', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function select_child_menu($id_parent)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('menu_role', 'menu_role.id_menu = menu.id_menu');
		$this->db->where('menu_role.id_user_groups', $this->session->userdata('id_user_groups'));
		$this->db->where('menu.aktif', 'Y');
		$this->db->where('menu.id_parent', $id_parent);
		$this->db->order_by('menu.nourut', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

}

/* End of file Menu_model.php */
/* Location: ./application/modules/dashboard/models/Menu_model.php */