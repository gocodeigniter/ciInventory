<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Petugas</title>
  </head>
  <body>

    <form action="<?= base_url('petugas/update/' . $petugas['id_petugas']) ?>" method="POST">

      <label for="text">Nama Petugas</label> <br>
      <input class="form-control" type="text" name="namaPetugas" placeholder="Nama Petugas" autocomplete="off" value="<?= $petugas['nama_petugas'] ?>">
      <br><br>

      <label for="text">Username Petugas</label> <br>
      <input class="form-control" type="text" name="usernamePetugas" placeholder="Username Petugas" autocomplete="off" value="<?= $petugas['username'] ?>">
      <br><br>

      <label for="text">Level Petugas</label> <br>
      <select class="form-control" name="levelPetugas">
        <option value="">-- Pilih Level --</option>
        <?php foreach( $level as $row ) : ?>
          <option value="<?= $row['id_level'] ?>" <?= $row['id_level'] == $petugas['id_level'] ? 'selected' : '' ?>><?= $row['nama_level'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <label for="text">
        <input id="checkbox" type="checkbox" name="ubahPasswordPetugas">
        Ubah Password Petugas
      </label> <br><br>

      <label for="text">Password Lama Petugas</label> <br>
      <input id="passwordPetugasLama" class="form-control" type="password" name="passwordPetugasLama" placeholder="Password Lama Petugas" disabled>
      <br><br>

      <label for="text">Password Petugas</label> <br>
      <input id="passwordPetugas" class="form-control" type="password" name="passwordPetugas" placeholder="Password Petugas" disabled>
      <br><br>

      <label for="text">Konfirmasi Password Petugas</label> <br>
      <input id="confPasswordPetugas" class="form-control" type="password" name="confPasswordPetugas" placeholder="Konfirmasi Password Petugas" disabled>
      <br><br>

      <input type="hidden" name="usernamePetugasLama" value="<?= $petugas['username'] ?>">

      <button type="submit" name="button">Kirim</button>

    </form>

  <script type="text/javascript">

    var checkbox = document.getElementById('checkbox');
    var passwordPetugas = document.getElementById('passwordPetugas');
    var passwordPetugasLama = document.getElementById('passwordPetugasLama');
    var confPasswordPetugas = document.getElementById('confPasswordPetugas');

    checkbox.onchange = function() {
      if( this.checked ) {
        passwordPetugas.removeAttribute('disabled');
        passwordPetugasLama.removeAttribute('disabled');
        confPasswordPetugas.removeAttribute('disabled');
      } else {
        passwordPetugas.setAttribute('disabled', '');
        passwordPetugasLama.setAttribute('disabled', '');
        confPasswordPetugas.setAttribute('disabled', '');
      }
    };

  </script>
  </body>
</html>
