<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_grup_wilayah_model extends CI_Model {

	public function select_master_grup_wilayah()
	{
		$query = $this->db->get('master_grup_wilayah');

		return $query->result();
	}

	public function insert_master_grup_wilayah($nama_grup_wilayah)
	{
		$object = array(
			'nama_grup_wilayah' => $nama_grup_wilayah, 
		);

		$this->db->where('nama_grup_wilayah', $nama_grup_wilayah);
		$cek = $this->db->get('master_grup_wilayah');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Grup Wilayah" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_grup_wilayah', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Grup Wilayah Berhasil Ditambah',
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

	public function update_master_grup_wilayah($nama_grup_wilayah, $id_grup_wilayah)
	{
		$object = array(
			'nama_grup_wilayah' => $nama_grup_wilayah, 
		);

		$this->db->where('nama_grup_wilayah', $nama_grup_wilayah);
		$this->db->where('id_grup_wilayah <>', $id_grup_wilayah);
		$cek = $this->db->get('master_grup_wilayah');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Grup Wilayah" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_grup_wilayah', $id_grup_wilayah);
				$query = $this->db->update('master_grup_wilayah', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Grup Wilayah Berhasil Diubah',
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

	public function delete_master_grup_wilayah($id_grup_wilayah)
	{
		$this->db->where('id_grup_wilayah', $id_grup_wilayah);
		$query = $this->db->delete('master_grup_wilayah');

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
				'return_mesage' => 'Berhasil menghapus data Grup Wilayah',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file Master_grup_wilayah_model.php */
/* Location: ./application/modules/master/models/Master_grup_wilayah_model.php */