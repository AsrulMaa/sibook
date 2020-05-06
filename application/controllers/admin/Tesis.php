<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tesis extends Backend {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index($page = null)
	{
		$data['title']	= 'Buku';
		$data['page']	= 'tesis/index';
		$data['content']	= $this->tesis->paginate($page)->orderBy('id', 'desc')->get();
		$data['total_rows']	= $this->tesis->count();
		$data['keterangan']	= 'Menampilkan 1 hingga '. count($data['content']). ' dari '. $data['total_rows']. ' data (difilter dari 1 entri)';
		$data['pagination']	= $this->tesis->makePagination(base_url('admin/tesis/'), 3, $data['total_rows']);

		
		$this->set($data);
		$this->view($data);
	}

	public function create()
	{
		$data['title']	= 'Buku';
		$data['page']	= 'tesis/form_tesis';
		$data['content'] = '';
		$data['id'] = set_value('');
		$data['judul'] = set_value('judul');
		$data['nama_penulis'] = set_value('');
		$data['tahun'] = set_value('');
		$data['pembimbing_satu'] = set_value('');
		$data['pembimbing_dua'] =set_value('');
		$data['jumlah'] = set_value('');
		$data['update']	= false;
		$data['action'] = 'admin/tesis/add_save';

		$this->set($data);
		$this->view($data);
	}

	public function add_save()
	{
		if (!$_POST) {
			$input = (object) $this->tesis->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if ($this->tesis->validate()) {
			
			$save_tesis = $this->tesis->run($input);
			if ($save_tesis) {
				if ($this->input->post('save_type') == 'stay') {
						$response['success'] = true;
						$response['message'] = 'Berhasil menyimpan data, klik link untuk mengedit tesis'.
							anchor('admin/tesis/edit/' . $save_tesis, ' Edit tesis'). ' atau klik'.
							anchor('admin/tesis', ' kemabali ke list'). ' untuk melihat seluruh data';
				} else {
					// set_message('Berhasil menyimoan data '.anchor('admin/tesis/edit/' . $save_tesis, 'Edit tesis'), 'success');
	        		$response['success'] = true;
					$response['redirect'] = site_url('admin/tesis');
				} 

			} else {
				$response['success'] = false;
				$response['message'] = 'gagal menyimpan data tesis';
			}
		}	else {
			$response['success'] = false;
			$response['message'] = validation_errors();
		}

		return $this->response($response);
	}


	public function edit($id)
	{
		$data['title']	= 'Buku';
		$r = $this->tesis->where('id', $id)->first();
		$data['id'] = $id;
		$data['judul'] = $r->judul;
		$data['nama_penulis'] = $r->nama;
		$data['tahun'] = $r->tahun;
		$data['pembimbing_satu'] = $r->pembimbing_satu;
		$data['pembimbing_dua'] = $r->pembimbing_dua;
		$data['jumlah'] = $r->jumlah_tesis;
		$data['page']	= 'tesis/form_tesis';
		$data['update']	= true;
		
		$data['action'] = 'admin/tesis/edit_save';

		$this->set($data);
		$this->view($data);
	}

	public function edit_save()
	{
		if (!$_POST) {
			$input = (object) $this->tesis->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}
		
		if ($this->tesis->validate()) {
			
			$save_user = $this->tesis->run($input,'update');
			if ($save_user) {
				if ($this->input->post('save_type') == 'stay') {
						$response['success'] = true;
						$response['message'] = 'Berhasil mengupdate data, klik link untuk mengedit tesis'.
							anchor('admin/tesis/edit/' . $save_user, ' Edit User'). ' atau klik'.
							anchor('admin/tesis', ' kemabali ke list'). ' untuk melihat seluruh data';
				} else {
					// set_message('Berhasil menyimpan data '.anchor('admin/tesis/edit/' . $save_user, 'Edit User'), 'success');
					$response['success'] = true;
					$response['redirect'] = site_url('admin/tesis/');
				} 

			} else {
				$response['success'] = false;
				$response['message'] = 'gagal menyimpan data tesis';
			}
		}	else {
			$response['success'] = false;
			$response['message'] = validation_errors();
		}

		return $this->response($response);
	}

	/**
	* delete Blog
	*
	* @var $id String
	*/
	public function delete()
	{


		$id = $this->input->post(null, true);
		$remove = false;
		if (is_array($id['delete_id'])) {
			foreach ($id['delete_id'] as $i) {
				$remove = $this->_remove($i);
				//$response['success'] = $id['delete_id'];
				if ($remove) {
					$response['success'] = true;
					$response['redirect'] = site_url('admin/tesis/index');
					set_message('Data tesis berhasil di hapus', 'success');
				} else {
					$response['success'] = false;
					$response['message'] = 'Maaf gagal menghapus data';
				}
			}
		} else {
			if (! $this->tesis->where('id', $id['delete_id'])->first()) {
				$response['success'] = false;
				$response['message'] = 'Maaf data tidak ditemukan';
			} else {
				$remove = $this->_remove($id['delete_id']);
				if ($remove) {
					$response['success'] = true;
					$response['redirect'] = site_url('admin/tesis/index');
					set_message('Data tesis berhasil di hapus', 'success');
				} else {
					$response['success'] = false;
					$response['message'] = 'Maaf gagal menghapus data';
				}
			}				
		}	
		
		
		return $this->response($response);
	}


	/**
	* delete tesis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$delete = $this->tesis->where('id', $id)->delete();
		if ($delete) {
			return true;
		}

		
	}
}

/* End of file Buku.php */
/* Location: ./application/controllers/admin/Buku.php */