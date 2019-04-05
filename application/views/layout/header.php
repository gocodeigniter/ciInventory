<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Aplikasi Inventori</title>

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <!-- Script -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-brand">
      Inventori
    </div>
    <div class="navbar-link">
      <ul>
        <li> <a href="<?= base_url('petugas') ?>">Petugas</a> </li>
        <li> <a href="<?= base_url('pegawai') ?>">Pegawai</a> </li>
        <li> <a href="<?= base_url('inventaris') ?>">Inventaris</a> </li>
        <li> <a href="<?= base_url('peminjaman') ?>">Peminjaman</a> </li>
        <li> <a href="<?= base_url('detail') ?>">Detail</a> </li>
        <li>
          <a id="userNavbar" href="javascript:;">User</a>
          <ul class="navbar-link-dropdown">
            <li> <a href="javascript:;">Profil</a> </li>
            <li> <a href="javascript:;">Pengaturan</a> </li>
            <li> <a href="javascript:;">Keluar</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
