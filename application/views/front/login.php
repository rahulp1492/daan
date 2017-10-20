  <main>
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">Please, login into your account</h5>
      <div class="section">
      </div>
        <?php $this->load->view('front/layout/alert') ?>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="<?=base_url()?>authentication/login">
<!--         <div class="row">
          <div class="input-field col s12 center">
            <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">W3lessons - Material Design SignUp Form</p>
          </div>
        </div>
 -->
        <div class="row margin">
          <div class="input-field col s12">
            <input id="email" type="email" name="identity" class="validate">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <input id="password" type="password" name="password" class="validate">
            <label for="password" class="">Password</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Don't have an account? <a href="<?=base_url()?>register">Create Account</a></p>
          </div>
        </div>
            <br />
          </form>
        </div>
      </div>
    </center>
  </main>
