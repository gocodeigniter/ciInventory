<h3>Daftar Detail Peminjaman</h3>

<div class="left">
  <form action="<?= base_url('detail/index') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Ketikan Username atau Nama Petugas" autocomplete="off" size="35">
    <button type="submit" name="button">Cari</button>
  </form>
</div>
<div class="clear"></div>

<br>

<?php if( $this->session->flashdata('msg') ) : ?>
  <div class="alert">
    <?= $this->session->flashdata('msg'); ?>
  </div>
<?php endif; ?>

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <th>No</th>
    <th>Nama Peminjam</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status Peminjaman</th>
    <th></th>
  </thead>
  <tbody>

    <col width="4%">
    <col width="15%">
    <col width="15%">
    <col width="15%">
    <col width="15%">

    <?php foreach( $peminjaman as $i => $row ) : ?>
      <tr>
        <td class="text-center"><?= $i + 1 ?></td>
        <td><?= $row['nama_pegawai'] ?></td>
        <td class="text-center"><?= date('D, d M Y', strtotime( $row['tanggal_pinjam'] )) ?></td>
        <td class="text-center"><?= date('D, d M Y', strtotime( $row['tanggal_kembali'] )) ?></td>
        <td class="text-center"><?= $row['status_peminjaman'] ?></td>
        <td class="text-center">
          <form action="index.html" method="POST">
            <button type="submit" name="button">Hapus</button> |
            <a href="<?= base_url('detail/return/' . $row['id_peminjaman']) ?>">Kembalikan</a>
          </form>
        </td>
        <thead>
          <th></th>
          <th>Kode Barang</th>
          <th colspan="2">Nama Barang</th>
          <th>Jumlah Barang</th>
          <th></th>
        </thead>
        <?php foreach( $row['detail'] as $col ) : ?>
          <tr>
            <td></td>
            <td class="text-center"><?= $col['kode_inventaris'] ?></td>
            <td class="text-center" colspan="2"><?= $col['nama'] ?></td>
            <td class="text-center"><?= $col['jumlah'] ?></td>
            <td class="text-center">
              <form action="index.html" method="POST">
                <button type="submit" name="button">Hapus</button> |
                <a href="<?= base_url('detail/return/' . $row['id_peminjaman']) ?>">Kembalikan</a>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div class="pagination">
  <?= $this->pagination->create_links(); ?>
</div>
