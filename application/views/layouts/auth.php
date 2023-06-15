<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $title ?>
  </title>
  <link rel="icon" href="<?= base_url('assets/img/logo.svg') ?>">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .hide-animation {
      opacity: 0;
      transition-duration: 2.4s;
      /* durasi animasi 1 detik */
      /* scale: 0; */
      transform: translateY(-500px);
      /* opsi transformasi sesuai kebutuhan */
    }

    .h-screen {
      min-height: 100vh !important;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- sidebar -->
    <!-- sidebar -->

    <!-- header -->
    <!-- header -->

    <?= $content ?>

  </div>
  <script>
    const opt = document.querySelector('#s')
    const nomi = document.querySelector('#nomi')
    const myAlert = document.querySelector('.alert')

    const formEdit = document.querySelector('#edit-form')

    function tes() {
      if (opt.attributes.value = 'sembako') {
        nomi.classList.toggle('d-none')
      }
    }

    setTimeout(() => {
      myAlert.classList.toggle('hide-animation')
      setTimeout(() => {
        myAlert.classList.toggle('d-none');
      }, 500);
    }, 5000);

    const toggleForm = () => {
      formEdit.style.transform = "translateX(0)"
      formEdit.classList.toggle('d-none')

    }
  </script>

  <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url() ?>assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?= base_url() ?>assets/js/dashboard.js"></script>
</body>

</html>