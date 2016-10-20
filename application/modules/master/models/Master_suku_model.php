<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_suku_model extends CI_Model {

	public function select_master_suku()
	{
		$query = $this->db->get('master_suku');

		return $query->result();
	}

	public function insert_master_suku($nama_suku)
	{
		$object = array(
			'nama_suku' => $nama_suku, 
		);

		$this->db->where('nama_suku', $nama_suku);
		$cek = $this->db->get('master_suku');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Suku" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_suku', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Suku Berhasil Ditambah',
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

	public function update_master_suku($nama_suku, $id_suku)
	{
		$object = array(
			'nama_suku' => $nama_suku, 
		);

		$this->db->where('nama_suku', $nama_suku);
		$this->db->where('id_suku <>', $id_suku);
		$cek = $this->db->get('master_suku');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Suku" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_suku', $id_suku);
				$query = $this->db->update('master_suku', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Suku Berhasil Diubah',
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

	public function delete_master_suku($id_suku)
	{
		try 
		{
			$this->db->where('id_suku', $id_suku);
			$query = $this->db->delete('master_suku');

			if (!$query) 
			{
				throw new Exception($this->db->_error_message());
			}

			$returnData = array(
				'status' => TRUE,
				'return_title' => 'Berhasil',
				'return_mesage' => 'Berhasil menghapus data Suku',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		} 
		catch (Exception $e) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Hapus!',
				'return_mesage' => 'Terjadi kesalahan saat memproses data',
				'return_color' => 'danger',
				'return_status' => 'error'
			);
		}

		return $returnData;
	}

}

/* End of file Master_suku_model.php */
/* Location: ./application/modules/master/models/Master_suku_model.php */