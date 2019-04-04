<form action="<?= base_url('pegawai/store') ?>" method="POST">

  <label for="text">NIP Pegawai</label> <br>
  <input class="form-control" type="text" name="nipPegawai" placeholder="NIP Pegawai" autocomplete="off">
  <br><br>

  <label for="text">Nama Pegawai</label> <br>
  <input class="form-control" type="text" name="namaPegawai" placeholder="Nama Pegawai" autocomplete="off">
  <br><br>

  <label for="text">Alamat Pegawai</label> <br>
  <textarea class="form-control" name="alamatPegawai" rows="8" placeholder="Alamat Pegawai"></textarea>
  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
