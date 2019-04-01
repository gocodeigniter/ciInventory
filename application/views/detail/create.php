<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar Barang</title>
  </head>
  <body>

    <h3>Daftar Barang</h3>

    <form action="<?= base_url('detail/store/' . $id_peminjaman) ?>" method="POST">
      <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <td>
              <input type="checkbox" value="checkAll">
            </td>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Kondisi Barang</td>
            <td>Banyak Peminjaman</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $inventaris as $i => $row ) : ?>
            <tr>
              <td>
                <input type="checkbox" name="invenPeminjaman[]" value="<?= $row['id_inventaris'] ?>">
              </td>
              <td><?= $i + 1 ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['kondisi'] ?></td>
              <td>
                <input type="number" name="jumlahPeminjaman[]">
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <br>

      <button type="submit">Selesai</button>
    </form>

  </body>
</html>
