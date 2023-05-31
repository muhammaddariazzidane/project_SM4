<footer class="bg-success  text-white pt-4">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div>
          <h class="fw-semibold text-uppercase">Desa tambaksari</h>
          <p class="mb-30 mt-1">Ktr. Desa Tambaksari Tirtajaya, Tambaksari, Kec. Tirtajaya, Karawang, Jawa Barat, kode pos 41357
          <p class="mt-1">

            Email: infotambaksari@gmail.com
            Telp: 08080808
          </p>

          </p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6">
        <div>
          <h5>Sosial media kami</h5>
          <ul class="list-unstyled d-flex align-items-center gap-1">
            <li>
              <div class="d-block text-white text-decoration-none shadow-lg px-2 rounded bg-white">
                <a href="">

                  <i class="bi bi-facebook fs-5 text-primary"></i>
                </a>
              </div>
            </li>
            <li>
              <div class="d-block text-white text-decoration-none shadow-lg px-2 rounded bg-white">
                <a href="">

                  <i class="bi bi-instagram fs-5 text-danger"></i>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6">
        <div>
          <h5>Kritik & Saran</h5>
          <form accept="" method="post">
            <label for="Newsletter" class="form-label">Beri kami kritik & saran</label>
            <input type="text" class="form-control" Placeholder="Lorem, ipsum dolor.">

            <?= $this->session->username ? '<button class="btn btn-warning mt-3" type="submit">Kirim</button>' : '<a href="' . base_url('auth') . '" class="btn btn-primary mt-3">Login</a>' ?>

          </form>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="copyright">
        <p>Desa tambaksari all right reserved</p>
      </div>
    </div>
  </div>
</footer>