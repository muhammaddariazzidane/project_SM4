<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Resmi Desa Tambaksari - Tirtajaya</title>
  <link rel="icon" href="<?= base_url('assets/img/logo.svg') ?>">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Mulish', sans-serif;
    }

    .min-h-screen {
      min-height: 100vh !important;
    }

    /* Custom CSS for news section */
    .news-section {
      /* background-color: #f9f9f9; */
      padding: 20px 0;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      color: #333;
    }

    .card {
      border: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    /* .card:hover {
      transform: translateY(-10px);
    } */

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      padding: 20px;
    }

    .card-text {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    .btn-orange {
      background-color: #FF8C00;
      border: none;
      color: white;
    }

    .btn-orange:hover {
      background-color: #FFA500;
      color: white;
      opacity: 90;
    }

    .btn-orange:focus {
      box-shadow: none;
    }

    /* CSS for hero section */
    .hero-section {
      /* background-color: #333; */
      /* color: #fff; */
      padding: 80px 0;
    }

    .hero-title {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .hero-subtitle {
      font-size: 24px;
      margin-bottom: 40px;
    }

    .hero-img {
      /* max-width: 100%; */
      width: 100%;
      max-height: 22rem;
      /* background-color: black; */
      /* object-fit: ; */
    }

    /* CSS for news section */
    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }

    .card-text {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }
  </style>

</head>

<body>
  <!-- nav -->
  <?php $this->load->view('partials/navbar') ?>
  <!-- nav -->
  <?= $content ?>

  <?php $this->load->view('partials/footer') ?>

  <script>
    // const select = document.querySelector('#alerts')
    const opt = document.querySelector('#s')
    const nomi = document.querySelector('#nomi')



    function tes() {
      if (opt.attributes.value = 'sembako') {

        nomi.classList.toggle('d-none')
      }
    }
    const opt2 = document.querySelector('#s2')
    const nomi2 = document.querySelector('#nomi2')

    function tes2() {
      if (opt2.attributes.value = 'sembako') {
        // console.log(opt.attributes.value);
        nomi2.classList.toggle('d-none')
      }
    }
  </script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>

</body>

</html>