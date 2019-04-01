<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('peminjaman_model', 'pegawai_model', 'inventaris_model')
		);
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

	public function index()
	{
		$data['peminjaman'] = $this->peminjaman_model->hasPeminjaman();

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['peminjaman'] = $this->peminjaman_model->findByKeyword($keyword);
		}

		$this->load->view('peminjaman/index', $data);
	}

	public function create()
	{
		$data['pegawai'] = $this->pegawai_model->all();

		$this->load->view('peminjaman/create', $data);
	}

	public function store()
	{
		$this->peminjaman_model->create();
		$this->session->set_flashdata('msg', 'Berhasil Membuat Inventaris!');

		redirect('/peminjaman');
	}

	public function edit($id)
	{
		$data['pegawai'] = $this->pegawai_model->all();
		$data['peminjaman'] = $this->peminjaman_model->find($id);

		$this->load->view('peminjaman/edit', $data);
	}

	public function update($id)
	{
		$this->peminjaman_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Inventaris!');

		redirect('/peminjaman');
	}

	public function delete($id)
	{
		$this->peminjaman_model->destroy($id);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Inventaris!');

		redirect('/peminjaman');
	}

}
