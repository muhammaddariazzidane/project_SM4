<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data warga</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('dashboard/warga') ?>">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Warga</label>
            <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" id="nama" placeholder="nama warga">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('nama') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" name="nik" class="form-control" id="nik" value="<?= set_value('nik') ?>" placeholder="23209109">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('nik') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" id="tgl_lahir">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('tgl_lahir') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="alamt" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3"><?= set_value('alamat') ?></textarea>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('alamat') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example">
              <option value="">Pilih jenis kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('jenis_kelamin') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" id="agama" name="agama" aria-label="Default select example">
              <option value="">Pilih Agama</option>
              <option value="islam">Islam</option>
              <option value="kristen">Kristen</option>
              <option value="katolik">Katolik</option>
              <option value="budha">Budha</option>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('agama') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="status_perkawinan" class="form-label">Status perkawinan</label>
            <select class="form-select" id="status_perkawinan" name="status_perkawinan" aria-label="Default select example">
              <option value="">Pilih Status</option>
              <option value="kawin">Kawin</option>
              <option value="belum kawin">Belum kawin</option>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('status_perkawinan') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" value="<?= set_value('pekerjaan') ?>" name="pekerjaan" id="pekerjaan">
            <div id="validationServer03Feedback" class="invalid-feedback d-block">
              <?= form_error('pekerjaan') ?>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success mb-2">Tambah</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>