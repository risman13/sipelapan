<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_warganegara_model extends CI_Model {

	public function select_master_warganegara()
	{
		$query = $this->db->get('master_warganegara');

		return $query->result();
	}

	public function insert_master_warganegara($nama_warganegara)
	{
		$object = array(
			'nama_warganegara' => $nama_warganegara, 
		);

		$this->db->where('nama_warganegara', $nama_warganegara);
		$cek = $this->db->get('master_warganegara');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Warga Negara" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_warganegara', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Warga Negara Berhasil Ditambah',
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

	public function update_master_warganegara($nama_warganegara, $id_warganegara)
	{
		$object = array(
			'nama_warganegara' => $nama_warganegara, 
		);

		$this->db->where('nama_warganegara', $nama_warganegara);
		$this->db->where('id_warganegara <>', $id_warganegara);
		$cek = $this->db->get('master_warganegara');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Warga Negara" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_warganegara', $id_warganegara);
				$query = $this->db->update('master_warganegara', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Warga Negara Berhasil Diubah',
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

	public function delete_master_warganegara($id_warganegara)
	{
		try 
		{
			$this->db->where('id_warganegara', $id_warganegara);
			$query = $this->db->delete('master_warganegara');

			if (!$query) 
			{
				throw new Exception($this->db->_error_message());
			}

			$returnData = array(
				'status' => TRUE,
				'return_title' => 'Berhasil',
				'return_mesage' => 'Berhasil menghapus data warga negara',
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

/* End of file Master_warganegara_model.php */
/* Location: ./application/modules/master/models/Master_warganegara_model.php */