<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('pegawai_model');
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

	public function index()
	{
		$data['pegawai'] = $this->pegawai_model->all();

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['pegawai'] = $this->pegawai_model->findByKeyword($keyword);
		}

		$this->load->view('pegawai/index', $data);
	}

	public function create()
	{
		$this->load->view('pegawai/create');
	}

	public function store()
	{
		$this->pegawai_model->create();
		$this->session->set_flashdata('msg', 'Berhasil Membuat Pegawai!');

		redirect('/pegawai');
	}

	public function edit($id)
	{
		$data['pegawai'] = $this->pegawai_model->find($id);

		$this->load->view('pegawai/edit', $data);
	}

	public function update($id)
	{
		$this->pegawai_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Pegawai!');

		redirect('/pegawai');
	}

	public function delete($id)
	{
		$this->pegawai_model->destroy($id);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Pegawai!');

		redirect('/pegawai');
	}

}
