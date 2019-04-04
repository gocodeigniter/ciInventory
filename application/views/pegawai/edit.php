<form action="<?= base_url('pegawai/update/' . $pegawai['id_pegawai']) ?>" method="POST">

  <label for="text">NIP Pegawai</label> <br>
  <input class="form-control" type="text" name="nipPegawai" placeholder="NIP Pegawai" value="<?= $pegawai['nip'] ?>" autocomplete="off">
  <br><br>

  <label for="text">Nama Pegawai</label> <br>
  <input class="form-control" type="text" name="namaPegawai" placeholder="Nama Pegawai" value="<?= $pegawai['nama_pegawai'] ?>" autocomplete="off">
  <br><br>

  <label for="text">Alamat Pegawai</label> <br>
  <textarea class="form-control" name="alamatPegawai" rows="8" placeholder="Alamat Pegawai"><?= $pegawai['alamat'] ?></textarea>
  <br><br>

  <input type="hidden" name="nipPegawaiLama" value="<?= $pegawai['nip'] ?>">

  <button type="submit" name="button">Kirim</button>

</form>
