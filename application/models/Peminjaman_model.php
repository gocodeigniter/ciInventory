<?php
class Peminjaman_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "peminjaman";

  public function __construct()
  {
    $this->load->database();
  }

  public function allWithOutPagging()
  {
    $this->db->select('petugas.nama_petugas, peminjaman.*');
    $this->db->from('peminjaman');
    $this->db->join('petugas', 'pegawai.id_petugas = peminjaman.id_petugas');

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function all($number = NULL, $offset = NULL)
  {
    $this->db->select('petugas.nama_petugas, peminjaman.*');
    $this->db->from('peminjaman');
    $this->db->join('petugas', 'petugas.id_petugas = peminjaman.id_petugas');
    $this->db->limit($number, $offset);

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function find($id)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('id_peminjaman' => $id));
    return $query->row_array();
  }

  public function findByKeyword($keyword)
  {
    $this->db->select(
      'pegawai.id_pegawai, pegawai.nama_pegawai,
      peminjaman.id_peminjaman, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.status_peminjaman'
    );
    $this->db->from('peminjaman');
    $this->db->join('pegawai', 'peminjaman.id_pegawai = pegawai.id_pegawai');

    $this->db->like('nama_pegawai', $keyword, 'both');

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function findAll( $id_petugas )
  {
    $this->db->select('petugas.nama_petugas, peminjaman.*');
    $this->db->from('peminjaman');
    $this->db->join('petugas', 'petugas.id_petugas = peminjaman.id_petugas');

    $this->db->where('petugas.id_petugas', $id_petugas);
    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function countData()
  {
    return count( $this->all() );
}

  public function create()
  {
    $petugasPeminjaman = $this->input->post('petugasPeminjaman');
    $kembaliPeminjaman = $this->input->post('kembaliPeminjaman');
    $kembaliPeminjaman .= ' 23:59:00';
    $tanggalPinjam = date('Y-m-d H:i:s');
    $statusPeminjaman = $this->input->post('statusPeminjaman');

    $data = array(
      'id_petugas' => $petugasPeminjaman,
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
