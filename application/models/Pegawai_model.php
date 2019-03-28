<?php
class Pegawai_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "pegawai";

  public function __construct()
  {
    $this->load->database();
  }

  public function all()
  {
    $query = $this->db->get(self::TABLE_NAME);
    return $query->result_array();
  }

  public function find($id)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('id_pegawai' => $id));
    return $query->row_array();
  }

  public function findByNIP($nip)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('nip' => $nip));
    return $query->row_array();
  }

  public function create()
  {
    $nipPegawai = $this->input->post('nipPegawai');
    $namaPegawai = $this->input->post('namaPegawai');
    $alamatPegawai = $this->input->post('alamatPegawai');

    $checkData = $this->findByNIP( $nipPegawai );
    if( count( $checkData ) > 0 ) {
      $this->session->set_flashdata('msg', 'Gagal! NIP yang dimasukkan sudah tersedia!');

      redirect('/pegawai');
    }

    $data = array(
      'nip' => $nipPegawai,
      'nama_pegawai' => $namaPegawai,
      'alamat' => $alamatPegawai
    );

    return $this->db->insert(self::TABLE_NAME, $data);
  }

  public function update($id)
  {
    $nipPegawai = $this->input->post('nipPegawai');
    $nipPegawaiLama = $this->input->post('nipPegawaiLama');
    $namaPegawai = $this->input->post('namaPegawai');
    $alamatPegawai = $this->input->post('alamatPegawai');

    if( $nipPegawai != $nipPegawaiLama ) {
      $checkData = $this->findByNIP( $nipPegawai );
      if( count( $checkData ) > 0 ) {
        $this->session->set_flashdata('msg', 'Gagal! NIP yang dimasukkan sudah tersedia!');

        redirect('/pegawai');
      }
    }

    $data = array(
      'nip' => $nipPegawai,
      'nama_pegawai' => $namaPegawai,
      'alamat' => $alamatPegawai
    );

    $this->db->where('id_pegawai', $id);
    return $this->db->update(self::TABLE_NAME, $data);
  }

  public function destroy($id)
  {
    $this->db->where('id_pegawai', $id);
    return $this->db->delete(self::TABLE_NAME);
  }

}
