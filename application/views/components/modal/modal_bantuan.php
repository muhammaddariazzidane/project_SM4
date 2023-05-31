<div class="modal fade" id="exampleModal2" tabindex="1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fw-semibold fs-5" id="exampleModalLabel">Tambah Bantuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('dashboard/bantuan') ?>">
          <div class="mb-3">
            <label for="nama_bantuan" class="form-label">Nama bantuan</label>
            <input type="text" name="nama_bantuan" value="<?= set_value('nama_bantuan')  ?>" class="form-control" id="nama_bantuan" placeholder="nama bantuan">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('nama_bantuan') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">jenis</label>
            <select onchange="tes()" id="select" class="form-select" name="jenis" aria-label="Default select example">
              <option value="uang" id="u">Uang</option>
              <option value="sembako" id="s">Sembako</option>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('jenis') ?>
            </div>
          </div>
          <div class="mb-3" id="nomi">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="text" name="nominal" class="form-control" id="nominal" placeholder="10.000">
          </div>

          <div class="my-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>