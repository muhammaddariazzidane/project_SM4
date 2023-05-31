<!-- Gallery Section -->
<section class="py-5 mt-5">
  <div class="container">
    <h2 class="section-title text-center mb-5">Pariwisata Desa Tambaksari</h2>
    <div class="row justify-content-center">
      <?php foreach ($wisata as $w) : ?>
        <div class="col-md-4 mb-4">
          <div class="card border-0 shadow rounded-3">
            <img src="<?= base_url('assets/img/wisata/') . $w->foto_pertama ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $w->nama_wisata ?></h5>
              <p class="card-text">
                <!-- cek jumlah isian dari deskripsi -->
                <?= (strlen($w->deskripsi) > 150) ? substr($w->deskripsi, 0, 150) . '...' : $w->deskripsi ?>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url('welcome/detail_wisata/') . $w->id ?>" class="btn btn-dark py-1">Detail</a>
                <small class="text-muted">3 September 2022</small>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>