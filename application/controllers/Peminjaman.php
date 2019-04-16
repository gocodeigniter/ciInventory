<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('peminjaman_model', 'pegawai_model', 'petugas_model', 'inventaris_model')
		);
		$this->load->helper(
			array( 'url', 'url_helper' )
		);
    $this->load->library(
			array( 'pagination', 'session', 'Pdf' )
		);

		if( empty( $this->session->id_petugas ) ) {
			redirect('login');
		}
  }

	public function index()
	{
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->peminjaman_model->countData();

		$config['base_url'] = base_url() . 'peminjaman/index/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		if( $this->session->id_level == 1 && $this->session->id_level == 2 ) {
			$data['peminjaman'] = $this->peminjaman_model->all($config['per_page'], $uri_segment);
		} else {
			$data['peminjaman'] = $this->peminjaman_model->findAll( $this->session->id_petugas );
		}

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['peminjaman'] = $this->peminjaman_model->findByKeyword($keyword);
		}

		$this->load->view('layout/header');
		$this->load->view('peminjaman/index', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$data['petugas'] = $this->petugas_model->findByLevelPeminjam();

		$this->load->view('layout/header');
		$this->load->view('peminjaman/create', $data);
		$this->load->view('layout/footer');
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

		$this->load->view('layout/header');
		$this->load->view('peminjaman/edit', $data);
		$this->load->view('layout/footer');
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

	public function exportPdf()
	{
		$data['peminjaman'] = $this->peminjaman_model->allWithOutPagging();
    $this->load->view('cetak/peminjaman', $data);
	}

}
