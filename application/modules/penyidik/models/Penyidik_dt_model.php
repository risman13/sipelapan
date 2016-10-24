<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyidik_dt_model extends CI_Model implements DatatableModel {

	public function appendToSelectStr() 
    {
        return array(
            'nama_penyidik' => 'CONCAT(A.nama_lengkap,", ",A.gelar, "<br>NRP: ", A.nrp)'
        );
    }

    public function fromTableStr() 
    {
        return 'penyidik A';
    }

    public function joinArray() 
    {
        return array(
            'master_satuan B' => 'A.id_satuan = B.id_satuan',
            'master_pangkat C' => 'A.id_pangkat = C.id_pangkat',
            'master_pendidikan_terakhir D' => 'A.id_pendidikan_terakhir = D.id_pendidikan_terakhir',
        );
    }

    public function whereClauseArray()
    {
        return array(
            'A.id_penyidik' => 1
        );
    }

}

/* End of file Penyidik_dt_model.php */
/* Location: ./application/modules/penyidik/models/Penyidik_dt_model.php */