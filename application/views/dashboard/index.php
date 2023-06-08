<div class="container-fluid">

  <!-- khusus admin -->
  <?php if ($this->session->role_id == 1) : ?>
    <!-- modal create -->
    <?php $this->load->view('components/modal/modal_penerima') ?>
    <!-- modal create -->
    <h4 class="pt-4">Data penerima BLT</h4>
    <!-- alert info -->
    <?php $this->load->view('components/alert/info') ?>
    <!-- alert info -->
    <!-- alert sukses -->
    <?php $this->load->view('components/alert/success') ?>
    <!-- alert sukses -->
    <!-- alert warning -->
    <?php $this->load->view('components/alert/warning') ?>
    <!-- alert warning -->
    <!-- alert error -->
    <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
    <!-- alert error -->
    <div class="d-flex flex-wrap gap-2 justify-content-between my-3">
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal3">
        Tambah penerima BLT
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Unduh Pengajuan
        </button>
        <ul class="dropdown-menu">
          <li>
            <a href="<?= base_url('pdf/cetak_data_pengajuan') ?>" class="dropdown-item d-flex gap-2"><span>Unduh PDF</span><i style="color: red;" class="fas fs-6 fa-file-pdf"></i></a>
          </li>
          <li>
            <a href="<?= base_url('excel/cetak_data_pengajuan') ?>" class="dropdown-item d-flex gap-2"><span>Unduh Excel</span><i style="color: green;" class="fas fs-6 fa-file-excel"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered rounded-4 text-center table-hover shadow">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIK</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Jenis kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nama Bantuan</th>
            <th scope="col">Status</th>
            <th scope="col">Di cetak</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($penerima as $p) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $p->nama ?></td>
              <td><?= $p->nik ?></td>
              <td><?= $p->tgl_lahir ?></td>
              <td><?= $p->jenis_kelamin ?></td>
              <td><?= $p->alamat ?></td>
              <td><?= $p->nama_bantuan ?></td>
              <td>
                <?php if ($p->status == 1) : ?>
                  <span class="badge rounded-pill text-bg-success">Disetujui</span>
                <?php else : ?>
                  <span class="badge rounded-pill text-bg-danger">Pending</span>
                <?php endif ?>
              </td>
              <?= ($p->printed == 0) ? '<td>Belum dicetak</td>' : '<td>Dicetak</td>' ?>
              <td class="d-flex gap-1 justify-content-center align-items-center">
                <?php if ($p->printed == 1) : ?>
                  <a href="<?= base_url('penerima_bantuan/updateCetak/') . $p->id ?>" onclick="return confirm('Warga sudah mengambil BLT, ingin melanjutkan merubah status cetak?')" class="btn d-flex align-items-center gap-2 btn-sm py-2 btn-warning position-relative">
                    <span class="text-nowrap">Ubah Cetak</span>
                    <i class="fas fa-file-invoice"></i>
                    <?php if ($p->status == 0) : ?>
                      <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                      </span> <?php endif ?>
                  </a>
                <?php else : ?>
                  <a href="<?= base_url('penerima_bantuan/updateAktif/') . $p->id ?>" class="btn d-flex align-items-center gap-2 btn-sm py-2 btn-primary position-relative">
                    <span class="text-nowrap">Ubah status</span>
                    <i class="fas fa-exchange-alt"></i>
                    <?php if ($p->status == 0) : ?>
                      <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                      </span>
                    <?php endif ?>
                  </a>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<?php endif ?>
<!-- khusus RT -->
<?php if ($this->session->role_id == 2) : ?>
  <!-- alert info -->
  <?php $this->load->view('components/alert/info') ?>
  <!-- alert info -->
  <!-- alert sukses -->
  <?php $this->load->view('components/alert/success') ?>
  <!-- alert sukses -->
  <!-- alert warning -->
  <?php $this->load->view('components/alert/warning') ?>
  <!-- alert warning -->
  <!-- alert error -->
  <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
  <!-- alert error -->
  <h4 class="pb-2">Data Ajuan penerima BLT</h4>
  <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal4" type="button">Tambah pengajuan</button>
  <?php $this->load->view('components/modal/modal_pengajuan') ?>
  <div class="table-responsive mt-5">
    <table class="table table-bordered rounded-4 text-center table-hover shadow">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Tgl Lahir</th>
          <th scope="col">Jenis kelamin</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nama Bantuan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($penerima as $p) : ?>
          <?php if ($p->status == 0) : ?>
            <tr>
              <th scope="row"><?= $i++ ?></th>
              <td><?= $p->nama ?></td>
              <td><?= $p->nik ?></td>
              <td><?= $p->tgl_lahir ?></td>
              <td><?= $p->jenis_kelamin ?></td>
              <td><?= $p->alamat ?></td>
              <td><?= $p->nama_bantuan ?></td>
              <td>
                <?php if ($p->status == 1) : ?>
                  <span class="badge rounded-pill text-bg-success">Disetujui</span>
                <?php else : ?>
                  <span class="badge rounded-pill text-bg-danger">Pending</span>
                <?php endif ?>
              </td>
            </tr>
          <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <!-- khusus RT -->
<?php endif ?>
</div>