<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Data User</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form method="post" action="<?= base_url('user/edit/') . $users->uID ?>">

        <div class="mb-3">
          <label for="nama_bantuan" class="form-label">Username</label>
          <input type="text" name="username" value="<?= $users->username  ?>" class="form-control" id="username" placeholder="Username">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('username') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama_bantuan" class="form-label">Email</label>
          <input type="text" name="email" value="<?= $users->email  ?>" class="form-control" id="email" placeholder="Username" readonly>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('email') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="role_id" class="form-label">Role</label>
          <select onchange="tes()" id="select" class="form-select" name="role_id" aria-label="Default select example">
            <option value="1" <?= $users->role == 'Admin' ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?= $users->role == 'RT' ? 'selected' : '' ?>>RT</option>
            <option value="3" <?= $users->role == 'warga' ? 'selected' : '' ?>>Warga</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('role_id') ?>
          </div>
        </div>

        <div class="my-2 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>