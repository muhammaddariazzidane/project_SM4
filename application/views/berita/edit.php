<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Kegiatan</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form method="POST" action="<?= base_url('berita/edit/') . $berita->id ?>" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama_berita" class="form-label">Nama berita</label>
          <input type="text" name="nama_berita" value="<?= $berita->nama_berita ?>" class="form-control" id="nama_berita" placeholder="nama berita">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('nama_berita') ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi">
            <?= $berita->deskripsi ?>
          </textarea>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('deskripsi') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="foto_berita" class="form-label">Foto</label>
          <div class="w-50 rounded-3">
            <img id="foto" src="<?= base_url('assets/img/berita/') . $berita->foto_berita ?>" alt="" class="img-fluid mb-2 w-50">
          </div>
          <input type="file" onchange="previewImage()" name="foto_berita" class="form-control" id="image" placeholder="Lorem ipsum">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('foto_berita') ?>
          </div>
        </div>
        <div class="my-2 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>