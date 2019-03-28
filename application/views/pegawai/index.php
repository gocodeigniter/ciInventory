<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Pegawai</title>
  </head>
  <body>

    <a href="<?= base_url('pegawai/create') ?>">Buat Pegawai Baru</a>

    <h3>Daftar Pegawai</h3>

    <?php if( $this->session->flashdata('msg') ) : ?>
      <?= $this->session->flashdata('msg'); ?>
    <?php endif; ?>

    <ol>
      <?php foreach( $pegawai as $row ) : ?>
        <li>
          <?= $row['nip'] . ' - ' . $row['nama_pegawai']; ?>
          <form action="<?= base_url('pegawai/delete/' . $row['id_pegawai']) ?>" method="post">
            <a href="<?= base_url('pegawai/edit/' . $row['id_pegawai']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </li> <br>
      <?php endforeach; ?>
    </ol>

  </body>
</html>
