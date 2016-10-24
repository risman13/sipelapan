<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_satuan_model extends CI_Model {

	public function select_master_satuan()
	{
		$this->db->select('
			A.nama_grup_wilayah,
			B.id_grup_wilayah,
			B.nama_polres,
			C.id_satuan,
			C.id_polres,
			C.nama_satuan
		');
		$this->db->from('master_grup_wilayah AS A');
		$this->db->join('master_polres AS B', 'A.id_grup_wilayah = B.id_grup_wilayah', 'inner');
		$this->db->join('master_satuan AS C', 'B.id_polres = C.id_polres', 'inner');
		$query = $this->db->get('');

		return $query->result();
	}

	public function insert_master_satuan($nama_satuan, $id_polres)
	{
		$object = array(
			'id_polres' => $id_polres, 
			'nama_satuan' => $nama_satuan, 
		);

		$this->db->where('nama_satuan', $nama_satuan);
		$cek = $this->db->get('master_satuan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama satuan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$query = $this->db->insert('master_satuan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data satuan Berhasil Ditambah',
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

	public function update_master_satuan($nama_satuan, $id_satuan, $id_polres)
	{
		$object = array(
			'id_polres' => $id_polres, 
			'nama_satuan' => $nama_satuan, 
		);

		$this->db->where('nama_satuan', $nama_satuan);
		$this->db->where('id_satuan <>', $id_satuan);
		$cek = $this->db->get('master_satuan');

		if ($cek->num_rows() > 0) 
		{
			$returnData = array(
				'status' => FALSE,
				'return_title' => 'Gagal Simpan!',
				'return_mesage' => 'Sudah ada data "Nama satuan" yang sama persis dengan yang anda input',
				'return_color' => 'danger'
			);
		}
		else
		{
			try 
			{
				$this->db->where('id_satuan', $id_satuan);
				$query = $this->db->update('master_satuan', $object);
				
				if (!$query) 
				{
					throw new Exception($this->db->_error_message());				
				}

				$returnData = array(
					'status' => TRUE,
					'return_title' => 'Berhasil',
					'return_mesage' => 'Data satuan Berhasil Diubah',
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

	public function delete_master_satuan($id_satuan)
	{
		$this->db->where('id_satuan', $id_satuan);
		$query = $this->db->delete('master_satuan');

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
				'return_mesage' => 'Berhasil menghapus data satuan',
				'return_color' => 'success',
				'return_status' => 'success'
			);
		}

		return $returnData;
	}

	public function select_master_satuan_by($id_polres)
	{
		$this->db->select('
			A.nama_grup_wilayah,
			B.id_grup_wilayah,
			B.nama_polres,
			C.id_satuan,
			C.id_polres,
			C.nama_satuan
		');
		$this->db->from('master_grup_wilayah AS A');
		$this->db->join('master_polres AS B', 'A.id_grup_wilayah = B.id_grup_wilayah', 'inner');
		$this->db->join('master_satuan AS C', 'B.id_polres = C.id_polres', 'inner');
		$this->db->where('B.id_polres', $id_polres);
		$query = $this->db->get('');

		return $query->result();
	}

}

/* End of file Master_satuan_model.php */
/* Location: ./application/modules/master/models/Master_satuan_model.php */