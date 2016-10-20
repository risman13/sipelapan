<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_agama_model extends CI_Model {

	public function select_master_agama()
	{
		$query = $this->db->get('master_agama');

		return $query->result();
	}

	public function insert_master_agama($nama_agama)
	{
		$object = array(
			'nama_agama' => $nama_agama, 
		);

		$this->db->where('nama_agama', $nama_agama);
		$cek = $this->db->get('master_agama');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "agama" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_agama', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data agama Berhasil Ditambah',
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

	public function update_master_agama($nama_agama, $id_agama)
	{
		$object = array(
			'nama_agama' => $nama_agama, 
		);

		$this->db->where('nama_agama', $nama_agama);
		$this->db->where('id_agama <>', $id_agama);
		$cek = $this->db->get('master_agama');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama agama" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_agama', $id_agama);
				$query = $this->db->update('master_agama', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data agama Berhasil Diubah',
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

	public function delete_master_agama($id_agama)
	{
		$this->db->where('id_agama', $id_agama);
		$query = $this->db->delete('master_agama');

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
				'return_mesage' => 'Berhasil menghapus data agama',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file master_agama_model.php */
/* Location: ./application/modules/master/models/master_agama_model.php */