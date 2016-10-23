<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kategori_tkp_model extends CI_Model {

	public function select_master_kategori_tkp()
	{
		$query = $this->db->get('master_kategori_tkp');

		return $query->result();
	}

	public function insert_master_kategori_tkp($nama_kategori_tkp)
	{
		$object = array(
			'nama_kategori_tkp' => $nama_kategori_tkp, 
		);

		$this->db->where('nama_kategori_tkp', $nama_kategori_tkp);
		$cek = $this->db->get('master_kategori_tkp');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Kategori TKP" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_kategori_tkp', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Kategori TKP Berhasil Ditambah',
					'return_color' => 'success'
				);
			} 
			catch (Exception $e) 
			{
				$returnData = array(
					'status' => FALSE,
					'return_title' => 'Gagal Simpan!',
					'return_mesage' => 'Terjadi kesalahan saat memproses data',
					'return_color' => 'danger'
				);
			}
				
		}

		return $returnData;
	}

	public function update_master_kategori_tkp($nama_kategori_tkp, $id_kategori_tkp)
	{
		$object = array(
			'nama_kategori_tkp' => $nama_kategori_tkp, 
		);

		$this->db->where('nama_kategori_tkp', $nama_kategori_tkp);
		$this->db->where('id_kategori_tkp <>', $id_kategori_tkp);
		$cek = $this->db->get('master_kategori_tkp');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Kategori TKP" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_kategori_tkp', $id_kategori_tkp);
				$query = $this->db->update('master_kategori_tkp', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Kategori TKP Berhasil Diubah',
					'return_color' => 'success'
				);
			} 
			catch (Exception $e) 
			{
				$returnData = array(
					'status' => FALSE,
					'return_title' => 'Gagal Simpan!',
					'return_mesage' => 'Terjadi kesalahan saat memproses data',
					'return_color' => 'danger'
				);
			}
				
		}

		return $returnData;
	}

	public function delete_master_kategori_tkp($id_kategori_tkp)
	{
		$this->db->where('id_kategori_tkp', $id_kategori_tkp);
		$query = $this->db->delete('master_kategori_tkp');

		if ($this->db->affected_rows() == 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Hapus!',
				'return_mesage' => 'Terjadi kesalahan saat memproses data',
				'return_color' => 'danger',
				'return_status' => 'error'
			);
		}
		else
		{
			$returnData = array(
				'status' => TRUE,
				'return_title' => 'Berhasil',
				'return_mesage' => 'Berhasil menghapus data Kategori TKP',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file Master_kategori_tkp_model.php */
/* Location: ./application/modules/master/models/Master_kategori_tkp_model.php */