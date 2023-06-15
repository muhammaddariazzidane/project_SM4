<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fb-semibold fs-5" id="exampleModalLabel">Tambah Berita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('dashboard/berita') ?>" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_berita" class="form-label">Nama berita</label>
            <input type="text" name="nama_berita" class="form-control" id="nama_berita" placeholder="nama berita">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('nama_berita') ?>
            </div>
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"></textarea>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('deskripsi') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="foto_berita" class="form-label">Foto</label>
            <div class="w-50 rounded-3">
              <img id="foto" src="" alt="" class="img-fluid mb-2 d-none w-50">
            </div>
            <input type="file" onchange="previewImage()" name="foto_berita" class="form-control" id="image" placeholder="Lorem ipsum">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('foto_berita') ?>
            </div>
          </div>
          <div class="my-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>