<h3>Ubah Inventaris</h3>

<form action="<?= base_url('peminjaman/update/' . $peminjaman['id_peminjaman']) ?>" method="POST">

  <label for="text">Petugas Peminjaman</label> <br>
  <select class="form-control" name="pegawaiPeminjaman">
    <option value="">-- Pilih Petugas --</option>
    <?php foreach( $pegawai as $row ) : ?>
      <option value="<?= $row['id_pegawai'] ?>" <?= $row['id_pegawai'] == $peminjaman['id_pegawai'] ? 'selected' : '' ?>><?= $row['nama_pegawai'] ?></option>
    <?php endforeach; ?>
  </select>
  <br><br>

  <label for="text">Status Peminjaman</label> <br>
  <select class="form-control" name="statusPeminjaman">
    <option value="">-- Pilih Status --</option>
    <option value="Meminjam" <?= 'Meminjam' == $peminjaman['status_peminjaman'] ? 'selected' : '' ?>>Meminjam</option>
    <option value="Sudah Kembali" <?= 'Sudah Kembali' == $peminjaman['status_peminjaman'] ? 'selected' : '' ?>>Sudah Kembali</option>
  </select>
  <br><br>

  <label for="text">Tanggal Pengembalian</label> <br>
  <input class="form-control" type="date" name="kembaliPeminjaman" min="<?= date('Y-m-d', strtotime( $peminjaman['tanggal_pinjam'] )) ?>" max="<?= date('Y-m-d', strtotime( $peminjaman['tanggal_pinjam'] ) + 60*60*24*10) ?>" value="<?= date('Y-m-d', strtotime( $peminjaman['tanggal_kembali'] )) ?>">
  <br><br>

  <button type="submit" name="button">Kirim</button>

</form>
