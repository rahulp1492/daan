<main>
  <div class="container" style="padding:0px 16px;">
    <div class="section">
      <!--   Icon Section   -->
      <div id="profile-page-header" class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="http://lorempixel.com/1600/900/" alt="user background">                    
        </div>
        <figure class="card-profile-image">
          <img src="<?php echo base_url().$user_profile['pro_img'] ?>" alt="profile image" class="circle z-depth-2 responsive-img activator">
        </figure>
        <div class="card-content">
          <div class="row">                    
            <div class="col s3 offset-s2">                        
              <h4 class="card-title grey-text text-darken-4"><?php echo $user_profile['first_name'] ?></h4>
              <?php 
              if ($user_profile['user_verification']==1) 
                {?>
                  <p class="medium-small grey-text">Verfied User</p>
                  <?php }

                  elseif ($user_profile['user_verification']==0) 
                    { ?>
                      <p class="medium-small grey-text">Not Verfied User</p>
                      <?php }
                      ?>
                    </div>
                    <div class="col s2 center-align">
                      <h4 class="card-title grey-text text-darken-4">0</h4>
                      <p class="medium-small grey-text">Given Donation</p>                        
                    </div>
                    <div class="col s2 center-align">
                      <h4 class="card-title grey-text text-darken-4">0</h4>
                      <p class="medium-small grey-text">Recieve Donation</p>                        
                    </div>                    
                    <div class="col s2 center-align">
                      <h4 class="card-title grey-text text-darken-4">17-10-10</h4>
                      <p class="medium-small grey-text">Active</p>                        
                    </div>                    
                    <div class="col s1 right-align">
                      <a class="btn-floating activator waves-effect waves-light darken-2 right">
                        <i class="large material-icons">info_outline</i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal">
                  <p>
                    <span class="card-title grey-text text-darken-4"><?php echo $user_profile['first_name'] ?> <i class="mdi-navigation-close right"></i></span>

                    <?php 
                    if ($user_profile['user_verification']==1) 
                      {?>
                        <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Verfied</span>
                        <?php }

                        elseif ($user_profile['user_verification']==0) 
                          { ?>
                            <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i>Not Verfied</span>
                            <?php }
                            ?>
                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i><?php echo $user_profile['phone'];?></p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i><?php echo $user_profile['email'];?></p>
                            <p><i class="mdi-social-cake cyan-text text-darken-2"></i><?php echo $user_profile['created_at'];?></p>
                            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i><?php echo $user_profile['address'].",".$user_profile['city'].",".$user_profile['state'].",".$user_profile['pincode'];?></p>
                          </div>
                        </div>

                        <div class="row">
                          <!-- start of side bar-->
                          <div id="profile-page-sidebar" class="col s12 m4 l4">
                            <!-- Profile About  -->
                            <div class="card light-blue">
                              <div class="card-content white-text">
                                <span class="card-title">About Me!</span>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                              </div>                  
                            </div>
                            <!-- Profile About  -->
                            <!-- Profile About  -->
                            <div class="card amber darken-2">
                              <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-social-group-add"></i> 3685</p>
                                <p>Thank you</p>
                              </div>                  
                            </div>
                            <!-- Profile About  -->
                            <!-- Profile Total sell -->
                            <div class="card center-align">
                              <div class="card-content purple white-text">

                              </div>
                              <div class="card-action purple darken-2">
                                <div id="sales-compositebar">Social Media</div>
                              </div>
                            </div>
                          </div>
                          <div class="col s12 l8 m8">
                            <?php
                            foreach ($arr_donations as $row)
                              { ?>

                                <div id="profile-page-wall-post" class="card" style="padding:16px;">
                                  <div class="card-profile-title">
                                    <div class="row">
                                      <div class="col s1">
                                        <img src="<?php echo base_url().$row['pro_img']; ?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                                      </div>
                                      <div class="col s10">
                                        <p class="grey-text text-darken-4 margin"><?php echo $row['first_name']; ?></p>
                                        <span class="grey-text text-darken-1 ultra-small">Shared publicly  -  Date</span>
                                      </div>
                                      <div class="col s1 right-align">
                                        <i class="mdi-navigation-expand-more"></i>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col s12">
                                        <p><?php echo $row['donation_title']; ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-image profile-medium">                          
                                    <img src="http://lorempixel.com/1200/700/" alt="sample" class="responsive-img profile-post-image profile-medium">                        
                                    <span class="card-title"><?php echo $row['donation_title']; ?></span>
                                  </div>
                                  <div class="card-content">
                                    <p><?php echo $row['donation_title']; ?></p>
                                  </div>
                                  <div class="card-action row">
                                    <div class="col s4 card-action-share">
                                      <a class="btn-floating btn waves-effect" href="#"><i class="material-icons">tag_faces</i></a>                          
                                      <a class="btn-floating btn waves-effect" href="#"><i class="material-icons">share</i></a>
                                    </div>
                                  </div>                        
                                </div>
                                <?php }
                                ?>
                              </div>
                              <!--end of side bar-->
                            </div>
                          </div>
                        </div>

                      </main>
