<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_bimbingan');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getSiswa($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->where('tipe_user','1');
		$query = $this->db->get();
		return $query;
	}

	public function get_mentoring_user($id = null)
	{
		$this->db->from('tb_mentoring');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_mentoring_mentor($id = null)
	{
		$this->db->from('tb_mentoring');
		if ($id != null) {
			$this->db->where('mentor_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpanBimbingan($post)
	{
		$params['id'] =  "";
		$params['user_id'] =  $post['user_id'];
		$params['mentor_id'] =  "2";
		$params['deskripsi'] =  $post['deskripsi'];
		$params['file'] =  $post['file'];
		$params['created'] = date("Y:m:d:h:i:sa");
		$params['reply'] = $this->session->id;
		$this->db->insert('tb_bimbingan', $params);
	}

	function hapus($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tb_bimbingan');
	}
}
