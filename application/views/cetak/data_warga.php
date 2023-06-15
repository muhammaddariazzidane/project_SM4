<!DOCTYPE html>
<html>

<head>
  <title>Data Warga Desa Tambaksari</title>

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
      background-color: #1a1a1a;
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
      width: 20px;
      text-align: center;
      background-color: #f2f2f2;
      border-right: 2px solid #ddd;
    }

    table tbody td:nth-child(2) {
      font-size: 16px;
      color: #333;
      width: 100px;
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
      width: 120px;
    }

    table tbody tr:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>Data Warga Desa Tambaksari</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Tanggal Lahir</th>
        <th>jenis kelamin</th>
        <th>Alamat</th>
        <th>Agama</th>
        <th>Status perkawinan</th>
        <th>Pekerjaan</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      <?php foreach ($warga as $w) : ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $w->nama ?></td>
          <td><?= $w->nik ?></td>
          <td><?= $w->tgl_lahir ?></td>
          <td><?= $w->jenis_kelamin ?></td>
          <td><?= $w->alamat ?></td>
          <td><?= $w->agama ?></td>
          <td><?= $w->status_perkawinan ?></td>
          <td><?= $w->pekerjaan ?></td>
        </tr>
      <?php endforeach ?>

    </tbody>
  </table>
</body>

</html>