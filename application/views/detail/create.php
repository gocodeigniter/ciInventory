<h3>Daftar Barang</h3>

<form action="<?= base_url('detail/store/' . $id_peminjaman) ?>" method="POST">
  <table border="1" cellpadding="10" cellspacing="0">

    <col width="4%">
    <col width="4%">
    <col width="40%">
    <col width="15%">

    <thead>
      <td>
        <input id="checkAll" type="checkbox" value="checkAll">
      </td>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Kondisi Barang</th>
      <th>Banyak Peminjaman</th>
    </thead>

    <?php foreach( $inventaris as $i => $row ) : ?>
      <tr>
        <td>
          <input class="singleCheck" type="checkbox" name="invenPeminjaman[]" value="<?= $row['id_inventaris'] ?>">
        </td>
        <td class="text-center"><?= $i + 1 ?></td>
        <td><?= $row['nama'] ?></td>
        <td class="text-center"><?= $row['kondisi'] ?></td>
        <td class="text-center">
          <input class="jumlahBarang form-control" type="number" name="jumlahPeminjaman[]" placeholder="0" disabled>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>
  <br>

  <button type="submit">Selesai</button>
</form>
