<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_polres_model extends CI_Model {

	public function select_master_polres()
	{
		$this->db->select('
			A.nama_grup_wilayah,
			B.id_polres,
			B.id_grup_wilayah,
			B.nama_polres
		');
		$this->db->from('master_grup_wilayah AS A');
		$this->db->join('master_polres AS B', 'A.id_grup_wilayah = B.id_grup_wilayah', 'inner');
		$query = $this->db->get('');

		return $query->result();
	}

	public function insert_master_polres($nama_polres, $id_grup_wilayah)
	{
		$object = array(
			'id_grup_wilayah' => $id_grup_wilayah, 
			'nama_polres' => $nama_polres, 
		);

		$this->db->where('nama_polres', $nama_polres);
		$cek = $this->db->get('master_polres');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama POLRES" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_polres', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data POLRES Berhasil Ditambah',
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

	public function update_master_polres($nama_polres, $id_polres, $id_grup_wilayah)
	{
		$object = array(
			'id_grup_wilayah' => $id_grup_wilayah, 
			'nama_polres' => $nama_polres, 
		);

		$this->db->where('nama_polres', $nama_polres);
		$this->db->where('id_polres <>', $id_polres);
		$cek = $this->db->get('master_polres');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama POLRES" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_polres', $id_polres);
				$query = $this->db->update('master_polres', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data POLRES Berhasil Diubah',
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

	public function delete_master_polres($id_polres)
	{
		$this->db->where('id_polres', $id_polres);
		$query = $this->db->delete('master_polres');

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
				'return_mesage' => 'Berhasil menghapus data POLRES',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

}

/* End of file Master_polres_model.php */
/* Location: ./application/modules/master/models/Master_polres_model.php */