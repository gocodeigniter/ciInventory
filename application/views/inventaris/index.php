<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Inventaris</title>
  </head>
  <body>

    <a href="<?= base_url('inventaris/create') ?>">Buat Inventaris Baru</a>

    <h3>Daftar Inventaris</h3>

    <form action="<?= base_url('inventaris/index') ?>" method="GET">
      <input type="text" name="keyword" placeholder="Ketikan Nama Inventaris" autocomplete="off">
    </form>

    <?php if( $this->session->flashdata('msg') ) : ?>
      <?= $this->session->flashdata('msg'); ?>
    <?php endif; ?>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <td>No</td>
          <td>Kode</td>
          <td>Nama</td>
          <td>Kondisi</td>
          <td>Jumlah</td>
          <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $inventaris as $i => $row ) : ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $row['kode_inventaris'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kondisi'] ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>
              <form action="<?= base_url('inventaris/delete/' . $row['id_inventaris']) ?>" method="post">
                <a href="<?= base_url('inventaris/edit/' . $row['id_inventaris']); ?>">Ubah</a> |
                <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </body>
</html>
