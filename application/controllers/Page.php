<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function petunjuk()
	{
		$data['menu'] = "Petunjuk Penggunaan";
		$this->templateadmin->load('template/dashboard', 'page/petunjuk', $data);
	}

	public function profil_pembimbing()
	{
		$data['menu'] = "Profil Pembimbing";
		$this->templateadmin->load('template/dashboard', 'page/profil_pembimbing', $data);
	}

	public function profil_peneliti()
	{
		$data['menu'] = "Profil Peneliti";
		$this->templateadmin->load('template/dashboard', 'page/profil_peneliti', $data);
	}

	public function menu($id = null)
	{
		$data['menu'] = "Profil Peneliti";
		$id = $this->uri->segment("3");
		$this->templateadmin->load('template/dashboard', 'page/menu/'.$id, $data);
	}
}
