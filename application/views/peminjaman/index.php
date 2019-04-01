<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Peminjaman</title>
  </head>
  <body>

    <a href="<?= base_url('peminjaman/create') ?>">Buat Peminjaman Baru</a>

    <h3>Daftar Peminjaman</h3>

    <form action="<?= base_url('peminjaman/index') ?>" method="GET">
      <input type="text" name="keyword" placeholder="Ketikan Nama Peminjaman" autocomplete="off">
    </form>

    <?php if( $this->session->flashdata('msg') ) : ?>
      <?= $this->session->flashdata('msg'); ?>
    <?php endif; ?>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <td>No</td>
          <td>Nama Peminjam</td>
          <td>Tanggal Pinjam</td>
          <td>Tanggal Kembali</td>
          <td>Status Peminjaman</td>
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $peminjaman as $i => $row ) : ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $row['nama_pegawai'] ?></td>
            <td><?= date('d M Y - H:i', strtotime( $row['tanggal_pinjam'] ) ) ?></td>
            <td><?= date('d M Y - H:i', strtotime( $row['tanggal_kembali'] ) ) ?></td>
            <td><?= $row['status_peminjaman'] ?></td>
            <td>
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

  </body>
</html>
