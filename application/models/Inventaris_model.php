<?php
class Inventaris_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "inventaris";

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
    $query = $this->db->get_where(self::TABLE_NAME, array('id_inventaris' => $id));
    return $query->row_array();
  }

  public function findByKeyword($keyword)
  {
    $this->db->like('nama', $keyword, 'both');
    $query = $this->db->get(self::TABLE_NAME);

    return $query->result_array();
  }

  public function create()
  {
    $petugasInventaris = $this->input->post('petugasInventaris');
    $jenisInventaris = $this->input->post('jenisInventaris');
    $ruangInventaris = $this->input->post('ruangInventaris');
    $namaInventaris = $this->input->post('namaInventaris');
    $kondisiInventaris = $this->input->post('kondisiInventaris');
    $keteranganInventaris = $this->input->post('keteranganInventaris');
    $jumlahInventaris = $this->input->post('jumlahInventaris');
    $kodeInventaris = substr(md5(mt_rand()), 0, 5);
    $tanggalRegister = date('Y-m-d H:i:s');

    $data = array(
      'nama' => ucwords( $namaInventaris ),
      'kondisi' => $kondisiInventaris,
      'keterangan' => $keteranganInventaris,
      'jumlah' => $jumlahInventaris,
      'kode_inventaris' => strtoupper( $kodeInventaris ),
      'tanggal_register' => $tanggalRegister,
      'id_petugas' => $petugasInventaris,
      'id_jenis' => $jenisInventaris,
      'id_ruang' => $ruangInventaris,
    );

    return $this->db->insert(self::TABLE_NAME, $data);
  }

  public function update($id)
  {
    $petugasInventaris = $this->input->post('petugasInventaris');
    $jenisInventaris = $this->input->post('jenisInventaris');
    $ruangInventaris = $this->input->post('ruangInventaris');
    $namaInventaris = $this->input->post('namaInventaris');
    $kondisiInventaris = $this->input->post('kondisiInventaris');
    $keteranganInventaris = $this->input->post('keteranganInventaris');
    $jumlahInventaris = $this->input->post('jumlahInventaris');
    $tanggalRegister = date('Y-m-d H:i:s');

    $data = array(
      'nama' => ucwords( $namaInventaris ),
      'kondisi' => $kondisiInventaris,
      'keterangan' => $keteranganInventaris,
      'jumlah' => $jumlahInventaris,
      'tanggal_register' => $tanggalRegister,
      'id_petugas' => $petugasInventaris,
      'id_jenis' => $jenisInventaris,
      'id_ruang' => $ruangInventaris,
    );

    $this->db->where('id_inventaris', $id);
    return $this->db->update(self::TABLE_NAME, $data);
  }

  public function destroy($id)
  {
    $this->db->where('id_inventaris', $id);
    return $this->db->delete(self::TABLE_NAME);
  }

}
