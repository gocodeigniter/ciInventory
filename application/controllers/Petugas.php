<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array( 'petugas_model', 'level_model' )
		);
    $this->load->helper(
			array( 'url', 'url_helper' )
		);
    $this->load->library(
			array( 'pagination', 'session' )
		);
  }

	public function index()
	{
		// Declarations
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->petugas_model->countData();

		$config['base_url'] = base_url() . 'petugas/index/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['petugas'] = $this->petugas_model->all($config['per_page'], $uri_segment);

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$data['petugas'] = $this->petugas_model->findByKeyword($keyword);
		}

		$this->load->view('layout/header');
		$this->load->view('petugas/index', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$data['level'] = $this->level_model->all();

		$this->load->view('layout/header');
		$this->load->view('petugas/create', $data);
		$this->load->view('layout/footer');
	}

	public function store()
	{
		$this->petugas_model->create();
		$this->session->set_flashdata('msg', 'Berhasil Membuat Petugas!');

		redirect('/petugas');
	}

	public function edit($id)
	{
		$data['level'] = $this->level_model->all();
		$data['petugas'] = $this->petugas_model->find($id);

		$this->load->view('layout/header');
		$this->load->view('petugas/edit', $data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$this->petugas_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Petugas!');

		redirect('/petugas');
	}

	public function delete($id)
	{
		$this->petugas_model->destroy($id);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Petugas!');

		redirect('/petugas');
	}

}
