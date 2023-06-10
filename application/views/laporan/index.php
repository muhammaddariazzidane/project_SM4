<div class="container-fluid">
  <div class="my-3">
    <div class="d-flex justify-content-between flex-wrap mt-5 mb-4">
      <h4 class="">Laporan & riwayat penerima BLT</h4>
      <div class="btn-group">
        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Unduh Laporan
        </button>
        <ul class="dropdown-menu">
          <li>
            <a href="<?= base_url('pdf/cetak_data_penerima') ?>" class="dropdown-item d-flex gap-2"><span>Laporan PDF</span><i style="color: red;" class="fas fs-6 fa-file-pdf"></i></a>
          </li>
          <li>
            <a href="<?= base_url('excel/cetak_data_penerima') ?>" class="dropdown-item d-flex gap-2"><span>Laporan Excel</span><i style="color: green;" class="fas fs-6 fa-file-excel"></i></a>
          </li>
          <li>
            <a href="<?= base_url('pdf/cetak_riwayat_penerima') ?>" class="dropdown-item d-flex gap-2 position-relative"><span>Riwayat penerima</span><i style="color: red;" class="fas fs-6 fa-file-pdf"></i>
            </a>
          </li>
          <li>
            <a href="<?= base_url('excel/cetak_riwayat_penerima') ?>" class="dropdown-item d-flex gap-2"><span>Riwayat penerima</span><i style="color: green;" class="fas fs-6 fa-file-excel"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <?php if ($riwayat) : ?>
      <div class="table-responsive">
        <table class="table table-bordered rounded-4 text-center table-hover shadow">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIK</th>
              <th scope="col">Tgl Lahir</th>
              <th scope="col">Jenis kelamin</th>
              <th scope="col">Nama Bantuan</th>
              <th scope="col">Tanggal diambil</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($riwayat as $p) : ?>
              <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $p->nama ?></td>
                <td><?= $p->nik ?></td>
                <td><?= $p->tgl_lahir ?></td>
                <td><?= $p->jenis_kelamin ?></td>
                <td><?= $p->nama_bantuan ?></td>
                <td><?= date('d F Y', $p->tgl_diambil) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    <?php else : ?>
      <h3 class="text-center mt-5">Belum ada riwayat penerima BLT</h3>
    <?php endif ?>
  </div>
</div>