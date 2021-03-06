<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pangkat_model extends CI_Model {

	public function select_master_pangkat()
	{
		$query = $this->db->get('master_pangkat');

		return $query->result();
	}

	public function insert_master_pangkat($nama_pangkat)
	{
		$object = array(
			'nama_pangkat' => $nama_pangkat, 
		);

		$this->db->where('nama_pangkat', $nama_pangkat);
		$cek = $this->db->get('master_pangkat');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Pangkat" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_pangkat', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pangkat Berhasil Ditambah',
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

	public function update_master_pangkat($nama_pangkat, $id_pangkat)
	{
		$object = array(
			'nama_pangkat' => $nama_pangkat, 
		);

		$this->db->where('nama_pangkat', $nama_pangkat);
		$this->db->where('id_pangkat <>', $id_pangkat);
		$cek = $this->db->get('master_pangkat');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Pangkat" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_pangkat', $id_pangkat);
				$query = $this->db->update('master_pangkat', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pangkat Berhasil Diubah',
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

	public function delete_master_pangkat($id_pangkat)
	{
		$this->db->where('id_pangkat', $id_pangkat);
		$query = $this->db->delete('master_pangkat');

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
				'return_mesage' => 'Berhasil menghapus data Pangkat',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file master_pangkat_model.php */
/* Location: ./application/modules/master/models/master_pangkat_model.php */