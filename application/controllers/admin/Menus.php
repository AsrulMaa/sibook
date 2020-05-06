<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_access');
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
      
		
	
		$data['title']	= 'Dashboard';
		$data['input']	= '';
		$data['page']	= 'dashboard';
		
		$this->view($data);
	}

	public function create()
	{
		
		$data['title']	= 'Tambah : Menu';
		$data['input']	= '';
		$data['page']	= 'menu/add_menu';
		
		$this->view($data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */