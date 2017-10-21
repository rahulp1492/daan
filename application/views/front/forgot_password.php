  <main>
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">Forgot Password</h5>
      <div class="section">
      </div>
        <?php $this->load->view('front/layout/alert') ?>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="<?=base_url().'forgot-password'?>">
        <div class="row margin">
          <div class="input-field col s12">
            <input id="email" type="email" name="identity" class="validate">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Send</button>
          </div>
        </div>
            <br />
          </form>
        </div>
      </div>
    </center>
  </main>
