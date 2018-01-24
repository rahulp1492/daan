<?php
        //site status
$result=get_site_status();

if(empty($result[0]['site_status']) || $result[0]['site_status']=='0')
    redirect(base_url().'maintenance');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Meta data-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php 
    if(isset($meta))
        echo '<meta name="description" content="'.$meta.'"/>';
    ?>
    <!-- Meta data-->
    <!-- ======================================================================== -->
    <title>101-Tails | <?php echo ($page_name)? $page_name:'Demo Page'; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--font-awesome-css-start-here-->
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!--core js-->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
    <!--tabbing js-->
    <script src="<?php echo base_url(); ?>js/parsley.extend.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/parsley.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/responsivetabs.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>css/responsivetabs.css" rel="stylesheet" type="text/css" />
    <!--flexislider js-->
    <script src="<?php echo base_url(); ?>js/jquery.flexisel.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>css/flexislider.css" rel="stylesheet" type="text/css" />
    <!-- main CSS -->
    <link href="<?php echo base_url(); ?>css/101-tails.css" rel="stylesheet" type="text/css" />
    <!-- image over effect css-->
    <link href="<?php echo base_url(); ?>css/set1.css" rel="stylesheet" type="text/css" />
    <!-- animate css-->
    <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/sweetalert.css" rel="stylesheet" type="text/css" />
    <!--common js-->
    <script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/sweetalert-dev.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>js/bootstrap-select.js" type="text/javascript"></script>
    <style type="text/css">
        .error{
            color:red;
        }
    </style>
</head>
<body>

    <div id="main"></div>
    <!--header start-->
    <div class="header-main-block">
        <div class="container">
            <div class="header-menu wow fadeInDown">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" class="img-responsive" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <?php $user_data = user_session_check();

                        if(isset($user_data['user_email']) && $user_data['user_email']!=''){ ?>
                        
                        <div class="top-menu hidden-xs">
                            <ul>
                                <li class="dropdown user-drop-down hidden-xs">
                                    <a class="user-name-section" href="javascript:void(0);" type="button" data-toggle="dropdown">
                                        <?php 
                                        $user_data['record'][0]['profile_image']=isset($user_data['record'][0]['profile_image'])?$user_data['record'][0]['profile_image']:'';

                                        if(file_exists("uploads/user/profile_image/".$user_data['record'][0]['profile_image']) && $user_data['record'][0]['profile_image']!='')
                                        { 
                                            ?>
                                            <span class="user-pic-block"><img src="<?php echo base_url()."uploads/user/profile_image/".$user_data['record'][0]['profile_image']; ?>" alt="" /> </span>
                                            <?php }
                                            else
                                            {
                                                ?>
                                                <span class="user-pic-block"><img src="<?php echo base_url()."uploads/no-image-icon.jpg" ?>" alt="" /> </span>
                                                <?php
                                            }
                                            ?>
                                            
                                            <span class="owner-name"> <?php if(isset($user_data['record']) && sizeof($user_data['record'])>0) 
                                                {   $user_data['record'][0]['user_firstname']=isset($user_data['record'][0]['user_firstname'])?$user_data['record'][0]['user_firstname']:'';

                                                echo ucfirst($user_data['record'][0]['user_firstname']);
                                            } ?>
                                            &nbsp;<?php
                                            $user_data['record'][0]['user_lastname']=isset($user_data['record'][0]['user_lastname'])?$user_data['record'][0]['user_lastname']:'';
                                            
                                            echo ucfirst($user_data['record'][0]['user_lastname']); ?>   
                                        </span>
                                        <span class="arrow-drop-user"><img src="<?php echo base_url()."images/drop-arrow.png" ?>" alt="" /> </span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="ul-arrow-img"><img src="<?php echo base_url()."images/ul-drop-arrow.png" ?>" alt="" /> </li>
                                        <!-- <li><a href="#">Dashboard</a> </li> -->
                                        <?php if($user_data['record'][0]['type']=='user'){ ?>
                                        <li><a href="<?php echo base_url()."account" ?>">My Account</a> </li>
                                        <?php }else{ ?>

                                        <li><a href="<?php echo base_url()."doctor-account" ?>">My Account</a> </li>
                                        <?php }
                                        ?>
                                        <li><a href="<?php echo base_url()."login/logout" ?>">Log Out</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php 
                    }else
                    { ?>
                    <div class="top-menu hidden-xs">
                        <ul>
                            <li><a href="<?php echo base_url()."signup" ?>"><i class="fa fa-pencil"></i> <span>Sign Up</span></a></li>
                            <li><a href="<?php echo base_url()."login" ?>"><i class="fa fa-user"></i> <span>Login</span></a></li>
                        </ul>
                    </div>
                    <?php } ?>    
                    <div class="clearfix"></div>
                    <div class="middle-menu">
                        <ul>
                            <li class="call hidden-xs"><a href="#"><span class="call-img-block"><img src="<?php echo (isset(get_details()[0]['mobile_number'])&&get_details()[0]['mobile_number']!=0)?base_url().'images/phone-icon.png':''; ?>" class="img-responsive" alt=""/></span>
                                <span><?php echo (isset(get_details()[0]['mobile_number'])&&get_details()[0]['mobile_number']!=0)?('(+91)'.get_details()[0]['mobile_number']):'';?></span></a></li>
                                <li class="post-btn"><a class="hvr-back-pulse" href="<?php echo base_url(); ?>post-your-pet  ">Post a Pet</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="menu-icon" onclick="openNav()">&#9776;</span>
        <div class="bottom-menu inner">
            <div class="container">
                <div class="sidenav" id="mySidenav">
                    <a class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="banner-img-block">
                        <img src="<?php echo base_url(); ?>images/logo.png" alt="" />
                    </div>
                    <ul class="min-menu">
                        <li><a href="<?php echo base_url(); ?>"><span class="home-icon"><i class="fa fa-home"></i></span> <span class="home-menu-text">Home</span></a></li>
                        <li class="visible-xs"><a href="login.html">Login</a></li>
                        <li class="visible-xs"><a href="sign-up.html">Signup</a></li>
                        <li><a href="<?php echo base_url();?>all-pets?ad_type=own">Own a Pet</a></li>
                        <li><a href="<?php echo base_url();?>all-pets">Pet Shoppe</a></li>
                        <li><a href="<?php echo base_url(); ?>pet-wellness">Wellness </a></li>
                        <li><a href="<?php echo base_url(); ?>pet-services">Services </a></li>
                        <li><a href="<?php echo base_url();?>all-pets?ad_type=breed">Breeding </a></li>
                        <li><a href="<?php echo base_url(); ?>pet-speciality-care">Specialty Care </a></li>
                        <li><a href="<?php echo base_url().'petstories'?>" class="active">Pet Stories</a></li>
                        <li><a href="<?php echo base_url().'about_us'?>">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
