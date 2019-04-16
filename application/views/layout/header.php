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

      <?php if( isset( $this->session->id_petugas ) ) : ?>
        <ul>

          <?php if( $this->session->id_level == 1 ) : ?>
            <li> <a href="<?= base_url('petugas') ?>">Petugas</a> </li>
            <li> <a href="<?= base_url('inventaris') ?>">Inventaris</a> </li>
            <li> <a href="<?= base_url('peminjaman') ?>">Peminjaman</a> </li>
            <li> <a href="<?= base_url('detail') ?>">Detail</a> </li>
          <?php endif; ?>

          <?php if( $this->session->id_level == 2 || $this->session->id_level == 3 ) : ?>
            <li> <a href="<?= base_url('peminjaman') ?>">Peminjaman</a> </li>
            <li> <a href="<?= base_url('detail') ?>">Detail</a> </li>
          <?php endif; ?>

          <li>
            <a id="userNavbar" href="javascript:;"><?= explode( ' ', $this->session->nama_petugas )[0] ?></a>
            <ul class="navbar-link-dropdown">
              <li> <a href="<?= base_url('logout') ?>">Keluar</a> </li>
            </ul>
          </li>

        </ul>
      <?php endif; ?>
    </div>
    <div class="clear"></div>
  </div>
