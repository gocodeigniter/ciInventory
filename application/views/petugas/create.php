
<h3>Buat Petugas Baru</h3>

<form action="<?= base_url('petugas/store') ?>" method="POST">

  <label for="text">Nama Petugas</label> <br>
  <input class="form-control" type="text" name="namaPetugas" placeholder="Nama Petugas" autocomplete="off">
  <br><br>

  <label for="text">Username Petugas</label> <br>
  <input class="form-control" type="text" name="usernamePetugas" placeholder="Username Petugas" autocomplete="off">
  <br><br>

  <label for="text">Password Petugas</label> <br>
  <input class="form-control" type="password" name="passwordPetugas" placeholder="Password Petugas">
  <br><br>

  <label for="text">Konfirmasi Password Petugas</label> <br>
  <input class="form-control" type="password" name="confPasswordPetugas" placeholder="Konfirmasi Password Petugas">
  <br><br>

  <label for="text">Level Petugas</label> <br>
  <select class="form-control" name="levelPetugas">
    <option value="">-- Pilih Level --</option>
    <?php foreach( $level as $row ) : ?>
      <option value="<?= $row['id_level'] ?>"><?= $row['nama_level'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
