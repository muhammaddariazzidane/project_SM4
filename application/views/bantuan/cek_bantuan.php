<div class="container pb-5 pt-3 min-h-screen">
  <div class="row justify-content-center">
    <div class="col-lg-5 ">
      <div class="card text-center border-0 shadow">
        <div class="card-header ">
          <h4>Cari penerima BLT</h5>
        </div>
        <form method="post" action="<?= base_url('welcome/cek_penerima') ?>" class="input-group p-3 mb-3">
          <input type="search" value="<?= html_escape($keyword) ?>" autocomplete="off" autofocus name="keyword" class="form-control" placeholder="Masukan NIK" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-warning" type="submit" id="button-addon2">Cari</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container my-5">
    <div class="row d-flex justify-content-center">
      <?php if ($keyword) : ?>
        <?php if ($penerima) : ?>
          <?php if ($penerima[0]->printed == 0) : ?>
            <div class="col-lg-6">
              <div class="card border-0 shadow">
                <div class="card-header text-center fw-bold">
                  <h5>
                    Data penerima BLT
                  </h5>
                </div>
                <div class="card-body d-flex justify-content-start ">

                  <div class="col-lg">
                    <?php foreach ($penerima as $p) : ?>
                      <p class="card-text text-nowrap ">Nama : <?= $p->nama ?></p>
                      <p class="card-text text-nowrap ">Nik : <?= $p->nik ?></p>
                      <p class="card-text text-nowrap ">Tanggal lahir : <?= $p->tgl_lahir ?></p>
                      <p class="card-text text-nowrap ">Jenis kelamin : <?= $p->jenis_kelamin ?></p>
                      <p class="card-text text-nowrap ">Alamat : <?= $p->alamat ?></p>
                      <p class="card-text text-nowrap ">Jenis bantuan : <?= $p->nama_bantuan ?></p>
                      <p class="card-text text-nowrap ">Nominal :<?= $p->nominal ?></p>
                      <?php if ($this->session->username) : ?>
                        <a onclick="alert('Jangan lupa untuk mengunduh bukti cetak nya!')" class="btn text-bg-success" href="<?= base_url('pdf/cetak/') . $p->pID ?>">Cetak Bukti</a>
                      <?php else : ?>
                        <a onclick="return confirm('Untuh melakukan cetak bukti pdf, harus login terlebih dahulu!')" class="btn text-bg-success" href="<?= base_url('auth') ?>">Cetak Bukti</a>
                      <?php endif ?>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
          <?php else : ?>
            <h4 class="text-center">Warga dengan NIK tersebut sudah mengambil BLT</h4>
          <?php endif ?>
        <?php else : ?>
          <h4 class="text-center">Data tidak ditemukan</h4>

        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</div>