<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('pegawai_model');
		$this->load->helper(
			array( 'url', 'url_helper' )
		);
		$this->load->library(
			array( 'pagination', 'session', 'Pdf' )
		);

		if( $this->session->id_level != 1 ) {
			redirect('peminjaman');
		}
  }

	public function index()
	{
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->pegawai_model->countData();

		$config['base_url'] = base_url() . 'pegawai/index/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['pegawai'] = $this->pegawai_model->all($config['per_page'], $uri_segment);

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['pegawai'] = $this->pegawai_model->findByKeyword($keyword);
		}

		$this->load->view('layout/header');
		$this->load->view('pegawai/index', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$this->load->view('layout/header');
		$this->load->view('pegawai/create');
		$this->load->view('layout/footer');
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

		$this->load->view('layout/header');
		$this->load->view('pegawai/edit', $data);
		$this->load->view('layout/footer');
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

	public function exportPdf()
	{
		$data['pegawai'] = $this->pegawai_model->allWithOutPagging();
    $this->load->view('cetak/pegawai', $data);
	}

}
