<!--Rikmin Akhir-->
<?= $this->extend('layout/frontsite/template-login'); ?>
<?= $this->section('content') ?>

<!--LOGIN-->
<div class="atlog d-flex justify-content-center mb-4" style="margin-top: 30px;">
  <h4 class="mt-4 fw-bold text-center" style="color:#836944">WEDDING <br/> ORGANIZER</h4>
</div>

<div class="container mb-5 d-flex justify-content-center">
  <div class="login card" style="max-width: 75%;">
    <div class="textlogin card-body mt-3 mb-5 ms-5 me-5" url="">
      <h2 class="card-title fw-bold fs-lg-4 fs-5 text-center" style="color:#F5F5F5">LOGIN</h2>
      <p class="card-subtitle mb-2 small" style="color:#F5F5F5">========================================</p>
      <form method="POST" action="loginn">
        <div class="mb-3 mt-4">
          <label for="email" class="form-label fw-semibold" style="color:#F5F5F5">Username</label>
          <input class="usershape form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email', isset($input['username']) ? $input['username'] : ''); ?>" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
          <div class="invalid-feedback">
            <?= $validation->getError('username'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold" style="color:#F5F5F5">Password</label>
          <input type="password" class="usershape form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" value="<?= old('password', isset($input['password']) ? $input['password'] : ''); ?>" aria-labelledby="passwordHelpBlock" placeholder="Masukkan Password" name="password">
          <div class="invalid-feedback">
            <?= $validation->getError('password'); ?>
          </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-2">
          <button class="button1 btn fw-semibold" type="submit" role="button">LOGIN</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection('content') ?>
