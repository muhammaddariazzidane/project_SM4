<div class="container-fluid  py-5">
  <!-- modal create  -->
  <?php $this->load->view('components/modal/modal_kegiatan') ?>
  <!-- modal create  -->
  <div class="row pt-5 mt-4">
    <div class="col">
      <h4 class="">Kegiatan terbaru</h4>
      <!-- alert sukses -->
      <?php $this->load->view('components/alert/success') ?>
      <!-- alert sukses -->

      <!-- alert error -->
      <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
      <!-- alert error -->

      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Kegiatan
      </button>

    </div>
  </div>




  <div class="table-responsive shadow mt-4">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kegiatan</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Foto Kegiatan</th>
          <th scope="col">Tanggal Kegiatan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($kegiatan as $k) : ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $k->nama_kegiatan ?></td>
            <td> <?= (strlen($k->deskripsi) > 90) ? substr($k->deskripsi, 0, 90) . '...' : $k->deskripsi ?>
            </td>
            <td><img src="<?= base_url('assets/img/kegiatan/') . $k->foto_kegiatan ?>" width="50" alt=""></td>
            <td><?= date('d F Y', $k->post_at) ?></td>
            <td class="d-flex gap-2 justify-content-center">
              <a onclick="return confirm('yakin mau hapus kegiatan?')" href="<?= base_url('kegiatan/delete/') . $k->id ?>" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
              </a>
              <a href="<?= base_url('kegiatan/edit/') . $k->id ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-pencil-alt"></i>
              </a>
            </td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>



</div>

</head>

<!-- <div class="container"> -->



<!-- </div> -->