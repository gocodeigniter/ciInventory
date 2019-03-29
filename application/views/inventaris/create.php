<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buat Inventaris</title>
  </head>
  <body>

    <form action="<?= base_url('inventaris/store') ?>" method="POST">

      <label for="text">Nama Inventaris</label> <br>
      <input type="text" name="namaInventaris" placeholder="Nama Inventaris" autocomplete="off">
      <br><br>

      <label for="text">Jumlah Inventaris</label> <br>
      <input type="number" name="jumlahInventaris" placeholder="0" autocomplete="off">
      <br><br>

      <label for="text">Kondisi Inventaris</label> <br>
      <select name="kondisiInventaris">
        <option value="">-- Pilih Kondisi --</option>
        <option value="Baik">Baik</option>
        <option value="Cukup Baik">Cukup Baik</option>
        <option value="Sangat Baik">Sangat Baik</option>
        <option value="Buruk">Buruk</option>
      </select>
      <br><br>

      <label for="text">Petugas Inventaris</label> <br>
      <select name="petugasInventaris">
        <option value="">-- Pilih Petugas --</option>
        <?php foreach( $petugas as $row ) : ?>
          <option value="<?= $row['id_petugas'] ?>"><?= $row['nama_petugas'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Jenis Inventaris</label> <br>
      <select name="jenisInventaris">
        <option value="">-- Pilih Jenis --</option>
        <?php foreach( $jenis as $row ) : ?>
          <option value="<?= $row['id_jenis'] ?>"><?= $row['nama_jenis'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Ruang Inventaris</label> <br>
      <select name="ruangInventaris">
        <option value="">-- Pilih Ruang --</option>
        <?php foreach( $ruang as $row ) : ?>
          <option value="<?= $row['id_ruang'] ?>"><?= $row['nama_ruang'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">Keterangan Inventaris</label> <br>
      <textarea name="keteranganInventaris" placeholder="Keterangan Inventaris" cols="30" rows="5"></textarea>
      <br><br>

      <button type="submit" name="button">Kirim</button>

    </form>

  </body>
</html>
