<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_m extends CI_Model
{

	//Kode akses
	public function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->where('tipe_user','1');
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['username'] =  $post['username'];
		$params['nama'] =  $post['nama'];
		$params['kode'] =  random_string('alnum',6);
		$params['password'] =  sha1($params['kode']);
		$params['created'] =  date("Y:m:d:h:i:sa");
		$params['tipe_user'] =  "1";
		$this->db->insert('tb_user', $params);	  
	}

	function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
	}

	function update($post)
	{

		$params['id'] =  $post['id'];
		$params['nama'] =  $post['nama'];


		$this->db->where('id', $params['id']);
		$this->db->update('tb_user', $params);
	}
}
