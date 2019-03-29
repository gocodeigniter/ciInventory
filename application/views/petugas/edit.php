<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Petugas</title>
  </head>
  <body>

    <form action="<?= base_url('petugas/update/' . $petugas['id_petugas']) ?>" method="POST">

      <label for="text">Nama Petugas</label> <br>
      <input type="text" name="namaPetugas" placeholder="Nama Petugas" autocomplete="off" value="<?= $petugas['nama_petugas'] ?>">
      <br><br>

      <label for="text">Username Petugas</label> <br>
      <input type="text" name="usernamePetugas" placeholder="Username Petugas" autocomplete="off" value="<?= $petugas['username'] ?>">
      <br><br>

      <label for="text">Level Petugas</label> <br>
      <select name="levelPetugas">
        <option value="">-- Pilih Level --</option>
        <?php foreach( $level as $row ) : ?>
          <option value="<?= $row['id_level'] ?>" <?= $row['id_level'] == $petugas['id_level'] ? 'selected' : '' ?>><?= $row['nama_level'] ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>

      <input type="hidden" name="usernamePetugasLama" value="<?= $petugas['username'] ?>">

      <button type="submit" name="button">Kirim</button>

    </form>

  </body>
</html>
