<div class="container pt-5">

  <!-- alert error -->
  <div class="mt-5">
    <!-- alert error -->
    <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
    <!-- alert error -->
    <!-- alert sukses -->
    <div class="mt-5">
      <?php $this->load->view('components/alert/success') ?>
      <!-- alert sukses -->
    </div>
    <div class="row mt-4">

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="<?= $user->image == 'default.jpg' ? base_url('assets/img/user/default.jpg') : base_url('assets/img/user/') . $user->image ?>" alt="Profile Picture" class=" img-fluid w-50 mb-3">
            <h5 class="card-title"><?= $user->username ?>
            </h5>
            <p class="card-text">Daftar sejak : <?= date('d F Y', $user->created_at) ?></p>
            <hr>

            <ul class="list-group list-group-flush mb-2">
              <li class="list-group-item">
                <span class="fw-bold">Email:</span>
                <span><?= $user->email ?></span>
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Role:</span>
                <span><?= $user->role ?></span>
              </li>
            </ul>
            <button onclick="toggleForm()" class="btn btn-primary"><i class="fas fa-user-edit me-2"></i>Edit Profile</button>

          </div>
        </div>
      </div>
      <!--  -->
      <div class="col-md-8 d-none" id="edit-form">
        <div class="card shadow">
          <form method="post" enctype="multipart/form-data" action="<?= base_url('profile') ?>" class="card-body">
            <h5 class="card-title mb-4">Informasi profile</h5>
            <div class="form-group">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="" name="username" value="<?= $user->username ?>">
              <div id="validationServer03Feedback" class="invalid-feedback d-block">
                <?= form_error('username') ?>
              </div>
            </div>
            <div class="form-group mt-1">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" placeholder="john.doe@example.com" value="<?= $user->email ?>" disabled>
            </div>
            <div class="w-25 mt-3 rounded-3">
              <img id="img-preview" src="<?= $user->image == 'default.jpg' ? base_url('assets/img/user/default.jpg') : base_url('assets/img/user/') . $user->image ?>" alt="Profile Picture" class="img-fluid w-50 mb-3">
            </div>
            <div class="form-group mt-1">
              <label class="form-label">Image profile</label>
              <input type="file" class="form-control" onchange="previewImage()" value="image" id="image" name="image">
            </div>
            <div class="d-flex justify-content-end mt-4">
              <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>