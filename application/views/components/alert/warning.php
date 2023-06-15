<?php if ($this->session->warning) : ?>
  <div class="col-lg-6 mt-3">
    <div style="background-color: #FFC107;" class="alert text-white d-flex align-items-center" role="alert">
      <i class="fas fa-exclamation-triangle me-2"></i>
      <div>
        <?= $this->session->warning ?>
      </div>
    </div>
  </div>
<?php endif ?>