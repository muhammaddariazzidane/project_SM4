<?php if ($this->session->success) : ?>
  <div class="col-lg-6 mt-3">
    <div style="background-color: #4CAF50;" class="alert text-white d-flex align-items-center" role="alert">
      <i class="fas fa-check-circle me-2"></i>
      <div>
        <?= $this->session->success ?>
      </div>
    </div>
  </div>
<?php endif ?>