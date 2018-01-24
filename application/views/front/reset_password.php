  <main>
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">Reset Password</h5>
      <div class="section">
      </div>
        <?php $this->load->view('front/layout/alert') ?>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
        <div class="row margin">
          <div class="input-field col s12">
            <input id="new" type="password" name="new" class="validate">
            <label for="new" class="">New Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <input id="new_confirm" type="password" name="new_confirm" class="validate">
            <label for="new_confirm" class="">Confirm Password</label>
          </div>
        </div>
        <?php echo form_input($user_id);?>
        <?php echo form_hidden($csrf); ?>

        <div class="row">
          <div class="input-field col s12">
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Update</button>
          </div>
        </div>
            <br />
          </form>
        </div>
      </div>
    </center>
  </main>
