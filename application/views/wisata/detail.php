<div class="container py-5 my-5">
  <div class="row">
    <div class="col-md-6">
      <img src="<?= base_url('assets/img/wisata/') . $wisata->foto_pertama ?>" alt="Wisata" class="img-fluid">
      <?php if ($wisata->foto_kedua && $wisata->foto_ketiga) : ?>
        <div class="d-flex justify-content-center px-5 mt-2 gap-2">
          <div class="col-md-4 shadow">
            <img src="<?= base_url('assets/img/wisata/') . $wisata->foto_kedua ?>" alt="Wisata" class="img-fluid">
          </div>
          <div class="col-md-4 shadow">
            <img src="<?= base_url('assets/img/wisata/') . $wisata->foto_ketiga ?>" alt="Wisata" class="img-fluid">
          </div>
        </div>
      <?php endif ?>
    </div>
    <div class="col-md-6">
      <h2 class="mb-4"><?= $wisata->nama_wisata ?></h2>
      <p><?= $wisata->deskripsi ?> </p>
    </div>
  </div>
</div>