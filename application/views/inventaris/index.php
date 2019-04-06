<h3>Daftar Inventaris</h3>

<div class="left">
  <form action="<?= base_url('inventaris/index') ?>" method="GET">
    <input type="text" name="keyword" placeholder="Ketikan Nama Inventaris atau Nama Petugas" autocomplete="off" size="35">
    <button type="submit" name="button">Cari</button>
  </form>
</div>
<div class="right">
  <a href="<?= base_url('inventaris/create') ?>">Buat Inventaris Baru</a>
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
    <th>Kode</th>
    <th>Nama</th>
    <th>Jenis</th>
    <th>Kondisi</th>
    <th>Jumlah</th>
    <th>Tanggal Register</th>
    <th>Keterangan</th>
    <th>Nama Petugas</th>
    <th>Ruang</th>
    <th></th>
  </thead>
  <tbody>

    <col width="4%">
    <col width="6%">
    <col width="10%">
    <col width="5%">
    <col width="5%">
    <col width="5%">
    <col width="15%">
    <col width="15%">
    <col width="10%">
    <col width="4%">
    <col width="16%">

    <?php foreach( $inventaris as $i => $row ) : ?>
      <tr>
        <td class="text-center"><?= $i + 1 ?></td>
        <td class="text-center"><?= $row['kode_inventaris'] ?></td>
        <td class="text-center"><?= $row['nama'] ?></td>
        <td class="text-center"><?= $row['nama_jenis'] ?></td>
        <td class="text-center"><?= $row['kondisi'] ?></td>
        <td class="text-center"><?= $row['jumlah'] ?></td>
        <td class="text-center"><?= date('D, d M Y', strtotime( $row['tanggal_register'] ) ) ?></td>
        <td class="text-center"><?= $row['keterangan'] ?></td>
        <td class="text-center"><?= $row['nama_petugas'] ?></td>
        <td class="text-center"><?= $row['nama_ruang'] ?></td>
        <td class="text-center">
          <form action="<?= base_url('inventaris/delete/' . $row['id_inventaris']) ?>" method="post">
            <a href="<?= base_url('inventaris/edit/' . $row['id_inventaris']); ?>">Ubah</a> |
            <button type="submit" name="button" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<?php if( count( $inventaris ) < 1 ) : ?>
  <div class="alert">
    Tidak Ada Data
  </div>
<?php endif; ?>

<div class="pagination">
  <?= $this->pagination->create_links(); ?>
</div>
