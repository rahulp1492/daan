  <main>
    <center>
      <div class="section"></div>
<!--       <h5 class="indigo-text">"Lets get signup to enjoy happiness of donation"</h5>
 -->      <div class="section"></div>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <?php $this->load->view('front/layout/alert')?>

        <?php if (sizeof($record)) {?>
          <form class="col s12" method="post" action="<?=base_url('user/profile')?>">
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <input id="first_name" value="<?php echo $record['first_name'] ?>" type="text" name="first_name" required="">
                <span class="error" style="color:red;"></span>
                <label for="first_name" class="center-align active">* First Name</label>
              </div>

              <div class="input-field col s12 m6 l6">
                <input id="last_namet" type="text" value="<?php echo $record['last_name'] ?>" name="last_name" required="">
                <span class="error" style="color:red;"></span>
                <label for="last_name">* Last Name</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <input id="mail" readonly value="<?php echo $record['email'] ?>">
                <label for="mail" class="center-align">* Email Id</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12">
                <textarea id="icon_prefix2" class="materialize-textarea" name="address" required><?php echo $record['address'] ?></textarea>
                <span class="error" style="color:red;"></span>
                <label for="address" class="center-align active">*Street / Town</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <input id="phone" type="text" class="validate" name="phone" value="<?php echo $record['phone'] ?>">
                <label for="phone" class="center-align">Phone</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input id="pincode" type="text" value="<?php echo $record['pincode'] ?>" name="pincode" required="">
                <span class="error" style="color:red;"></span>
                <label for="pincode">* Pincode</label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m6 l6">
                <select name="state">
                  <option value="" disabled selected>* Choose State</option>
                  <option value="1" <?=(isset($record['state']) && $record['state'] == '1') ? 'selected' : ''?>>Maharashtra</option>
                </select>
                <label>Select State</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <select name="city">
                  <option value="" disabled selected>* Choose City</option>
                  <option value="1" <?=(isset($record['city']) && $record['city'] == '1') ? 'selected' : ''?>>Nashik</option>
                </select>
                <label>Select City</label>
              </div>
            </div>
            <?php if($record['user_verification']!='1'){ ?>
            <div class="row margin">
              <input type="checkbox" class="filled-in" id="filled-in-box" name="user_verification" value="1" />
              <label for="filled-in-box">Check For UID Verification</label>
            </div>
            <?php } ?>
            <div class="row">
              <div class="input-field col s12">
                <button type="submit" name="user_edit" class="col s12 btn btn-large waves-effect indigo">Update</button>
              </div>
              </div>
            <br />
          </form>
          <?php }?>
        </div>
      </div>
    </center>
  </main>
