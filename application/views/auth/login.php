<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-5 col-xxl-3">
        <div class="card  mb-0">
          <div class="card-body">
            <!-- validasi -->
            <!-- <?= $error ? '<div class="alert text-center alert-danger" role="alert">' . $error . '</div>' : '' ?> -->
            <!-- validasi -->
            <!-- alert error -->
            <?= $this->session->error ? '<div class="alert text-center alert-danger" role="alert">' . $this->session->error . '</div>' : '' ?>
            <!-- alert error -->
            <h3 class="text-nowrap logo-img text-center d-block py-2 fw-semibold w-100">
              Login
            </h3>
            <form method="post" action="<?= base_url('auth') ?>">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" id="email" aria-describedby="emailHelp" autofocus>
                <div id="validationServer03Feedback" class="invalid-feedback d-block">
                  <?= form_error('email') ?>
                </div>
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <div id="validationServer03Feedback" class="invalid-feedback d-block">
                  <?= form_error('password') ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
                <a class="text-primary fw-bold ms-2" href="<?= base_url('auth/register') ?>">Buat akun</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>