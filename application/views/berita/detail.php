<div class="container mt-2 pb-5 px-4  mx-auto">
  <div class="row mx-auto d-flex  justify-content-center">
    <div class="col-lg-8 mb-3">
      <div class="w-100">
        <img src="<?= base_url('assets/img/berita/') . $berita->foto_berita ?>" class="w-100 rounded d-block object-fit-cover" alt="">
      </div>
      <h4 class="my-4 fw-semibold text-center"><?= $berita->nama_berita ?></h4>
      <p class="fs-5 mt-2 lead"><?= $berita->deskripsi ?></p>
      <div class="mt-5 mb-4 d-flex justify-content-between">
        <span><?= $this->db->where('berita_id', $berita->id)->count_all_results('comment_berita') ?> komentar</span>
        <small class="text-muted"><?= date('d F Y', $berita->post_at) ?></small>
      </div>
      <form action="<?= base_url('komentar/store_berita') ?>" method="post">
        <!-- @csrf -->
        <input type="hidden" name="berita_id" value="<?= $berita->id ?>">
        <hr />
        <div class="mb-3">
          <!-- {{-- <label for="exampleFormControlTextarea1" class="form-label">Komentar</label> --}} -->
          <textarea placeholder="tambahkan komentar" name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <?php if ($this->session->username) : ?>
          <!-- @auth -->
          <button type="submit" class="btn btn-primary">komentar</button>
        <?php else : ?>
          <!-- @else -->
          <a class="btn btn-primary" style="opacity: 60%;" href="<?= base_url('auth') ?>">login untuk komentar</a>
        <?php endif ?>
      </form>
      <!-- {{-- komentar --}} -->
      <div class="mt-4">
        <?php foreach ($komentar as $k) : ?>
          <div class="card mb-2 shadow border-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class=" flex-shrink-1">
                  <div class="h-50 w-50 ">

                    <?php if ($k->image == 'default.jpg') : ?>
                      <img src="<?= base_url('assets/img/user/default.jpg') ?>" width="30" class=" rounded d-block object-fit-cover" alt="">
                    <?php else : ?>
                      <img src="<?= base_url('assets/img/user/') . $k->image ?>" width="30" class=" rounded d-block object-fit-cover" alt="">
                    <?php endif ?>


                  </div>
                </div>
                <div class=" w-100">
                  <p class="ps-3 fs-6"><?= $k->body ?>
                  </p>
                </div>
              </div>

            </div>
            <div class="position-absolute bottom-0 end-0">
              <small class="px-2 d-block mb-1">
                <!-- logic menghitung waktu -->
                <?php
                $timeDifference = time() - $k->post_at;
                $result = ($timeDifference < 60) ? $timeDifference . ' detik yang lalu' : (($timeDifference < 3600) ? (floor($timeDifference / 60) . ' menit yang lalu') : (($timeDifference < 86400) ? (floor($timeDifference / 3600) . ' jam yang lalu') : (($timeDifference < 604800) ? (floor($timeDifference / 86400) . ' hari yang lalu') : (($timeDifference < 2592000) ? (floor($timeDifference / 604800) . ' minggu yang lalu') : (($timeDifference < 31536000) ? (floor($timeDifference / 2592000) . ' bulan yang lalu') : (floor($timeDifference / 31536000) . ' tahun yang lalu'))))));
                ?>
                <!-- hasil -->
                <?= $result; ?>

                <!-- ini pakai helper date -->
                <!-- <?= timespan($k->post_at, time(), 2); ?> yang lalu -->

              </small>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>