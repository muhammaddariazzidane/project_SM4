<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Data warga</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form method="POST" action="<?= base_url('wisata/edit/') . $wisata->id ?>" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama_wisata" class="form-label">Nama wisata</label>
          <input type="text" name="nama_wisata" value="<?= $wisata->nama_wisata ?>" class="form-control" id="nama_wisata" placeholder="nama bantuan">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('nama_wisata') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi">
            <?= $wisata->deskripsi ?>
          </textarea>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('deskripsi') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="foto_pertama" class="form-label">Foto Pertama</label>
          <div class="w-50 rounded-3">
            <img id="foto" src="<?= base_url('assets/img/wisata/') . $wisata->foto_pertama ?>" alt="" class="img-fluid mb-2 w-50">
          </div>
          <input type="file" name="foto_pertama" class="form-control" id="foto_pertama" placeholder="Lorem ipsum">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('foto_pertama') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="foto_kedua" class="form-label">Foto Kedua <small class="text-muted ms-1"> (opsional) </small></label>
          <?php if ($wisata->foto_kedua) : ?>
            <div class="w-50 rounded-3">
              <img id="foto" src="<?= base_url('assets/img/wisata/') . $wisata->foto_kedua ?>" alt="" class="img-fluid mb-2 w-50">
            </div>
          <?php endif ?>
          <input type="file" name="foto_kedua" class="form-control" id="foto_kedua" placeholder="Lorem ipsum">
        </div>
        <div class="mb-3">
          <?php if ($wisata->foto_ketiga) : ?>
            <div class="w-50 rounded-3">
              <img id="foto" src="<?= base_url('assets/img/wisata/') . $wisata->foto_ketiga ?>" alt="" class="img-fluid mb-2 w-50">
            </div>
          <?php endif ?>
          <label for="foto_ketiga" class="form-label">Foto Ketiga <small class="text-muted ms-1"> (opsional) </small></label>
          <input type="file" name="foto_ketiga" class="form-control" id="foto_ketiga" placeholder="Lorem ipsum">
        </div>

        <div class="my-2 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>