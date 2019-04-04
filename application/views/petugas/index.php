<h3>Daftar Petugas</h3>

<div class="left">
  <form action="<?= base_url('petugas/index') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Ketikan Username atau Nama Petugas" autocomplete="off" size="35">
    <button type="submit" name="button">Cari</button>
  </form>
</div>
<div class="right">
  <a href="<?= base_url('petugas/create') ?>">Buat Petugas Baru</a>
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
    <th>Username</th>
    <th>Nama Petugas</th>
    <th>Level</th>
    <th></th>
  </thead>
  <tbody>

    <col width="4%">
    <col width="35%">
    <col width="35%">
    <col width="10%">
    <col width="16%">

    <?php foreach( $petugas as $i => $row ) : ?>
      <tr>
        <td class="text-center"><?= $i + 1 ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['nama_petugas'] ?></td>
        <td class="text-center"><?= $row['nama_level'] ?></td>
        <td class="text-center">
          <form action="<?= base_url('petugas/delete/' . $row['id_petugas']) ?>" method="post">
            <a href="<?= base_url('petugas/edit/' . $row['id_petugas']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<div class="pagination">
  <?= $this->pagination->create_links(); ?>
</div>
