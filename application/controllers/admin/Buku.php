<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends Backend {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['title']	= 'Buku';
		$data['page']	= 'buku/index';
		$data['content'] = '';

		$this->set($data);
		$this->view($data);
	}

	public function create()
	{
		$data['title']	= 'Buku';
		$data['page']	= 'buku/create';
		$data['content'] = '';

		$this->set($data);
		$this->view($data);
	}

	public function update()
	{
		echo "create";
	}

	public function delete()
	{
		echo "create";
	}


}

/* End of file Buku.php */
/* Location: ./application/controllers/admin/Buku.php */