<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_tugas');
		if ($id != null) {
			$this->db->where('user_id', $id);
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

	public function getTugas($id = null)
	{
		$this->db->from('tb_tugas');
		if ($id != null) {
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}	

	public function cekDraft($id = null)
	{
		$this->db->from('tb_tugas');
		if ($id != null) {
			$this->db->where('draft', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function simpantugas($post)
	{
		$params['id'] =  "";
		$params['user_id'] =  $this->session->id;
		$params['draft'] =  $post['draft'];
		$params['revisi'] =  $post['revisi'];
		$params['teks'] =  $post['teks'];
		$params['tugasakhir'] =  $post['tugasakhir'];
		$params['created'] = date("Y:m:d:h:i:sa");
		$this->db->insert('tb_tugas', $params);
	}

	function updatedraft($post)
	{
		$params['draft'] =  $post['draft'];
		$this->db->where('user_id', $this->session->id);
		$this->db->update('tb_tugas', $params);
	}

	function updaterevisi($post)
	{
		$params['revisi'] =  $post['revisi'];
		$this->db->where('user_id', $this->session->id);
		$this->db->update('tb_tugas', $params);
	}

	function updateteks($post)
	{
		$params['teks'] =  $post['teks'];
		$this->db->where('user_id', $this->session->id);
		$this->db->update('tb_tugas', $params);
	}

	function updatetugasakhir($post)
	{
		$params['tugasakhir'] =  $post['tugasakhir'];
		$this->db->where('user_id', $this->session->id);
		$this->db->update('tb_tugas', $params);
	}
}
