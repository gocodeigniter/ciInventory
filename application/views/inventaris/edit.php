<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Inventaris</title>
  </head>
  <body>

    <form action="<?= base_url('inventaris/update/' . $inventaris['id_inventaris']) ?>" method="POST">

      <label for="text">Nama Inventaris</label> <br>
      <input type="text" name="namaInventaris" placeholder="Nama Inventaris" autocomplete="off" value="<?= $inventaris['nama'] ?>">
      <br><br>

      <label for="text">Jumlah Inventaris</label> <br>
      <input type="number" name="jumlahInventaris" placeholder="0" autocomplete="off" value="<?= $inventaris['jumlah'] ?>">
      <br><br>

      <label for="text">Kondisi Inventaris</label> <br>
      <select name="kondisiInventaris">
        <option value="">-- Pilih Kondisi --</option>
        <option value="Baik" <?= 'Baik' == $inventaris['kondisi'] ? 'selected' : '' ?>>Baik</option>
        <option value="Cukup Baik" <?= 'Cukup Baik' == $inventaris['kondisi'] ? 'selected' : '' ?>>Cukup Baik</option>
        <option value="Sangat Baik" <?= 'Sangat Baik' == $inventaris['kondisi'] ? 'selected' : '' ?>>Sangat Baik</option>
        <option value="Buruk" <?= 'Buruk' == $inventaris['kondisi'] ? 'selected' : '' ?>>Buruk</option>
      </select>
      <br><br>

      <label for="text">Petugas Inventaris</label> <br>
      <select name="petugasInventaris">
        <option value="">-- Pilih Petugas --</option>
        <?php foreach( $petugas as $row ) : ?>
          <option value="<?= $row['id_petugas'] ?>" <?= $row['id_petugas'] == $inventaris['id_petugas'] ? 'selected' : '' ?>><?= $row['nama_petugas'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Jenis Inventaris</label> <br>
      <select name="jenisInventaris">
        <option value="">-- Pilih Jenis --</option>
        <?php foreach( $jenis as $row ) : ?>
          <option value="<?= $row['id_jenis'] ?>" <?= $row['id_jenis'] == $inventaris['id_jenis'] ? 'selected' : '' ?>><?= $row['nama_jenis'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Ruang Inventaris</label> <br>
      <select name="ruangInventaris">
        <option value="">-- Pilih Ruang --</option>
        <?php foreach( $ruang as $row ) : ?>
          <option value="<?= $row['id_ruang'] ?>" <?= $row['id_ruang'] == $inventaris['id_ruang'] ? 'selected' : '' ?>><?= $row['nama_ruang'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Keterangan Inventaris</label> <br>
      <textarea name="keteranganInventaris" placeholder="Keterangan Inventaris" cols="30" rows="5"><?= $inventaris['keterangan'] ?></textarea>
      <br><br>

      <button type="submit" name="button">Kirim</button>

    </form>

  </body>
</html>
