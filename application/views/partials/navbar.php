<nav class="navbar sticky-top mb-1 navbar-expand-lg bg-success py-2 navbar-dark" x-data='{open : false}'>
  <div class="container">
    <div class="d-flex  align-items-center ">
      <div style="width: 3.3rem">
        <img src="<?= base_url('assets/img/logo.svg') ?>" class="img-fluid" alt="">
      </div>
      <div class="d-flex flex-column">
        <span class="text-white fs-5 fw-semibold text-uppercase ms-2">Desa Tambaksari</span>
        <span class="text-white ms-2 text-uppercase">Kec. tirtajaya <br> kab. karawang</span>
      </div>
    </div>
    <button @click="open = ! open" class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas  text-white fs-2" x-bind:class="open ? 'fa-times' : 'fa-bars'"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white " aria-current="page" href="<?= base_url('/') ?>">Beranda</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile Desa
          </a>
          <ul class="dropdown-menu border-0 shadow">
            <li><a class="dropdown-item" href="#sejarah">Sejarah desa</a></li>
            <li><a class="dropdown-item" href="#visi-misi">Visi Misi</a></li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informasi
          </a>
          <ul class="dropdown-menu border-0 shadow">
            <li><a class="dropdown-item" href="<?= base_url('welcome/berita') ?>">Berita terbaru</a></li>
            <li><a class="dropdown-item" href="<?= base_url('welcome/kegiatan') ?>">Kegiatan terbaru</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " aria-current="page" href="<?= base_url('welcome/cek_penerima') ?>">BLT</a>
        </li>
        <?= ($this->session->username && $this->session->role_id != 3) ? '<li class="nav-item"><a class="nav-link text-white " aria-current="page" href="' . base_url('dashboard') . '">Dashboard</a></li>' : ''; ?>
        <?= ($this->session->username && $this->session->role_id == 3) ? '<li class="nav-item"><a class="nav-link text-white " aria-current="page" href="' . base_url('profile') . '">Profile</a></li>' : '' ?>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item py-2">
          <a href="<?= $this->session->username ? base_url('auth/logout') : base_url('auth') ?>" class="btn <?= $this->session->username ? 'btn-danger' : 'btn-primary' ?>">
            <?= $this->session->username ? 'Logout' : 'Login' ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>