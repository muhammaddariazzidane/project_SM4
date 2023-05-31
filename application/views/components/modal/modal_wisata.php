<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fw-semibold fs-5" id="exampleModalLabel">Tambah Wisata</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('dashboard/wisata') ?>" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama wisata</label>
            <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" placeholder="nama bantuan">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('nama_wisata') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi"></textarea>
            <!-- <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Lorem ipsum"> -->
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('deskripsi') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="foto_pertama" class="form-label">Foto Pertama</label>
            <input type="file" name="foto_pertama" class="form-control" id="foto_pertama" placeholder="Lorem ipsum">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('foto_pertama') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="foto_kedua" class="form-label">Foto Kedua <small class="text-muted ms-1"> (opsional) </small></label>
            <input type="file" name="foto_kedua" class="form-control" id="foto_kedua" placeholder="Lorem ipsum">
          </div>
          <div class="mb-3">
            <label for="foto_ketiga" class="form-label">Foto Ketiga <small class="text-muted ms-1"> (opsional) </small></label>
            <input type="file" name="foto_ketiga" class="form-control" id="foto_ketiga" placeholder="Lorem ipsum">
          </div>

          <div class="my-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          <!-- </div> -->
        </form>
      </div>
    </div>
  </div>
</div>