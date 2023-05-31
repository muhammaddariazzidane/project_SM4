<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= ((isset($title)) ? $title : 'Dashboard') ?>
  </title>
  <link rel="icon" href="<?= base_url('assets/img/logo.svg') ?>">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
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
    <?php if ($this->session->role_id != 3) : ?>

      <!-- sidebar -->
      <?php $this->load->view('partials/dashboard/sidebar') ?>
      <!-- sidebar -->
    <?php endif ?>
    <div class="body-wrapper">
      <!-- header -->
      <?php $this->load->view('partials/dashboard/header') ?>
      <!-- header -->

      <?= $content ?>

    </div>
    <script>
      CKEDITOR.replace('deskripsi');

      // const opt = document.querySelector('#s')
      // const nomi = document.querySelector('#nomi')
      const myAlert = document.querySelector('.alert')
      const formEdit = document.querySelector('#edit-form')

      const img = document.querySelector('#image') //inputan nya
      const imgPreview = document.querySelector('#img-preview') //src nya
      const foto = document.querySelector('#foto') //src nya

      const previewImage = () => {
        const oFReader = new FileReader()
        oFReader.readAsDataURL(img.files[0])
        oFReader.onload = function(oFRevent) {
          foto.classList.remove('d-none')
          foto.src = oFRevent.target.result
        }
      }

      function tes() {
        const select = document.querySelector('#select');
        const nomi = document.querySelector('#nomi');
        switch (select.value) {
          case 'uang':
            nomi.classList.remove('d-none');
            break;
          case 'sembako':
            nomi.classList.add('d-none');
            break;
          default:
            break;
        }
      }

      setTimeout(() => {
        myAlert.classList.toggle('hide-animation')
        setTimeout(() => {
          myAlert.classList.toggle('d-none');
        }, 500);
      }, 3000);

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