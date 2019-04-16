<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('inventaris_model', 'petugas_model', 'ruang_model', 'jenis_model')
		);
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
		$num_rows = $this->inventaris_model->countData();

		$config['base_url'] = base_url() . 'inventaris/index/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['inventaris'] = $this->inventaris_model->all($config['per_page'], $uri_segment);

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['inventaris'] = $this->inventaris_model->findByKeyword($keyword);
		}

		$this->load->view('layout/header');
		$this->load->view('inventaris/index', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$data['petugas'] = $this->petugas_model->all();
		$data['jenis'] = $this->jenis_model->all();
		$data['ruang'] = $this->ruang_model->all();

		$this->load->view('layout/header');
		$this->load->view('inventaris/create', $data);
		$this->load->view('layout/footer');
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

		$this->load->view('layout/header');
		$this->load->view('inventaris/edit', $data);
		$this->load->view('layout/footer');
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

	public function exportPdf()
	{
		$data['inventaris'] = $this->inventaris_model->allWithOutPagging();
    $this->load->view('cetak/inventaris', $data);
	}

}
