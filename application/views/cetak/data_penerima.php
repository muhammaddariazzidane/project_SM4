<!DOCTYPE html>
<html>

<head>
  <title>Data Warga Penerima BLT</title>

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
      font-weight: normal;
      letter-spacing: 2px;
    }

    table {
      border-collapse: separate;
      border-spacing: 0 10px;
      margin: 50px auto;
      width: 80%;
      max-width: 1000px;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    table thead {
      background-color: green;
      color: #fff;
      font-weight: bold;
      border-bottom: 2px solid #ddd;
    }

    table thead th {
      padding: 20px;
      text-align: left;
      font-size: 16px;
      letter-spacing: 1px;
    }

    table tbody tr {
      background-color: #f8f8f8;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    table tbody td {
      padding: 20px;
      text-align: left;
      font-size: 14px;
      line-height: 1.5;
    }

    table tbody td:nth-child(1) {
      font-weight: bold;
      font-size: 16px;
      color: #333;
      width: 10px;
      text-align: center;
      background-color: #f2f2f2;
      border-right: 2px solid #ddd;
    }

    table tbody td:nth-child(2) {
      font-size: 16px;
      color: #333;
      width: 60px;
    }

    table tbody td:nth-child(3) {
      font-size: 14px;
      color: #666;
      width: 50px;
    }

    table tbody td:nth-child(4) {
      font-size: 14px;
      color: #666;
      width: 75px;
    }

    table tbody td:nth-child(6) {
      font-size: 14px;
      color: #666;
      width: 100px;
    }

    table tbody td:last-child() {
      font-size: 14px;
      color: #666;
      width: 82px;
    }

    table tbody tr:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }
  </style>
</head>

<body>
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
</body>

</html>