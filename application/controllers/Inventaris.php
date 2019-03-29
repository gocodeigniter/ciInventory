<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('inventaris_model', 'petugas_model', 'ruang_model', 'jenis_model')
		);
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

	public function index()
	{
		$data['inventaris'] = $this->inventaris_model->all();

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['inventaris'] = $this->inventaris_model->findByKeyword($keyword);
		}

		$this->load->view('inventaris/index', $data);
	}

	public function create()
	{
		$data['petugas'] = $this->petugas_model->all();
		$data['jenis'] = $this->jenis_model->all();
		$data['ruang'] = $this->ruang_model->all();

		$this->load->view('inventaris/create', $data);
	}

	public function store()
	{
		$this->inventaris_model->create();
		$this->session->set_flashdata('msg', 'Berhasil Membuat Inventaris!');

		redirect('/inventaris');
	}

	public function edit($id)
	{
		$data['petugas'] = $this->petugas_model->all();
		$data['jenis'] = $this->jenis_model->all();
		$data['ruang'] = $this->ruang_model->all();
		$data['inventaris'] = $this->inventaris_model->find($id);

		$this->load->view('inventaris/edit', $data);
	}

	public function update($id)
	{
		$this->inventaris_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Inventaris!');

		redirect('/inventaris');
	}

	public function delete($id)
	{
		$this->inventaris_model->destroy($id);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Inventaris!');

		redirect('/inventaris');
	}

}
