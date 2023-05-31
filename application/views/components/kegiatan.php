<div class="container py-5">
  <div class="row text-center">
    <h2 class="mb-5 section-title fw-semibold">Kegiatan terbaru</h2>


  </div>
  <div class="row d-flex justify-content-center">
    <?php if ($kegiatan) : ?>
      <?php foreach ($kegiatan as $k) : ?>
        <div class="col-lg-4">
          <div class="card m-2 border-0 shadow ">
            <div class="w-100 mx-auto">
              <img src="<?= base_url('assets/img/kegiatan/') . $k->foto_kegiatan ?>" class="card-img-top object-fit-contain" alt="...">
            </div>
            <div class="card-body ">
              <h4 class="card-title mt-3"><?= $k->nama_kegiatan ?></h4>
              <p class="mb-0"><?= date('d F Y', $k->post_at) ?></p>
              <h5 class="card-text mt-2 text-wrap">
                <!-- cek jumlah isian dari deskripsi -->
                <?= (strlen($k->deskripsi) > 90) ? substr($k->deskripsi, 0, 90) . '...' : $k->deskripsi ?>

              </h5>
              <a href="<?= base_url('welcome/detail/') . $k->id ?>" class="btn btn-success mt-2" style="--bs-btn-padding-y: .35rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;">
                Lihat selengkapnya
              </a>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    <?php else : ?>
      <h4 class="text-center">Belum ada kegiatan terbaru</h4>
    <?php endif ?>
  </div>

</div>