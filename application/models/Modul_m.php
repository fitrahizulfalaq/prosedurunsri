<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modul_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_modul');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_modul($limit, $start) 
	{		
		$this->db->order_by('created','DESC');
		$query = $this->db->get('tb_modul',$limit, $start);
		return $query;
	}	

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error','Ojo Main refresh ae bat...');
			redirect('modul/tambah');
		}

	  $params['id'] =  "";
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['file'] =  $post['file'];
	  $params['foto'] =  $post['foto'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];

	  $this->db->insert('tb_modul',$params);	  	 		  	 		   			
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['file'] =  $post['file'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];
	  
	  if ($post['foto'] != null) {
  	  	$params['foto'] =  $post['foto'];
  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_modul',$params);	  	 		  	 		   			
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_modul');

	}



}
