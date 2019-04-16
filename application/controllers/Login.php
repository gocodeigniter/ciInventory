<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model(
			array( 'petugas_model', 'level_model' )
		);
    $this->load->helper(
			array( 'form', 'url', 'url_helper' )
		);
    $this->load->library(
			array( 'session' )
		);
  }

	public function index()
	{
		if( isset( $this->session->id_petugas ) ) {
			redirect('petugas');
		}

		$this->load->view('layout/header');
		$this->load->view('login/index');
		$this->load->view('layout/footer');
	}

  public function store()
  {
		// Declarations
		$username = $this->input->post('usernamePetugas');
		$password = $this->input->post('passwordPetugas');

		// Get Data from Database
		$user = $this->petugas_model->findByUsername($username);

		// Check Isset Data User
		if( isset( $user ) ) {
			if( password_verify($password, $user['password']) ) {
				$this->session->set_userdata('id_petugas', $user['id_petugas']);
				$this->session->set_userdata('nama_petugas', $user['nama_petugas']);
				$this->session->set_userdata('username', $user['username']);
				$this->session->set_userdata('id_level', $user['id_level']);

				redirect('petugas/index');
			} else {
				$this->session->set_flashdata('error_msg', 'Kata Sandi Yang Anda Masukan Salah!');

				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Nama Pengguna Yang Anda Masukan Tidak Valid!');

			redirect('login');
		}
  }

	public function destroy()
	{
		// Unset Session
		session_destroy();

		// Redirect Page
		redirect('login');
	}

}
