  <main>
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">"Lets get signup to enjoy happiness of donation"</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
<!--         <div class="row">
          <div class="input-field col s12 center">
            <img src="http://w3lessons.info/logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">W3lessons - Material Design SignUp Form</p>
          </div>
        </div>
      -->
      <div class="row margin">
        <div class="input-field col s12 m6 l6">
          <input id="nam" value="" type="text" name="nam" required="">
          <span class="error" style="color:red;"></span>
          <label for="nam" class="center-align active">* Your Name</label>
        </div>

        <div class="input-field col s12 m6 l6">
          <input id="mail" type="email" value="" name="email" required="">
          <span class="error" style="color:red;"></span>
          <label for="mail">* Email Id</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <input id="username" type="text" class="validate">
          <label for="username" class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email" class="center-align">Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password" class="">Password</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <input id="password-again" type="password">
          <label for="password-again">Re-type password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="col s12 btn btn-large waves-effect indigo">Register Now</button> 
        </div>
        <div class="input-field col s12">
          <p class="margin center medium-small sign-up">Already have an account? <a href="<?= base_url()?>login">Login</a></p>
        </div>
      </div>
      <br />
    </form>
  </div>
</div>
</center>
</main>
