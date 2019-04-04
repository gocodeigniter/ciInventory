<h3>Daftar Peminjaman</h3>

<div class="left">
  <form action="<?= base_url('peminjaman/index') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Ketikan Nama Peminjam" autocomplete="off" size="35">
    <button type="submit" name="button">Cari</button>
  </form>
</div>
<div class="right">
  <a href="<?= base_url('peminjaman/create') ?>">Buat Peminjaman Baru</a>
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
    <col width="20%">
    <col width="20%">
    <col width="20%">
    <col width="15%">

    <?php foreach( $peminjaman as $i => $row ) : ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $row['nama_pegawai'] ?></td>
        <td class="text-center"><?= date('D, d M Y - H:i', strtotime( $row['tanggal_pinjam'] ) ) ?></td>
        <td class="text-center"><?= date('D, d M Y - H:i', strtotime( $row['tanggal_kembali'] ) ) ?></td>
        <td class="text-center"><?= $row['status_peminjaman'] ?></td>
        <td class="text-center">
          <form action="<?= base_url('peminjaman/delete/' . $row['id_peminjaman']) ?>" method="POST">
            <a href="<?= base_url('peminjaman/edit/' . $row['id_peminjaman']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button> |
            <a href="<?= base_url('detail/create/' . $row['id_peminjaman']) ?>">Pilih Barang</a>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div class="pagination">
  <?= $this->pagination->create_links(); ?>
</div>
