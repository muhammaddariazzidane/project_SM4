<div class="container-fluid  py-5">

  <!-- modal_create -->
  <?php $this->load->view('components/modal/modal_wisata') ?>
  <!-- modal_create -->
  <div class="row pt-5 mt-4">
    <div class="col">
      <h4>Wisata Terbaru</h4>
      <!-- alert sukses -->
      <?php $this->load->view('components/alert/success') ?>
      <!-- alert sukses -->
      <!-- alert error -->
      <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
      <!-- alert error -->

      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Wisata
      </button>

    </div>
  </div>



  <div class="table-responsive shadow mt-4">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Wisata</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Foto Wisata</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($wisata) : ?>
          <?php $i = 1 ?>
          <?php foreach ($wisata as $w) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $w->nama_wisata ?></td>
              <td><?= substr($w->deskripsi, 0, 50)  ?>...</td>
              <td><img src="<?= base_url('assets/img/wisata/') . $w->foto_pertama ?>" width="50" alt=""></td>
              <td class="d-flex gap-2 justify-content-center">
                <a onclick="return confirm('yakin mau hapus kegiatan?')" href="<?= base_url('wisata/delete/') . $w->id ?>" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="<?= base_url('wisata/edit/') . $w->id ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-pencil-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>

      </tbody>
    </table>
  </div>



</div>

</head>

<!-- <div class="container"> -->



<!-- </div> -->