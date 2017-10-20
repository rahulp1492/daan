  <?php
    if($this->session->flashdata('success')!='')
    {
  ?>
  <div id="card-alert" class="card green lighten-5">
    <div class="card-content green-text">
      <p>SUCCESS : <?php echo $this->session->flashdata('success'); ?></p>
    </div>
    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <?php
    }
  ?>
  <?php
    if($this->session->flashdata('danger')!='')
    {
  ?>
  <div id="card-alert" class="card red lighten-5">
    <div class="card-content red-text">
      <p>DANGER : <?php echo $this->session->flashdata('danger'); ?></p>
    </div>
    <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <?php
    }
  ?>
  <?php
    if($this->session->flashdata('warning')!='')
    {
  ?>
  <div id="card-alert" class="card orange lighten-5">
    <div class="card-content orange-text">
      <p>WARNING : <?php echo $this->session->flashdata('warning'); ?></p>
    </div>
    <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <?php
    }
  ?>
  <?php
    if($this->session->flashdata('news')!='')
    {
  ?>
  <div id="card-alert" class="card light-blue lighten-5">
    <div class="card-content light-blue-text">
      <p>NEWS : <?php echo $this->session->flashdata('news'); ?></p>
    </div>
  </div>
  <?php
    }
  ?>
  <?php
    if($this->session->flashdata('info')!='')
    {
  ?>
  <div id="card-alert" class="card deep-purple lighten-5">
    <div class="card-content deep-purple-text">
      <p>INFO : <?php echo $this->session->flashdata('info'); ?></p></p>
    </div>
    <button type="button" class="close deep-purple-text" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <?php
    }
  ?>