<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Kegiatan</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form method="POST" action="<?= base_url('kegiatan/edit/') . $kegiatan->id ?>" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="($kegiatan->user_id">
        <div class="mb-3">
          <label for="nama_kegiatan" class="form-label">Nama kegiatan</label>
          <input type="text" value="<?= $kegiatan->nama_kegiatan ?>" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="nama kegiatan">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('nama_kegiatan') ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi"><?= $kegiatan->deskripsi ?></textarea>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('deskripsi') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="foto_kegiatan" class="form-label">Foto</label>
          <div class="w-50 rounded-3">
            <img id="foto" src="<?= base_url('assets/img/kegiatan/') . $kegiatan->foto_kegiatan ?>" alt="" class="img-fluid mb-2  w-50">
          </div>
          <input type="file" onchange="previewImage()" name="foto_kegiatan" class="form-control" id="image" placeholder="Lorem ipsum">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('foto_kegiatan') ?>
          </div>
        </div>

        <div class="my-2 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>