<h3>Daftar Barang</h3>

<form action="<?= base_url('detail/update/' . $id_peminjaman) ?>" method="POST">
  <table border="1" cellpadding="10" cellspacing="0">

    <col width="4%">
    <col width="40%">
    <col width="20%">

    <thead>
      <td>
        <input id="checkAll" type="checkbox" value="checkAll">
      </td>
      <th>Nama Barang</th>
      <th>Kondisi Barang</th>
      <th>Banyak Peminjaman</th>
    </thead>

    <?php foreach( $inventaris as $i => $row ) : ?>
      <tr>
        <td>
          <input class="singleCheck" type="checkbox" name="invenPeminjaman[]" value="<?= $row['id_inventaris'] ?>" <?= isset( $row['data_user'][0] ) ? 'checked' : '' ?>>
        </td>
        <td><?= $row['nama'] ?></td>
        <td class="text-center"><?= $row['kondisi'] ?></td>
        <td class="text-center">
          <input class="jumlahBarang form-control" type="number" name="jumlahPeminjaman[]" placeholder="0" <?= isset( $row['data_user'][0] ) ? 'value="' . $row['data_user'][0]['jumlah'] . '"' : '' ?> disabled>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>
  <br>

  <button type="submit">Selesai</button>
</form>
