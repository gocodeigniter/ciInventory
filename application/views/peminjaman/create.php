<h3>Buat Peminjaman Baru</h3>

<form action="<?= base_url('peminjaman/store') ?>" method="POST">

  <label for="text">Peminjam</label> <br>
  <select class="form-control" name="petugasPeminjaman">
    <option value="">-- Pilih Petugas --</option>
    <?php foreach( $petugas as $row ) : ?>
      <option value="<?= $row['id_petugas'] ?>"><?= $row['nama_petugas'] ?></option>
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
  <input class="form-control" type="date" name="kembaliPeminjaman" max="<?= date('Y-m-d', time() + 60*60*24*10) ?>" min="<?= date('Y-m-d') ?>">

  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
