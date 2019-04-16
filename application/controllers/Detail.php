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
			array( 'pagination', 'session', 'Pdf' )
		);

		if( empty( $this->session->id_petugas ) ) {
			redirect('login');
		}
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

		if( $this->session->id_level == 1 && $this->session->id_level == 2 ) {
			$detailPeminjaman = $this->detail_model->all($config['per_page'], $uri_segment);
		} else {
			$detailPeminjaman = $this->detail_model->findAll( $this->session->id_petugas );
		}

		$keyword = $this->input->get('keyword');
		if( $keyword != null ) {
			$detailPeminjaman = $this->detail_model->findByKeyword($keyword);
		}

		// Add Data Peminjaman into Array
		foreach( $detailPeminjaman as $key => $row ) {
			$data = array(
				'id_peminjaman' => $row['id_peminjaman'],
				'id_petugas' => $row['id_petugas'],
				'nama_petugas' => $row['nama_petugas'],
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
				'id_detail_pinjam' => $row['id_detail_pinjam'],
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
		$dataDetail = [];
		$modelInventaris = $this->inventaris_model->all();
		$modelDetailPinjam = $this->detail_model->findByIdPeminjaman($id);

		// Add Data Peminjaman into Array
		foreach( $modelInventaris as $key => $row ) {
			$data = array(
				'id_inventaris' => $row['id_inventaris'],
				'id_petugas' => $row['id_petugas'],
				'id_jenis' => $row['id_jenis'],
				'id_ruang' => $row['id_ruang'],
				'nama' => $row['nama'],
				'kondisi' => $row['kondisi'],
				'keterangan' => $row['keterangan'],
				'jumlah' => $row['jumlah'],
				'kode_inventaris' => $row['kode_inventaris'],
				'tanggal_register' => $row['tanggal_register'],
				'nama_petugas' => $row['nama_petugas'],
				'nama_jenis' => $row['nama_jenis'],
				'nama_ruang' => $row['nama_ruang'],
				'data_user' => array()
			);

			// Remove Duplicates Data in Array
			if( !in_array( $data, $dataDetail) ) {
				$dataDetail[ $key ] = $data;
			}
		}

		// Reindex Array
		$dataDetail = array_values( $dataDetail );

		foreach( $modelDetailPinjam as $row ) {
			$detail = array(
				'id_detail_pinjam' => $row['id_detail_pinjam'],
				'id_peminjaman' => $row['id_peminjaman'],
				'id_inventaris' => $row['id_inventaris'],
				'jumlah' => $row['jumlah']
			);

			// Added Detail Data with Same Id
			for( $x = 0; $x < count( $dataDetail ); $x++ ) {
				if( $dataDetail[ $x ]['id_inventaris'] == $row['id_inventaris'] ) {
					array_push( $dataDetail[ $x ]['data_user'], $detail );
				}
			}
		}

		$data['id_peminjaman'] = $id;
		$data['inventaris'] = $dataDetail;

		$this->load->view('layout/header');
		$this->load->view('detail/edit', $data);
		$this->load->view('layout/footer');
	}

	public function update($id)
	{
		$this->peminjaman_model->update($id);
		$this->session->set_flashdata('msg', 'Berhasil Mengubah Inventaris!');

		redirect('/peminjaman');
	}

	public function delete($id_peminjaman)
	{
		$this->detail_model->destroy($id_peminjaman);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Inventaris!');

		redirect('/detail');
	}

	public function delete_single($id_detail)
	{
		$this->detail_model->destroy_single($id_detail);
		$this->session->set_flashdata('msg', 'Berhasil Menghapus Inventaris!');

		redirect('/detail');
	}

	public function return($id_peminjaman)
	{
		$this->session->set_flashdata('msg', 'Telat Mengembalikan Barang!');

		if( $this->detail_model->return($id_peminjaman) ) {
			$this->session->set_flashdata('msg', 'Berhasil Mengembalikan Barang!');
		}

		redirect('/detail');
	}

	public function exportPdf()
	{
		$dataDetail = [];
		$detailPeminjaman = $this->detail_model->allWithOutPagging();

		// Add Data Peminjaman into Array
		foreach( $detailPeminjaman as $key => $row ) {
			$data = array(
				'id_peminjaman' => $row['id_peminjaman'],
				'id_petugas' => $row['id_petugas'],
				'nama_petugas' => $row['nama_petugas'],
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
				'id_detail_pinjam' => $row['id_detail_pinjam'],
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

		$data['detail'] = $dataDetail;

    $this->load->view('cetak/detail', $data);
	}

}
