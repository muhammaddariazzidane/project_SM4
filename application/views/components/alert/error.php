<?php if (validation_errors()) : ?>
  <?php if ($this->session->error) : ?>
    <div class="col-lg-6 mt-3">
      <div style="background-color: red;" class="alert text-white d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <div>
          <?= $this->session->error ?>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php endif ?>