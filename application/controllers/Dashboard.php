<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function haldepan()
	{
		$data['menu'] = "Dashboard Prounsri apps";		
		$this->templateadmin->load('template/kosong','page/haldepan',$data);
	}

	public function index()
	{
		$data['menu'] = "Menu Beranda";		
		$this->templateadmin->load('template/dashboard','page/beranda',$data);
	}
}
