
<h3>Login</h3>

<form action="<?= base_url('login/store') ?>" method="POST">

  <label for="text">Username Petugas</label> <br>
  <input class="form-control" type="text" name="usernamePetugas" placeholder="Username Petugas" autocomplete="off">
  <br><br>

  <label for="text">Password Petugas</label> <br>
  <input class="form-control" type="password" name="passwordPetugas" placeholder="Password Petugas">
  <br><br>

  <button type="submit" name="button">Login</button>

</form>
