<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

	public function index()
	{
		$data['pegawai'] = $this->users_model->all();

		$this->load->view('pegawai/index', $data);
	}

	public function create()
	{
		$this->load->view('pegawai/create');
	}

	public function store()
	{
		$this->users_model->create();
		$this->session->set_flashdata('msg', 'Berhasil Membuat Pegawai!');

		redirect('/user');
	}

	public function edit($id)
	{
		$data['pegawai'] = $this->users_model->find($id);

		$this->load->view('pegawai/edit', $data);
	}

	public function update($id)
	{
		$this->users_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Pegawai!');

		redirect('/user');
	}

	public function delete($id)
	{
		$this->users_model->destroy($id);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Pegawai!');

		redirect('/user');
	}

}
