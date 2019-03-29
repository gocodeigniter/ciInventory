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

    <ol>
      <?php foreach( $inventaris as $row ) : ?>
        <li>
          <?= $row['nama'] . ' - ' . $row['kondisi'] . ' - ' . date('d M Y H:i:s', strtotime( $row['tanggal_register'] ) ); ?>
          <form action="<?= base_url('inventaris/delete/' . $row['id_inventaris']) ?>" method="post">
            <a href="<?= base_url('inventaris/edit/' . $row['id_inventaris']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </li> <br>
      <?php endforeach; ?>
    </ol>

  </body>
</html>
