<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_motif_kejahatan_model extends CI_Model {

	public function select_master_motif_kejahatan()
	{
		$query = $this->db->get('master_motif_kejahatan');

		return $query->result();
	}

	public function insert_master_motif_kejahatan($nama_motif_kejahatan)
	{
		$object = array(
			'nama_motif_kejahatan' => $nama_motif_kejahatan, 
		);

		$this->db->where('nama_motif_kejahatan', $nama_motif_kejahatan);
		$cek = $this->db->get('master_motif_kejahatan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Motif Kejahatan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_motif_kejahatan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Motif Kejahatan Berhasil Ditambah',
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

	public function update_master_motif_kejahatan($nama_motif_kejahatan, $id_motif_kejahatan)
	{
		$object = array(
			'nama_motif_kejahatan' => $nama_motif_kejahatan, 
		);

		$this->db->where('nama_motif_kejahatan', $nama_motif_kejahatan);
		$this->db->where('id_motif_kejahatan <>', $id_motif_kejahatan);
		$cek = $this->db->get('master_motif_kejahatan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama Motif Kejahatan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_motif_kejahatan', $id_motif_kejahatan);
				$query = $this->db->update('master_motif_kejahatan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data Motif Kejahatan Berhasil Diubah',
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

	public function delete_master_motif_kejahatan($id_motif_kejahatan)
	{
		$this->db->where('id_motif_kejahatan', $id_motif_kejahatan);
		$query = $this->db->delete('master_motif_kejahatan');

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
				'return_mesage' => 'Berhasil menghapus data Motif Kejahatan',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file master_motif_kejahatan_model.php */
/* Location: ./application/modules/master/models/master_motif_kejahatan_model.php */