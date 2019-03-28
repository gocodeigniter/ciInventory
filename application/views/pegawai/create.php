<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buat Pegawai</title>
  </head>
  <body>

    <form action="<?= base_url('pegawai/store') ?>" method="POST">

      <label for="text">NIP Pegawai</label> <br>
      <input type="text" name="nipPegawai" placeholder="NIP Pegawai">
      <br><br>

      <label for="text">Nama Pegawai</label> <br>
      <input type="text" name="namaPegawai" placeholder="Nama Pegawai">
      <br><br>

      <label for="text">Alamat Pegawai</label> <br>
      <textarea name="alamatPegawai" rows="8" cols="80"></textarea>
      <br><br>

      <button type="submit" name="button">Kirim</button>

    </form>

  </body>
</html>
