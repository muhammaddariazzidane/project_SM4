<div class="modal fade" id="exampleModal4" tabindex="1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fw-semibold fs-5" id="exampleModalLabel">Ajukan penerima BLT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('dashboard') ?>">

          <div class="mb-3">
            <label for="nama_warga" class="form-label">Nama warga</label>
            <select class="form-select select-live-search" name="warga_id" aria-label="Default select example">
              <option value="">Pilih warga</option>
              <?php foreach ($warga as $w) : ?>
                <option value="<?= $w->id ?>"><?= $w->nama ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">Bantuan</label>
            <select onchange="tes2()" name="bantuan_id" class="form-select" aria-label="Default select example">
              <option value="">Pilih bantuan</option>
              <?php foreach ($bantuan as $b) : ?>
                <option value="<?= $b->id ?>" id="s2"><?= $b->nama_bantuan ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-dark mb-2">Ajukan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>