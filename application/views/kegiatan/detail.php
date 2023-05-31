<div class="container py-4">
  <div class="row">

    <div class="col-md-8 mx-auto">
      <div class="card border-0 shadow rounded-3">
        <img src="<?= base_url('assets/img/kegiatan/') . $kegiatan->foto_kegiatan ?>" class="card-img-top" alt="Blog Image">
        <div class="card-body">
          <h5 class="card-title"><?= $kegiatan->nama_kegiatan ?></h5>
          <p class="card-text">
            <?= $kegiatan->deskripsi ?>
          </p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">Written by <?= $kegiatan->username ?></small>
            <small class="text-muted"><?= date(' d F Y', $kegiatan->post_at) ?>
            </small>
          </div>
        </div>
      </div>
      <h5 class="mt-5">Beri komentar</h5>
      <div class="card mb-5 border-0 shadow rounded-3 mt-4">
        <div class="card-body">

          <form action="<?= base_url('komentar/store_kegiatan') ?>" method="post">
            <input type="hidden" name="kegiatan_id" value="<?= $kegiatan->id ?>">
            <div class="mb-3">
              <!-- <label for="message" class="form-label">Komentar</label> -->
              <textarea class="form-control" placeholder="Berikan komentar" id="body" name="body" rows="3" required></textarea>
            </div>
            <?php if ($this->session->userdata('username')) : ?>
              <button type="submit" class="btn btn-primary">Komentar</button>
            <?php else : ?>
              <a class="btn btn-primary" style="opacity: 60%;" href="<?= base_url('auth') ?>">login untuk komentar</a>
            <?php endif ?>
          </form>
        </div>
      </div>
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

              </small>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>