<h3>Buat Peminjaman Baru</h3>

<form action="<?= base_url('peminjaman/store') ?>" method="POST">

  <label for="text">Petugas Peminjaman</label> <br>
  <select class="form-control" name="pegawaiPeminjaman">
    <option value="">-- Pilih Petugas --</option>
    <?php foreach( $pegawai as $row ) : ?>
      <option value="<?= $row['id_pegawai'] ?>"><?= $row['nama_pegawai'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <label for="text">Status Peminjaman</label> <br>
  <select class="form-control" name="statusPeminjaman">
    <option value="">-- Pilih Status --</option>
    <option value="Meminjam">Meminjam</option>
    <option value="Sudah Kembali">Sudah Kembali</option>
  </select>
  <br><br>

  <label for="text">Tanggal Pengembalian</label> <br>
  <input class="form-control" type="date" name="kembaliPeminjaman">

  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
