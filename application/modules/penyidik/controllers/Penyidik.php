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

        $list = $this->penyidik_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->nama_pekerjaan;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->penyidik_model->count_all(),
                        "recordsFiltered" => $this->penyidik_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

}

/* End of file Penyidik.php */
/* Location: ./application/modules/penyidik/controllers/Penyidik.php */