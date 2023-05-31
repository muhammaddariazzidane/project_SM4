<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Data-Warga-Penerima-BLT.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<h1>Data Warga Penerima BLT</h1>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NIK</th>
      <th>Tanggal Lahir</th>
      <th>jenis kelamin</th>
      <th>Alamat</th>
      <th>Bantuan</th>
      <th>Status</th>
      <th>Di ambil</th>
      <th>Tanggal diambil</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach ($penerima as $p) : ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $p->nama ?></td>
        <td><?= $p->nik ?></td>
        <td><?= $p->tgl_lahir ?></td>
        <td><?= $p->jenis_kelamin ?></td>
        <td><?= $p->alamat ?></td>
        <td><?= $p->nama_bantuan ?></td>
        <td><?= $p->status == 1 ? 'Disetujui' : 'Pending' ?></td>
        <td><?= $p->taken == 1 ? 'Sudah' : 'Belum' ?></td>
        <td><?= date('d F Y', ($p->tgl_diambil)) ?></td>
      </tr>
    <?php endforeach ?>

  </tbody>
</table>