<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-5 col-xxl-3">
        <div class="card  mb-0">
          <div class="card-body">
            <h3 class="text-nowrap logo-img text-center d-block py-2 fw-semibold w-100">
              Register
            </h3>
            <form method="post" action="<?= base_url('auth/register') ?>">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" id="username">
                <div id="validationServer03Feedback" class="invalid-feedback d-block">
                  <?= form_error('username') ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                <div id="validationServer03Feedback" class="invalid-feedback d-block">
                  <?= form_error('email') ?>
                </div>
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <div id="validationServer03Feedback" class="invalid-feedback d-block">
                  <?= form_error('password') ?>
                </div>
              </div>

              <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                <a class="text-primary fw-bold ms-2" href="<?= base_url('auth') ?>">login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>