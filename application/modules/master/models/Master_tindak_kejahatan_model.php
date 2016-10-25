<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_tindak_kejahatan_model extends CI_Model {

	public function select_master_tindak_kejahatan()
	{
		$query = $this->db->get('master_tindak_kejahatan');

		return $query->result();
	}

	public function insert_master_tindak_kejahatan($nama_tindak_kejahatan)
	{
		$object = array(
			'nama_tindak_kejahatan' => $nama_tindak_kejahatan, 
		);

		$this->db->where('nama_tindak_kejahatan', $nama_tindak_kejahatan);
		$cek = $this->db->get('master_tindak_kejahatan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Tindak Kejahatan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_tindak_kejahatan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Tindak Kejahatan Berhasil Ditambah',
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

	public function update_master_tindak_kejahatan($nama_tindak_kejahatan, $id_tindak_kejahatan)
	{
		$object = array(
			'nama_tindak_kejahatan' => $nama_tindak_kejahatan, 
		);

		$this->db->where('nama_tindak_kejahatan', $nama_tindak_kejahatan);
		$this->db->where('id_tindak_kejahatan <>', $id_tindak_kejahatan);
		$cek = $this->db->get('master_tindak_kejahatan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Tindak Kejahatan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_tindak_kejahatan', $id_tindak_kejahatan);
				$query = $this->db->update('master_tindak_kejahatan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Tindak Kejahatan Berhasil Diubah',
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

	public function delete_master_tindak_kejahatan($id_tindak_kejahatan)
	{
		$this->db->where('id_tindak_kejahatan', $id_tindak_kejahatan);
		$query = $this->db->delete('master_tindak_kejahatan');

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
				'return_mesage' => 'Berhasil menghapus data Tindak Kejahatan',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file master_tindak_kejahatan_model.php */
/* Location: ./application/modules/master/models/master_tindak_kejahatan_model.php */