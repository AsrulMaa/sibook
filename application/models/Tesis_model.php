<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tesis_model extends MY_Model {

	protected $perPage = 5;
	protected $primary_key = 'id';
	protected $table = 'tesis';


	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDefaultValues()
	{
		return [
			'id'		=> '',
			'username'	=> '',
			'email'	=> '',
			'password'	=> '',
			'password'	=> '',
			'fullname'	=> '',
			'id_role'	=> '',
			'is_active'	=> '',
			'avatar'	=> '',
			'token'	=> '',
			'created_at'	=> '',
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'judul',
				'label' => 'Judul Penelitian',
				'rules' => 'trim|required',
				'errors'=> array('required' => '%s Tidak boleh kosong')
			],
			[
				'field' => 'nama_penulis',
				'label' => 'Nama penulis',
				'rules' => 'trim|required',
				'errors'=> array('required' => '%s Tidak boleh kosong')
			],
			[
				'field' => 'pembimbing_satu',
				'label' => 'Nama Pembimbing Satu',
				'rules' => 'required',
				'errors'=> array('required' => '%s Tidak boleh kosong')

			],
			[
				'field' => 'pembimbing_dua',
				'label' => 'Nama Pembimbing dua',
				'rules' => 'required',
				'errors'=> array('required' => '%s Tidak boleh kosong')

			],
		];
		return $validationRules;
		
	}

	public function run($data, $action = 'input')
	{
		if ($action == 'input') {
			

			$save_data = [
				'judul' 				=> $data->judul,
				'nama'					=> $data->nama_penulis,
				'pembimbing_satu'		=> $data->pembimbing_satu,
				'pembimbing_dua'		=> $data->pembimbing_dua,
				'tahun'					=> $data->tahun,
				'jumlah_tesis'			=> $data->jumlah,
			];

			
			return $this->create($save_data);
		} else {
		
			$save_data = [
				'judul' 				=> $data->judul,
				'nama'					=> $data->nama_penulis,
				'pembimbing_satu'		=> $data->pembimbing_satu,
				'pembimbing_dua'		=> $data->pembimbing_dua,
				'tahun'					=> $data->tahun,
				'jumlah_tesis'			=> $data->jumlah,
			];

			return $this->where('id', $data->id)->update($save_data);
		}
	}

	// public function run()
	// {
	// 	$user_avatar_uuid = $this->input->post('user_avatar_uuid');
	// 	$user_avatar_name = $this->input->post('user_avatar_name');

	// 	$save_data = [
	// 		'fullname' 	=> $this->input->post('fullname'),
	// 		'avatar' 		=> 'default.png',
	// 		'created_at'	=> date('Y-m-d H:i:s'),
	// 		'username'	=> $this->input->post('username', TRUE),
	// 		'email'		=> strtolower($this->input->post('email', TRUE)),
	// 		'password'	=> hashEncrypt($this->input->post('password', TRUE)),
	// 		'id_role'	=> $this->input->post('role', TRUE),
	// 		'is_active'	=> 1,
	// 		'token'		=> '',
	// 	];

	// 	if (!empty($user_avatar_name)) {

	// 		$user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;

	// 		if (!is_dir(FCPATH . '/uploads/user')) {
	// 			mkdir(FCPATH . '/uploads/user');
	// 		}

	// 		@rename(FCPATH . 'uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 
	// 				FCPATH . 'uploads/user/' . $user_avatar_name_copy);

	// 		$save_data['avatar'] = $user_avatar_name_copy;
	// 	}

	// 	return $this->create($save_data);

	// }

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */