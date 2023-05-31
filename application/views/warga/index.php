<div class="container-fluid">

  <!-- modal create -->
  <?php $this->load->view('components/modal/modal_warga') ?>
  <!-- modal create -->
  <h4 class="pt-4">Data Warga</h4>
  <!-- alert sukses -->
  <?php $this->load->view('components/alert/success') ?>
  <!-- alert sukses -->
  <!-- alert warning -->
  <?php $this->load->view('components/alert/warning') ?>
  <!-- alert warning -->
  <!-- alert error -->
  <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
  <!-- alert error -->

  <div class="d-flex justify-content-between my-3">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah data warga
    </button>
    <a href="<?= base_url('pdf/cetak_data_warga') ?>" class="btn btn-dark shadow d-flex gap-2"><span>Cetak</span><i style="color: red;" class="fas fs-6 fa-file-pdf"></i></a>
  </div>

  <div class="table-responsive">
    <table class="table  text-center table-hover shadow">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Tgl Lahir</th>
          <th scope="col">Jenis kelamin</th>
          <th scope="col">Alamat</th>
          <th scope="col">Agama</th>
          <th scope="col">Status perkawinan</th>
          <th scope="col">Pekerjaan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($warga as $w) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $w->nama ?></td>
            <td><?= $w->nik ?></td>
            <td><?= $w->tgl_lahir ?></td>
            <td><?= $w->jenis_kelamin ?></td>
            <td><?= $w->alamat ?></td>
            <td><?= $w->agama ?></td>
            <td><?= $w->status_perkawinan ?></td>
            <td><?= $w->pekerjaan ?></td>
            <td class="d-flex gap-2 justify-content-center">
              <a onclick="return confirm('yakin mau hapus data warga?')" href="<?= base_url('warga/delete/') . $w->id ?>" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </a>
              <a href="<?= base_url('warga/edit/') . $w->id ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>

  </div>
</div>