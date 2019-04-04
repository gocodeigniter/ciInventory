<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('inventaris_model', 'detail_model')
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
		$uri_segment = $this->uri->segment(3);
		$num_rows = $this->detail_model->countData();

		$config['base_url'] = base_url() . 'detail/index/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$dataDetail = [];
		$detailPeminjaman = $this->detail_model->all($config['per_page'], $uri_segment);

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$detailPeminjaman = $this->detail_model->findByKeyword($keyword);
		}

		// Add Data Peminjaman into Array
		foreach( $detailPeminjaman as $key => $row ) {
			$data = array(
				'id_peminjaman' => $row['id_peminjaman'],
				'id_pegawai' => $row['id_pegawai'],
				'nama_pegawai' => $row['nama_pegawai'],
				'tanggal_pinjam' => $row['tanggal_pinjam'],
				'tanggal_kembali' => $row['tanggal_kembali'],
				'status_peminjaman' => $row['status_peminjaman'],
				'detail' => array()
			);

			// Remove Duplicates Data in Array
			if( !in_array( $data, $dataDetail) ) {
				$dataDetail[ $key ] = $data;
			}
		}

		// Reindex Array
		$dataDetail = array_values( $dataDetail );

		foreach( $detailPeminjaman as $row ) {
			$detail = array(
				'kode_inventaris' => $row['kode_inventaris'],
				'nama' => $row['nama'],
				'jumlah' => $row['jumlah'],
			);

			// Added Detail Data with Same Id
			for( $x = 0; $x < count( $dataDetail ); $x++ ) {
				if( $dataDetail[ $x ]['id_peminjaman'] == $row['id_peminjaman'] ) {
					array_push( $dataDetail[ $x ]['detail'], $detail);
				}
			}
		}

		$data['peminjaman'] = $dataDetail;

		$this->load->view('layout/header');
		$this->load->view('detail/index', $data);
		$this->load->view('layout/footer');
	}

	public function create($id)
	{
		$data['id_peminjaman'] = $id;
		$data['inventaris'] = $this->inventaris_model->all();

		$this->load->view('layout/header');
		$this->load->view('detail/create', $data);
		$this->load->view('layout/footer');
	}

	public function store($id)
	{
		$this->detail_model->create($id);
		$this->session->set_flashdata('msg', 'Barang Yang Dipilih Berhasil Dipinjam!');

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

}
