<h3>Buat Inventaris Baru</h3>

<form action="<?= base_url('inventaris/store') ?>" method="POST">

  <label for="text">Nama Inventaris</label> <br>
  <input class="form-control" type="text" name="namaInventaris" placeholder="Nama Inventaris" autocomplete="off">
  <br><br>

  <label for="text">Jumlah Inventaris</label> <br>
  <input class="form-control" type="number" name="jumlahInventaris" placeholder="0" autocomplete="off">
  <br><br>

  <label for="text">Kondisi Inventaris</label> <br>
  <select class="form-control" name="kondisiInventaris">
    <option value="">-- Pilih Kondisi --</option>
    <option value="Baik">Baik</option>
    <option value="Cukup Baik">Cukup Baik</option>
    <option value="Sangat Baik">Sangat Baik</option>
    <option value="Buruk">Buruk</option>
  </select>
  <br><br>

  <label for="text">Petugas Inventaris</label> <br>
  <select class="form-control" name="petugasInventaris">
    <option value="">-- Pilih Petugas --</option>
    <?php foreach( $petugas as $row ) : ?>
      <option value="<?= $row['id_petugas'] ?>"><?= $row['nama_petugas'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <label for="text">Jenis Inventaris</label> <br>
  <select class="form-control" name="jenisInventaris">
    <option value="">-- Pilih Jenis --</option>
    <?php foreach( $jenis as $row ) : ?>
      <option value="<?= $row['id_jenis'] ?>"><?= $row['nama_jenis'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <label for="text">Ruang Inventaris</label> <br>
  <select class="form-control" name="ruangInventaris">
    <option value="">-- Pilih Ruang --</option>
    <?php foreach( $ruang as $row ) : ?>
      <option value="<?= $row['id_ruang'] ?>"><?= $row['nama_ruang'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <label for="text">Keterangan Inventaris</label> <br>
  <textarea class="form-control" name="keteranganInventaris" placeholder="Keterangan Inventaris" rows="5"></textarea>
  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
