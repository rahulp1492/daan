<div class="col-xm-12 col-sm-4 col-md-4 col-lg-3">
    <div id="doctor-left-bar">
        <div class="left-bar-user">
            <div class="user-ul">
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>doctor-account" <?php echo ($page_name=='Doctor Dashboard')? "class='acti'":''?>>
                            <span>
                                <img src="<?php echo base_url(); ?>images/right-bar-img-1.png" class="right-menu-img" alt="">
                                <img src="<?php echo base_url(); ?>images/right-bar-activ-1.png" class="right-activ-img" alt="">
                            </span>
                            <span>
                                My Account
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>change_password/doctor" <?php echo ($page_name=='Change Password')? "class='acti'":''?>>
                         <img src="<?php echo base_url(); ?>images/right-bar-img-2.png" class="right-menu-img" alt="">
                         <img src="<?php echo base_url(); ?>images/right-bar-activ-2.png" class="right-activ-img" alt=""> Change Password 
                     </a>
                 </li>

                 <li>
                    <a href="<?php echo base_url(); ?>doctor-pet-verification" <?php echo ($page_name=='Doctor Pet Verification')? "class='acti'":''?>><img src="<?php echo base_url(); ?>images/right-bar-img-3.png" class="right-menu-img" alt="">
                        <img src="<?php echo base_url(); ?>images/right-bar-activ-3.png" class="right-activ-img" alt=""> Verification Request </a>
                    </li>

                    <!-- <li>
                    <a href="<?php echo base_url();?>doctor-verified-pets" <?php echo ($page_name=='Verified Pets')? "class='acti'":''?>>
                            <img src="<?php echo base_url(); ?>images/doctor-right-bar4.png" class="right-menu-img" alt="">
                            <img src="<?php echo base_url(); ?>images/doctor-right-bar-active4.png" class="right-activ-img" alt=""> Verified Pets 
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <script type="text/javascript">
    //left-side bar active class script start here
    var pathname = window.location.pathname;
    var globle_last_param = pathname.substring(pathname.lastIndexOf('/') + 1);

    $('.user-ul').find('li &gt; a').each(function(index) {

        var current_url = this.href;
        var current_last_param = current_url.substring(current_url.lastIndexOf('/') + 1);

        if (globle_last_param == current_last_param) {
            $(this).addClass('acti');
        } else {
            $(this).removeClass('acti');
        }
    });
    //left-side bar active class script start here
</script>
</div>
</div>