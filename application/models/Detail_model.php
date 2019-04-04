<?php
class Detail_model extends CI_Model {

  // Declaration Constants
  const TABLE_NAME = "detail_pinjam";

  public function __construct()
  {
    $this->load->database();
  }

  public function all($number = NULL, $offset = NULL)
  {
    $this->db->select(
      'pegawai.id_pegawai, pegawai.nama_pegawai, inventaris.nama, inventaris.kode_inventaris, detail_pinjam.id_peminjaman,
      detail_pinjam.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.status_peminjaman'
    );
    $this->db->from('detail_pinjam');
    $this->db->join('inventaris', 'detail_pinjam.id_inventaris = inventaris.id_inventaris');
    $this->db->join('peminjaman', 'detail_pinjam.id_peminjaman = peminjaman.id_peminjaman');
    $this->db->join('pegawai', 'peminjaman.id_pegawai = pegawai.id_pegawai');
    $this->db->limit($number, $offset);

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function find($id)
  {
    $query = $this->db->get_where(self::TABLE_NAME, array('id_detail_pinjam' => $id));
    return $query->row_array();
  }

  public function findByKeyword($keyword)
  {
    $this->db->select(
      'pegawai.id_pegawai, pegawai.nama_pegawai, inventaris.nama, inventaris.kode_inventaris, detail_pinjam.id_peminjaman,
      detail_pinjam.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.status_peminjaman'
    );
    $this->db->from('detail_pinjam');
    $this->db->join('inventaris', 'detail_pinjam.id_inventaris = inventaris.id_inventaris');
    $this->db->join('peminjaman', 'detail_pinjam.id_peminjaman = peminjaman.id_peminjaman');
    $this->db->join('pegawai', 'peminjaman.id_pegawai = pegawai.id_pegawai');

    $this->db->like('nama_pegawai', $keyword, 'both');
    $this->db->or_like('nama', $keyword, 'both');
    $this->db->or_like('kode_inventaris', $keyword, 'both');

    $this->db->order_by('id_' . self::TABLE_NAME, 'DESC');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function countData()
  {
    return count( $this->all() );
  }

  public function create($id)
  {
    $jumlahInventaris = $this->input->post('jumlahPeminjaman');
    $invenPeminjaman = $this->input->post('invenPeminjaman');

    for( $i = 0; $i < count( $invenPeminjaman ); $i++ ) {
      $this->db->insert(self::TABLE_NAME, array(
        'id_peminjaman' => $id,
        'id_inventaris' => $invenPeminjaman[$i],
        'jumlah' => $jumlahInventaris[$i]
      ));
    }
  }

  public function update($id)
  {

  }

  public function destroy($id)
  {

  }

}
