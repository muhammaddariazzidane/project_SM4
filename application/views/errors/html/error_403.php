<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Page Not Found</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"> -->
  <style>
    /* Custom styles for 404 page */
    body {
      background-color: #f9fafb;
    }

    .error-template {
      text-align: center;
      padding: 40px 15px;
    }

    .error-actions {
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .error-actions .btn {
      margin-right: 10px;
    }

    h1 {
      font-size: 8rem;
      font-weight: bold;
      margin-bottom: 0;
    }

    h2 {
      font-size: 3rem;
      font-weight: bold;
      margin-top: 0;
    }

    .error-details {
      margin-top: 20px;
      font-size: 1.5rem;
      color: #737373;
    }

    /* .btn-primary {
      background-color: #00A1FF;
      border-color: #00A1FF;
    }

    .btn-primary:hover {
      background-color: #008CD6;
      border-color: #008CD6;
    }

    .btn-secondary {
      background-color: #FFB800;
      border-color: #FFB800;
    }

    .btn-secondary:hover {
      background-color: #FFA200;
      border-color: #FFA200;
    } */
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="error-template">
          <h1 style="color: red;">403</h1>
          <h2 style="color:red;">Akses Dilarang !!</h2>

          <div class="error-actions">
            <a href="<?= base_url('/') ?>" class="btn btn-primary btn-lg p-3">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>