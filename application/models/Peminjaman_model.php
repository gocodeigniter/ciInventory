<?php
class Peminjaman_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "peminjaman";

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
    $query = $this->db->get_where(self::TABLE_NAME, array('id_peminjaman' => $id));
    return $query->row_array();
  }

  public function findByKeyword($keyword)
  {
    $this->db->like('nama', $keyword, 'both');
    $query = $this->db->get(self::TABLE_NAME);

    return $query->result_array();
  }

  public function hasPeminjaman()
  {
    // $this->db->where('users.username', $username);
    $this->db->select('pegawai.nama_pegawai, peminjaman.*');
    $this->db->from('peminjaman');
    $this->db->join('pegawai', 'pegawai.id_pegawai = peminjaman.id_pegawai');
    // $this->db->like('pegawai.title', $keyword, 'both');
    // $this->db->limit($number, $offset);
    $query = $this->db->get();

    return $query->result_array();
  }

  public function create()
  {
    $pegawaiPeminjaman = $this->input->post('pegawaiPeminjaman');
    $kembaliPeminjaman = $this->input->post('kembaliPeminjaman');
    $kembaliPeminjaman .= ' 23:59:00';
    $tanggalPinjam = date('Y-m-d H:i:s');
    $statusPeminjaman = $this->input->post('statusPeminjaman');

    $data = array(
      'id_pegawai' => $pegawaiPeminjaman,
      'tanggal_pinjam' => $tanggalPinjam,
      'tanggal_kembali' => $kembaliPeminjaman,
      'status_peminjaman' => $statusPeminjaman
    );

    return $this->db->insert(self::TABLE_NAME, $data);
  }

  public function update($id)
  {
    $pegawaiPeminjaman = $this->input->post('pegawaiPeminjaman');
    $kembaliPeminjaman = $this->input->post('kembaliPeminjaman');
    $tanggalPinjam = date('Y-m-d H:i:s');
    $tanggalKembali = date('Y-m-d H:i:s', strtotime( $kembaliPeminjaman ));
    $statusPeminjaman = $this->input->post('statusPeminjaman');

    $data = array(
      'id_pegawai' => $pegawaiPeminjaman,
      'tanggal_pinjam' => $tanggalPinjam,
      'tanggal_kembali' => $tanggalKembali,
      'status_peminjaman' => $statusPeminjaman
    );

    $this->db->where('id_peminjaman', $id);
    return $this->db->update(self::TABLE_NAME, $data);
  }

  public function destroy($id)
  {
    $this->db->where('id_peminjaman', $id);
    return $this->db->delete(self::TABLE_NAME);
  }

}
