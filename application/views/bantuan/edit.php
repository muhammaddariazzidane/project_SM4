<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Data Bantuan</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form method="post" action="<?= base_url('bantuan/edit/') . $bantuan->id ?>">
        <div class="mb-3">
          <label for="nama_bantuan" class="form-label">Nama bantuan</label>
          <input type="text" name="nama_bantuan" value="<?= $bantuan->nama_bantuan  ?>" class="form-control" id="nama_bantuan" placeholder="nama bantuan">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('nama_bantuan') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nik" class="form-label">jenis</label>
          <select onchange="tes()" id="select" class="form-select" name="jenis" aria-label="Default select example">
            <option value="uang" <?= $bantuan->jenis == 'uang' ? 'selected' : '' ?> id="u">Uang</option>
            <option value="sembako" <?= $bantuan->jenis == 'sembako' ? 'selected' : '' ?> id="s">Sembako</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('jenis') ?>
          </div>
        </div>
        <div class="<?= $bantuan->nominal ? '' : 'mb-3 d-none'  ?>" id="nomi">
          <label for="nominal" class="form-label">Nominal</label>
          <input type="text" name="nominal" value="<?= $bantuan->nominal ?>" class="form-control" id="nominal" placeholder="10.000">
        </div>

        <div class="my-2 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>