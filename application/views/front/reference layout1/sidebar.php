<div id="left-bar"><div class="left-bar-user">
    <div class="user-ul">
        <ul>
            <li>
                <a <?php echo ($page_name=='Account Update')? "class='acti'":''; ?> href="<?php echo base_url('account');?>">
                    <img src="<?php echo base_url('images/right-bar-img-1.png'); ?>" class="right-menu-img" alt="">
                    <img src="<?php echo base_url('images/right-bar-activ-1.png');?>" class="right-activ-img" alt=""> My Account
                </a>
            </li>

            <li>
                <a <?php echo ($page_name=='Change Password')? "class='acti'":''; ?>  href="<?php echo base_url('change_password');?>"><img src="<?php echo base_url('images/right-bar-img-2.png');?>" class="right-menu-img" alt="">
                    <img src="<?php echo base_url('images/right-bar-activ-2.png'); ?>" class="right-activ-img" alt=""> Change Password </a>
                </li>

                <li>
                    <a <?php echo ($module_name=='Pet')? "class='acti'":''; ?> href="<?php echo base_url('post-your-pet');?>"><img src="<?php echo base_url('images/right-bar-img-3.png');?>" class="right-menu-img" alt="">
                        <img src="<?php echo base_url('images/right-bar-activ-3.png');?>" class="right-activ-img" alt=""> Post A Pet </a>
                    </li>
                    <li>
                        <a <?php echo ($module_name=='View Pets')? "class='acti'":''; ?> href="<?php echo base_url('view-your-pets');?>"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Your Pets </a>
                    </li>

                    <li>
                        <a <?php echo ($module_name=='View Interest')? "class='acti'":''; ?> href="<?php echo base_url('view-your-interest');?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Your Interest </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url()?>enquiry" <?php echo ($module_name=='Enquiry')? "class='acti'":''; ?>><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Pet Enquiry </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url()?>doctor_verification" <?php echo ($page_name=='Doctor Verification')? "class='acti'":''; ?>><img src="<?php echo base_url('images/right-bar-img-4.png');?>" class="right-menu-img" alt="">
                            <img src="<?php echo base_url('images/right-bar-activ-4.png'); ?>" class="right-activ-img" alt=""> Doctor Verification </a>
                        </li>

                        <li>
                            <a <?php echo ($module_name=='Subscription')? "class='acti'":''; ?> href="<?php echo base_url('plan');?>"><img src="<?php echo base_url('images/right-bar-img-5.png');?>" class="right-menu-img" alt="">
                                <img src="<?php echo base_url('images/right-bar-activ-5.png');?>" class="right-activ-img" alt=""> Subscription Plan </a>
                            </li>
                            <li>
                                <a <?php echo ($module_name=='Add Pet Story')? "class='acti'":''; ?>  href="<?php echo base_url('blog');?>"><img src="<?php echo base_url('images/right-bar-img-6.png');?>" class="right-menu-img" alt="">
                                    <img src="<?php echo base_url('images/right-bar-activ-6.png" class="right-activ-img');?>" alt=""> Submit Story/Blog </a>
                                </li>
                                
                                <li class="dropdown">
                                    <a <?php echo ($module_name=='Wishlist')? "class='acti'":''; ?> href="<?php echo base_url('wishlist');?>" class="dropbtn"><img src="<?php echo base_url('images/wishlist-icon.png');?>" class="right-menu-img" alt="" />
                                        <img src="<?php echo base_url('images/wishlist-icon-active.png');?>" class="right-activ-img" alt="" /> View Wishlist <i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-content">
                                        <a href="<?php echo base_url('wishlist');?>"><i class="fa fa-long-arrow-right"></i> Pet Wishlist</a>
                                        <a href="<?php echo base_url('blogwishlist');?>"><i class="fa fa-long-arrow-right"></i> Blog Wishlist</a>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <?php $result_count = get_notification();?>
                                    <a <?php echo ($module_name=='Notification')? "class='acti'":''; ?> href="<?php echo base_url('usernotification');?>" class="dropbtn"><img src="<?php echo base_url('images/right-bar-img8.png');?>" class="right-menu-img" alt="" />
                                        <img src="<?php echo base_url('images/right-bar-activ8.png');?>" class="right-activ-img" alt="" /> Notification<span><?php echo ($result_count['notification_count'])? "(".$result_count['notification_count'].")" : ""; ?></span><i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-content">
                                            <?php if($result_count['setting'][0]['interest_notification']=="on"){ ?>
                                            <a href="<?php echo base_url().'usernotification/interest';?>"><i class="fa fa-long-arrow-right"></i> Interest<span><?php echo ($result_count['interest'])? "(".$result_count['interest'].")" : ""; ?></span></a>
                                            <?php }//end if ?>
                                            <?php if($result_count['setting'][0]['verify_notification']=="on"){ ?>
                                            <a href="<?php echo base_url().'usernotification/verification';?>"><i class="fa fa-long-arrow-right"></i> Doctor Verification<span><?php echo ($result_count['verification'])? "(".$result_count['verification'].")" : ""; ?></span></a>
                                            <?php }//end if ?>
                                            <?php if($result_count['setting'][0]['breeding_notification']=="on"){ ?>
                                            <a href="<?php echo base_url().'usernotification/petbreeding';?>"><i class="fa fa-long-arrow-right"></i> Pet Breeding<span><?php echo ($result_count['petbreeding'])? "(".$result_count['petbreeding'].")" : ""; ?></span></a>
                                            <?php }//end if ?>
                                            <?php if($result_count['setting'][0]['other_notification']=="on"){ ?>
                                            <a href="<?php echo base_url().'usernotification/other';?>"><i class="fa fa-long-arrow-right"></i> Other<span><?php echo ($result_count['other'])? "(".$result_count['other'].")" : ""; ?></span></a>
                                            <?php }//end if ?>
                                            <a href="<?php echo base_url('usernotification');?>"><i class="fa fa-long-arrow-right"></i> Setting</a>
                                        </div>
                                    </li>
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
</script></div>