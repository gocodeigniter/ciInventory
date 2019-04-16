<?php
class Petugas_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "petugas";

  public function __construct()
  {
    $this->load->database();
  }

  public function allWithOutPagging()
  {
    $this->db->select('petugas.*, level.nama_level');
    $this->db->from('petugas');
    $this->db->join('level', 'petugas.id_level = level.id_level');

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function all($number = NULL, $offset = NULL)
  {
    $this->db->select('petugas.*, level.nama_level');
    $this->db->from('petugas');
    $this->db->join('level', 'petugas.id_level = level.id_level');
    $this->db->limit($number, $offset);

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function find($id)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('id_petugas' => $id));
    return $query->row_array();
  }

  public function findByUsername($username)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('username' => $username));
    return $query->row_array();
  }

  public function findByKeyword($keyword)
  {
    $this->db->select('petugas.*, level.nama_level');
    $this->db->from('petugas');
    $this->db->join('level', 'petugas.id_level = level.id_level');

    $this->db->like('nama_petugas', $keyword, 'both');
    $this->db->or_like('username', $keyword, 'both');

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function findByLevelPeminjam()
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('id_level' => '3'));
    return $query->result_array();
  }

  public function countData()
  {
    return count( $this->all() );
  }

  public function create()
  {
    $namaPetugas = $this->input->post('namaPetugas');
    $usernamePetugas = $this->input->post('usernamePetugas');
    $passwordPetugas = $this->input->post('passwordPetugas');
    $confPasswordPetugas = $this->input->post('confPasswordPetugas');
    $levelPetugas = $this->input->post('levelPetugas');

    $checkData = $this->findByUsername( $usernamePetugas );
    if( count( $checkData ) > 0 ) {
      $this->session->set_flashdata('msg', 'Gagal! Username yang dimasukkan sudah tersedia!');

      redirect('/petugas');
    }

    if( $passwordPetugas != $confPasswordPetugas ) {
      $this->session->set_flashdata('msg', 'Gagal! Konfirmasi password yang dimasukkan tidak sesuai!');

      redirect('/petugas/create');
    }

    $data = array(
      'nama_petugas' => ucwords( $namaPetugas ),
      'username' => strtolower( $usernamePetugas ),
      'password' => password_hash($passwordPetugas, PASSWORD_BCRYPT),
      'id_level' => $levelPetugas
    );

    return $this->db->insert(self::TABLE_NAME, $data);
  }

  public function update($id)
  {
    $namaPetugas = $this->input->post('namaPetugas');
    $usernamePetugas = $this->input->post('usernamePetugas');
    $usernamePetugasLama = $this->input->post('usernamePetugasLama');
    $ubahPasswordPetugas = $this->input->post('ubahPasswordPetugas');
    $passwordPetugas = $this->input->post('passwordPetugas');
    $passwordPetugasLama = $this->input->post('passwordPetugasLama');
    $confPasswordPetugas = $this->input->post('confPasswordPetugas');
    $levelPetugas = $this->input->post('levelPetugas');

    $petugas = $this->findByUsername( $usernamePetugasLama );
    if( $ubahPasswordPetugas == "on" ) {
      if( password_verify($passwordPetugasLama, $petugas['password']) ) {
        if( $passwordPetugas != $confPasswordPetugas ) {
          $this->session->set_flashdata('msg', 'Gagal! Konfirmasi password yang dimasukkan tidak sesuai!');

          redirect('/petugas');
        }
      } else {
        $this->session->set_flashdata('msg', 'Gagal! Password lama yang dimasukkan salah!');

        redirect('/petugas');
      }
    }

    if( $usernamePetugas != $usernamePetugasLama ) {
      $checkData = $this->findByUsername( $usernamePetugas );
      if( count( $checkData ) > 0 ) {
        $this->session->set_flashdata('msg', 'Gagal! Username yang dimasukkan sudah tersedia!');

        redirect('/petugas');
      }
    }

    $data = array(
      'nama_petugas' => ucwords( $namaPetugas ),
      'username' => strtolower( $usernamePetugas ),
      'password' => password_hash($passwordPetugas, PASSWORD_BCRYPT),
      'id_level' => $levelPetugas
    );

    $this->db->where('id_petugas', $id);
    return $this->db->update(self::TABLE_NAME, $data);
  }

  public function destroy($id)
  {
    $this->db->where('id_petugas', $id);
    return $this->db->delete(self::TABLE_NAME);
  }

}
