<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ubah Pegawai</title>
  </head>
  <body>

    <form action="<?= base_url('pegawai/update/' . $pegawai['id_pegawai']) ?>" method="POST">

      <label for="text">NIP Pegawai</label> <br>
      <input type="text" name="nipPegawai" placeholder="NIP Pegawai" value="<?= $pegawai['nip'] ?>">
      <br><br>

      <label for="text">Nama Pegawai</label> <br>
      <input type="text" name="namaPegawai" placeholder="Nama Pegawai" value="<?= $pegawai['nama_pegawai'] ?>">
      <br><br>

      <label for="text">Alamat Pegawai</label> <br>
      <textarea name="alamatPegawai" rows="8" cols="80"><?= $pegawai['alamat'] ?></textarea>
      <br><br>

      <input type="hidden" name="nipPegawaiLama" value="<?= $pegawai['nip'] ?>">

      <button type="submit" name="button">Kirim</button>

    </form>

  </body>
</html>
