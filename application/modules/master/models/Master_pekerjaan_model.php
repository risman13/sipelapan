<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pekerjaan_model extends CI_Model {

	public function select_master_pekerjaan()
	{
		$query = $this->db->get('master_pekerjaan');

		return $query->result();
	}

	public function insert_master_pekerjaan($nama_pekerjaan)
	{
		$object = array(
			'nama_pekerjaan' => $nama_pekerjaan, 
		);

		$this->db->where('nama_pekerjaan', $nama_pekerjaan);
		$cek = $this->db->get('master_pekerjaan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Pekerjaan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_pekerjaan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pekerjaan Berhasil Ditambah',
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

	public function update_master_pekerjaan($nama_pekerjaan, $id_pekerjaan)
	{
		$object = array(
			'nama_pekerjaan' => $nama_pekerjaan, 
		);

		$this->db->where('nama_pekerjaan', $nama_pekerjaan);
		$this->db->where('id_pekerjaan <>', $id_pekerjaan);
		$cek = $this->db->get('master_pekerjaan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Pekerjaan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_pekerjaan', $id_pekerjaan);
				$query = $this->db->update('master_pekerjaan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Pekerjaan Berhasil Diubah',
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

	public function delete_master_pekerjaan($id_pekerjaan)
	{
		$this->db->where('id_pekerjaan', $id_pekerjaan);
		$query = $this->db->delete('master_pekerjaan');

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
				'return_mesage' => 'Berhasil menghapus data pekerjaan',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file Master_pekerjaan_model.php */
/* Location: ./application/modules/master/models/Master_pekerjaan_model.php */