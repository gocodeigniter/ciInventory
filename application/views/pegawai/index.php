<h3>Daftar Pegawai</h3>

<div class="left">
  <form action="<?= base_url('pegawai/index') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Ketikan Username atau Nama Pegawai" autocomplete="off" size="35">
    <button type="submit" name="button">Cari</button>
  </form>
</div>
<div class="right">
  <a href="<?= base_url('pegawai/create') ?>">Buat Pegawai Baru</a>
  <a href="<?= base_url('pegawai/export') ?>">Export PDF</a>
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
    <th>NIP</th>
    <th>Nama Pegawai</th>
    <th>Alamat</th>
    <th></th>
  </thead>
  <tbody>

    <col width="4%">
    <col width="15%">
    <col width="25%">
    <col width="40%">
    <col width="16%">

    <?php foreach( $pegawai as $i => $row ) : ?>
      <tr>
        <td class="text-center"><?= $i + 1 ?></td>
        <td><?= $row['nip'] ?></td>
        <td><?= $row['nama_pegawai'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td class="text-center">
          <form action="<?= base_url('pegawai/delete/' . $row['id_pegawai']) ?>" method="post">
            <a href="<?= base_url('pegawai/edit/' . $row['id_pegawai']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<?php if( count( $pegawai ) < 1 ) : ?>
  <div class="alert">
    Tidak Ada Data
  </div>
<?php endif; ?>

<div class="pagination">
  <?= $this->pagination->create_links(); ?>
</div>
