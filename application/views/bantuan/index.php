<div class="container-fluid">
  <!-- modal create -->
  <?php $this->load->view('components/modal/modal_bantuan') ?>
  <!-- modal create -->

  <h4 class="pt-4">Data bantuan</h4>
  <!-- alert info -->
  <?php $this->load->view('components/alert/info') ?>
  <!-- alert info -->
  <!-- alert sukses -->
  <?php $this->load->view('components/alert/success') ?>
  <!-- alert sukses -->
  <!-- alert error -->
  <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
  <!-- alert error -->
  <div class="d-flex justify-content-between my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
      Tambah bantuan
    </button>
  </div>

  <div class="table-responsive">
    <table class="table  text-center table-hover shadow">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis</th>
          <th scope="col">Nominal</th>

          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bantuan as $b) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $b->nama_bantuan ?></td>
            <td><?= $b->jenis ?></td>
            <td><?= ($b->nominal) ? $b->nominal : '-' ?></td>

            <td class="d-flex gap-2 justify-content-center">
              <a onclick="return confirm('yakin mau hapus bantuan?')" href="<?= base_url('bantuan/delete/') . $b->id ?>" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </a>
              <a href="<?= base_url('bantuan/edit/') . $b->id ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>

  </div>
</div>