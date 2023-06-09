<head>
  <title>Bukti Warga Penerima BLT</title>

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f2f2f2;
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
      max-width: 100px;
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
      /* font-weight: bold; */
      font-size: 16px;
      color: #333;
      width: 120px;
      /* text-align: center; */
      /* background-color: #f2f2f2; */
      /* border-right: 2px solid #ddd; */
    }

    table tbody td:nth-child(2) {
      font-size: 16px;
      color: #333;
      width: 120px;
    }

    table tbody td:nth-child(3) {
      font-size: 14px;
      color: #666;
      width: 0px;
    }

    table tbody td:nth-child(4) {
      font-size: 14px;
      color: #666;
    }

    table tbody td:nth-child(5) {
      font-size: 14px;
      color: #666;
      width: 200px;
    }

    table tbody td:nth-child(6) {
      font-size: 14px;
      color: #666;
      width: 60px;
    }

    table tbody tr:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <h1>Bukti Warga Penerima BLT</h1>
  <table>
    <thead>
      <tr>
        <th>Nama</th>
        <th>NIK</th>
        <th>Tanggal Lahir</th>
        <th>jenis kelamin</th>
        <th>Alamat</th>
        <th>Bantuan</th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><?= $penerima->nama ?></td>
        <td><?= $penerima->nik ?></td>
        <td><?= $penerima->tgl_lahir ?></td>
        <td><?= $penerima->jenis_kelamin ?></td>
        <td><?= $penerima->alamat ?></td>
        <td><?= $penerima->nama_bantuan ?></td>
        <td><?= $penerima->nominal ?></td>
      </tr>
      <tr>
        <ul>
          <h4 style="margin-left: -16px;">Cara Pengambilan :</h4>
          <li>Mengunduh dan menyimpan bukti pdf ini</li>
          <li>Datang ke desa</li>
          <li>Perlihatkan bukti pdf kepada panitia pembagian BLT</li>
        </ul>
      </tr>
    </tbody>
  </table>
</body>

</html>