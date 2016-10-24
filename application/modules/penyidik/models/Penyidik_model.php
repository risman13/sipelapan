<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyidik_model extends CI_Model {

	var $table = 'master_pekerjaan';
    var $column_order = array(null, 'nama_pekerjaan'); //set column field database for datatable orderable
    var $column_search = array('nama_pekerjaan'); //set column field database for datatable searchable 
    var $order = array('id_pekerjaan' => 'asc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_penyidik($id_satuan, $id_pangkat, $nama_lengkap, $nrp, $jabatan, $no_hp, $email, $id_pendidikan_terakhir, $tahun_ijazah, $gelar, $nama_perguruan_tinggi, $foto_file, $flag_aktif)
    {
        $object = array(
            'id_satuan' => $id_satuan, 
            'id_pangkat' => $id_pangkat, 
            'nama_lengkap' => $nama_lengkap, 
            'nrp' => $nrp, 
            'jabatan' => $jabatan, 
            'no_hp' => $no_hp, 
            'email' => $email, 
            'id_pendidikan_terakhir' => $id_pendidikan_terakhir, 
            'tahun_ijazah' => $tahun_ijazah, 
            'gelar' => $gelar, 
            'nama_perguruan_tinggi' => $nama_perguruan_tinggi, 
            'foto_file' => $foto_file, 
            'flag_aktif' => $flag_aktif,
        );

        $this->db->where('nrp', $nrp);
        $this->db->or_where('nama_lengkap', $nama_lengkap);
        $this->db->or_where('no_hp', $no_hp);
        $this->db->or_where('email', $email);
        $cek = $this->db->get('penyidik');

        if ($cek->num_rows() > 0) 
        {
           $returnData = array(
                'status' => FALSE,
                'return_title' => 'Gagal Simpan!',
                'return_mesage' => 'Komponen Nama, NRP, No. HP, Email tidak boleh sama dengan penyidik lain',
                'return_color' => 'danger'
            );
        } 
        else 
        {
            $query = $this->db->insert('penyidik', $object);

            if (!$query) 
            {
               $returnData = array(
                    'status' => FALSE,
                    'return_title' => 'Gagal Simpan!',
                    'return_mesage' => 'Terjadi kesalahan saat memproses data',
                    'return_error' => $this->db->_error_message(),
                    'return_color' => 'danger'
                );
            } 
            else 
            {
                $returnData = array(
                    'status' => TRUE,
                    'return_title' => 'Berhasil',
                    'return_mesage' => 'Data Penyidik Berhasil Ditambah',
                    'return_color' => 'success'
                );
            }
            
        }

        return $returnData;        
    }

}

/* End of file Penyidik_model.php */
/* Location: ./application/modules/penyidik/models/Penyidik_model.php */