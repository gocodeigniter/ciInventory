<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Petugas</title>
  </head>
  <body>

    <a href="<?= base_url('petugas/create') ?>">Buat Petugas Baru</a>

    <h3>Daftar Petugas</h3>

    <form action="<?= base_url('petugas/index') ?>" method="GET">
      <input type="text" name="keyword" placeholder="Ketikan Username atau Nama Petugas" autocomplete="off">
    </form>

    <?php if( $this->session->flashdata('msg') ) : ?>
      <?= $this->session->flashdata('msg'); ?>
    <?php endif; ?>

    <ol>
      <?php foreach( $petugas as $row ) : ?>
        <li>
          <?= $row['username'] . ' - ' . $row['nama_petugas']; ?>
          <form action="<?= base_url('petugas/delete/' . $row['id_petugas']) ?>" method="post">
            <a href="<?= base_url('petugas/edit/' . $row['id_petugas']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </li> <br>
      <?php endforeach; ?>
    </ol>

  </body>
</html>
