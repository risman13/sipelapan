<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pendidikan_terakhir_model extends CI_Model {

	public function select_master_pendidikan_terakhir()
	{
		$query = $this->db->get('master_pendidikan_terakhir');

		return $query->result();
	}

	public function insert_master_pendidikan_terakhir($nama_pendidikan_terakhir)
	{
		$object = array(
			'nama_pendidikan_terakhir' => $nama_pendidikan_terakhir, 
		);

		$this->db->where('nama_pendidikan_terakhir', $nama_pendidikan_terakhir);
		$cek = $this->db->get('master_pendidikan_terakhir');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Pendidikan Terakhir" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_pendidikan_terakhir', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pendidikan Terakhir Berhasil Ditambah',
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

	public function update_master_pendidikan_terakhir($nama_pendidikan_terakhir, $id_pendidikan_terakhir)
	{
		$object = array(
			'nama_pendidikan_terakhir' => $nama_pendidikan_terakhir, 
		);

		$this->db->where('nama_pendidikan_terakhir', $nama_pendidikan_terakhir);
		$this->db->where('id_pendidikan_terakhir <>', $id_pendidikan_terakhir);
		$cek = $this->db->get('master_pendidikan_terakhir');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Pendidikan Terakhir" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_pendidikan_terakhir', $id_pendidikan_terakhir);
				$query = $this->db->update('master_pendidikan_terakhir', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pendidikan Terakhir Berhasil Diubah',
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

	public function delete_master_pendidikan_terakhir($id_pendidikan_terakhir)
	{
		$this->db->where('id_pendidikan_terakhir', $id_pendidikan_terakhir);
		$query = $this->db->delete('master_pendidikan_terakhir');

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
				'return_mesage' => 'Berhasil menghapus data Pendidikan Terakhir',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file master_pendidikan_terakhir_model.php */
/* Location: ./application/modules/master/models/master_pendidikan_terakhir_model.php */