<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array('inventaris_model', 'detail_model')
		);
    $this->load->helper('url_helper');
    $this->load->library('session');
  }

	public function index()
	{
		$i = 0;
		$dataDetail = [];
		$detailPeminjaman = $this->detail_model->all();

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

		$data['i'] = $i + 1;
		$data['peminjaman'] = $dataDetail;

		$this->load->view('detail/index', $data);
	}

	public function create($id)
	{
		$data['id_peminjaman'] = $id;
		$data['inventaris'] = $this->inventaris_model->all();

		$this->load->view('detail/create', $data);
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
