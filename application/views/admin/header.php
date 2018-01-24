<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page_title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- image upload css-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!--base css styles-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!--flaty css styles-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/flaty.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/flaty-responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.css">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/img/favicon.png">
        <style type="text/css">
            .error{
                color: #FF0000;
            }
        </style>
            <script type="text/javascript">
                var site_url = '<?php echo base_url() . ADMIN_CTRL; ?>';
            </script>
    </head>
    <body>

        <!-- BEGIN Navbar -->
        <div id="navbar" class="navbar">
            <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="#">
                <small>
                    <i class="fa fa-desktop"></i>
                   SwaDaan Admin
                </small>
            </a>
            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">


                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <img class="nav-user-photo" src="<?php 
                        $arr_user = $this->session->userdata('arr_user');
                        echo base_url(); ?>uploads/admin/profile/<?php echo $arr_user['pro_img'] ?>" />
                        <span class="hhh" id="user_info">
                            <?php $arr_user = $this->session->userdata('arr_user');
                            echo $arr_user['first_name'];
                            ?>
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <!-- BEGIN User Dropdown -->
                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">

                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() . ADMIN_CTRL ?>/logout">
                                <i class="fa fa-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                    <!-- BEGIN User Dropdown -->
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!-- END Navbar -->