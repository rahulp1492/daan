<div class="row">
  <div class="col-md-12">
    <?php
  if ($this->session->flashdata('warning') != '') {
      ?>
  <div class="alert alert-warning">
  <button class="close" data-dismiss="alert">×</button>
  <!-- <strong>Warning!</strong> --> <?php echo $this->session->flashdata('warning'); ?>
  </div>
    <?php
  }
  ?>

    <?php
  if ($this->session->flashdata('success') != '') {
      ?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <!-- <strong>Success!</strong> --> <?php echo $this->session->flashdata('success'); ?>
  </div>
    <?php
  }
  ?>
    <?php
  if ($this->session->flashdata('info') != '') {
      ?>
  <div class="alert alert-info">
  <button class="close" data-dismiss="alert">×</button>
  <!-- <strong>Info!</strong> --> <?php echo $this->session->flashdata('info'); ?>
  </div>
    <?php
  }
  ?>
    <?php
  if ($this->session->flashdata('danger') != '') {
      ?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <!-- <strong>Error!</strong> --> <?php echo $this->session->flashdata('danger'); ?>
  </div>
    <?php
  }
  ?>
  </div>
</div>