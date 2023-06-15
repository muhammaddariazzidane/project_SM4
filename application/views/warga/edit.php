<div class="container-fluid">
  <div class="row mb-2">
    <h3>Edit Data warga</h3>
  </div>
  <div class="row">
    <div class="col-lg-6 py-2 shadow">
      <form action="<?= base_url('warga/edit/') . $warga->id ?>" method="post">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Warga</label>
          <input type="text" name="nama" class="form-control" value="<?= $warga->nama ?>" id="nama" placeholder="nama warga">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nik</label>
          <input type="text" name="nik" class="form-control" value="<?= $warga->nik ?>" id="nama" placeholder="nama warga">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('nik') ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
          <input type="date" name="tgl_lahir" class="form-control" value="<?= $warga->tgl_lahir ?>" id="tgl_lahir" readonly placeholder="nama warga">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">

          </div>
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
          <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" aria-label="Default select example">
            <option value="Laki-laki" <?= $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('jenis_kelamin') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="agama" class="form-label">Agama</label>
          <select class="form-select" id="agama" name="agama" aria-label="Default select example">
            <option value="islam" <?= $warga->agama == 'islam' ? 'selected' : '' ?>>Islam</option>
            <option value="kristen" <?= $warga->agama == 'kristen' ? 'selected' : '' ?>>Kristen</option>
            <option value="katolik" <?= $warga->agama == 'katolik' ? 'selected' : '' ?>>Katolik</option>
            <option value="budha" <?= $warga->agama == 'budha' ? 'selected' : '' ?>>Budha</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('agama') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="status_perkawinan" class="form-label">Status perkawinan</label>
          <select class="form-select" id="status_perkawinan" name="status_perkawinan" aria-label="Default select example">
            <option value="kawin" <?= $warga->status_perkawinan == 'kawin' ? 'selected' : '' ?>>Kawin</option>
            <option value="belum kawin" <?= $warga->status_perkawinan == 'belum kawin' ? 'selected' : '' ?>>Belum kawin</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('status_perkawinan') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="pekerjaan" class="form-label">Pekerjaan</label>
          <input type="text" class="form-control" value="<?= $warga->pekerjaan ?>" name="pekerjaan" id="pekerjaan">
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('pekerjaan') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" name="alamat" id="">
              <?= $warga->alamat ?>
            </textarea>
          <div id="validationServer03Feedback" class="invalid-feedback d-block">
            <?= form_error('alamat') ?>
          </div>
        </div>


        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
  </div>
</div>
</div>