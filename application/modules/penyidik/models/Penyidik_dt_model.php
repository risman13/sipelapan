<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyidik_dt_model extends CI_Model implements DatatableModel {

	public function appendToSelectStr() 
    {
        return NULL;
    }

    public function fromTableStr() 
    {
        return 'master_pekerjaan A';
    }

    public function joinArray() 
    {
        return NULL;
    }

    public function whereClauseArray()
    {
        return NULL;
    }

}

/* End of file Penyidik_dt_model.php */
/* Location: ./application/modules/penyidik/models/Penyidik_dt_model.php */