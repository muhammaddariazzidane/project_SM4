<?php if ($this->session->info) : ?>
  <div class="col-lg-6 ">
    <div style="background-color: #2196F3;" class="alert text-white d-flex align-items-center" role="alert">
      <i class="fas fa-info-circle me-2"></i>
      <div>
        <?= $this->session->info ?>
      </div>
    </div>
  </div>
<?php endif ?>