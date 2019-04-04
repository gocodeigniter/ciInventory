<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Detail Peminjaman</title>
  </head>
  <body>

    <h3>Daftar Detail Peminjaman</h3>

    <form action="<?= base_url('detail/index') ?>" method="GET">
      <input type="text" name="keyword" placeholder="Ketikan Nama Detail Peminjaman" autocomplete="off">
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
        <?php foreach( $peminjaman as $row ) : ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['nama_pegawai'] ?></td>
            <td><?= $row['tanggal_pinjam'] ?></td>
            <td><?= $row['tanggal_kembali'] ?></td>
            <td><?= $row['status_peminjaman'] ?></td>
            <td>
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
                <td><?= $col['kode_inventaris'] ?></td>
                <td colspan="2"><?= $col['nama'] ?></td>
                <td><?= $col['jumlah'] ?></td>
                <td>
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

  </body>
</html>
