<div class="container-fluid">


  <div class="card ">
    <div class="card-body">

      <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
      <div class="row">

        <div class="col-md-4">
          <h5 class="card-title fw-semibold mb-4">Data Admin</h5>
          <div class="card">
            <h4 class="card-header bg-primary text-white">
              <i class="fas fa-user-shield me-2"></i>Admin
            </h4>
            <div class="card-body">
              <h5 class="card-title "><?= $admin ?> Orang</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h5 class="card-title fw-semibold mb-4">Data RT</h5>
          <div class="card">
            <h4 class="card-header bg-dark text-white">
              <i class="fas fa-user-nurse me-2"></i>RT
            </h4>
            <div class="card-body">
              <h5 class="card-title "><?= $rt ?> Orang</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h5 class="card-title fw-semibold mb-4">Data User</h5>
          <div class="card">
            <h4 class="card-header bg-warning text-white">
              <i class="fas fa-user me-2"></i>User
            </h4>
            <div class="card-body">
              <h5 class="card-title "><?= $users ?> Orang</h5>
            </div>
          </div>
        </div>

        <!-- alert sukses -->
        <?php $this->load->view('components/alert/success') ?>
        <!-- alert sukses -->
      </div>

    </div>


    <div class="table-responsive">
      <table class="table  text-center table-hover shadow">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>

            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($all as $u) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $u->username ?></td>
              <td><?= $u->email ?></td>
              <td><?= $u->role ?></td>


              <td class="d-flex gap-2 justify-content-center">
                <a onclick="return confirm('yakin mau hapus bantuan?')" href="<?= base_url('user/delete/') . $u->uID ?>" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="<?= base_url('user/edit/') . $u->uID ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-pencil-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>

    </div>
  </div>


</div>