<div class="container-fluid py-5">

  <!-- modal create -->
  <?php $this->load->view('components/modal/modal_berita') ?>
  <!-- modal create -->
  <div class="row pt-5 mt-4">
    <div class="col">
      <!-- <h4 class="pt-4">Data Warga</h4> -->

      <h4>Berita terbaru</h4>
      <!-- alert sukses -->
      <?php $this->load->view('components/alert/success') ?>
      <!-- alert sukses -->
      <!-- alert error -->
      <?= validation_errors() ? $this->load->view('components/alert/error', '', true) : '' ?>
      <!-- alert error -->
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Berita
      </button>

    </div>
  </div>



  <div class="table-responsive shadow mt-4">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Berita</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Foto Berita</th>
          <th scope="col">Tanggal dipublish</th>
          <th scope="col">Author</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($berita) : ?>
          <?php $i = 1 ?>
          <?php foreach ($berita as $b) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $b->nama_berita ?></td>
              <td>
                <?= (strlen($b->deskripsi) > 90) ? substr($b->deskripsi, 0, 90) . '...' : $b->deskripsi ?>
              </td>
              <td><img src="<?= base_url('assets/img/berita/') . $b->foto_berita ?>" width="50" alt=""></td>
              <td><?= date('d F Y', $b->post_at) ?></td>
              <td><?= $b->username ?></td>
              <td class="d-flex gap-2 justify-content-center">
                <a onclick="return confirm('yakin mau hapus berita?')" href="<?= base_url('berita/delete/') . $b->id ?>" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
                <a href="<?= base_url('berita/edit/') . $b->id ?>" class="btn btn-sm btn-primary">
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