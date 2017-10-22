  <main>
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">"Lets get signup to enjoy happiness of donation"</h5>
      <div class="section"></div>
        <?php $this->load->view('front/layout/alert') ?>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="<?=base_url('registration')?>">
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <input id="first_name" value="" type="text" name="first_name" required="">
                <span class="error" style="color:red;"></span>
                <label for="first_name" class="center-align active">* First Name</label>
              </div>

              <div class="input-field col s12 m6 l6">
                <input id="last_namet" type="text" value="" name="last_name" required="">
                <span class="error" style="color:red;"></span>
                <label for="last_name">* Last Name</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <input id="mail" type="email" class="validate" name="email">
                <label for="mail" class="center-align">* Email Id</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <textarea id="icon_prefix2" class="materialize-textarea" name="address"></textarea>
                <span class="error" style="color:red;"></span>
                <label for="address" class="center-align active">Street / Town</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <input id="phone" type="text" class="validate" name="phone">
                <label for="phone" class="center-align">Phone</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input id="pincode" type="text" value="" name="pincode" required="">
                <span class="error" style="color:red;"></span>
                <label for="pincode">Pincode</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <select name="state">
                  <option value="" disabled selected>Choose State</option>
                  <option value="1">Maharashtra</option>
                </select>
                <label>Select State</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <select name="city">
                  <option value="" disabled selected>Choose City</option>
                  <option value="1">Nashik</option>
                </select>
                <label>Select City</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password" class="">Password</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <input id="password-again" type="password" name="confirm">
                <label for="password-again">Re-type password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <button type="submit" name="btn_register" class="col s12 btn btn-large waves-effect indigo">Register Now</button> 
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
