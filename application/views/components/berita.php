<section class="hero-section ">
  <div class="container">
    <div class="row justify-content-center mx-auto text-center">
      <div class="col-md-8">
        <h2 class="section-title mb-5">Berita Terbaru</h2>
        <?php if ($berita) : ?>
          <p class="fs-4"><?= $berita[0]->nama_berita ?> </p>
          <!-- <a href="#" class="btn btn-orange">Baca Berita</a> -->
          <img src="<?= base_url('assets/img/berita/') . $berita[0]->foto_berita ?>" alt="Hero Image" class="hero-img object-fit-contain">
          <div class="mt-4">
            <a href="<?= base_url('welcome/detail_berita/') . $berita[0]->id ?>" class="btn btn-orange">Selengkapnya</a>
          </div>
      </div>

    </div>
  </div>
</section>
<section class="news-section pb-5 mb-3">
  <div class="container">
    <div class="row justify-content-center g-5">
      <?php foreach ($berita as $key => $b) : ?>
        <?php if ($key == 0) continue; ?>
        <div class="col-md-4">
          <div class="card">
            <img src="<?= base_url('assets/img/berita/') . $b->foto_berita ?>" class="card-img-top" alt="Gambar Berita">
            <div class="card-body">
              <h5 class="card-title"><?= $b->nama_berita ?></h5>
              <p class="card-text">
                <!-- cek jumlah isian dari deskripsi -->
                <?= (strlen($b->deskripsi) > 150) ? substr($b->deskripsi, 0, 150) . '...' : $b->deskripsi ?>
              </p>
              <a href="<?= base_url('welcome/detail_berita/') . $b->id ?>" class="btn btn-orange">Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <h4>Belum ada berita terbaru</h4>
    <?php endif ?>

    </div>
  </div>
</section>