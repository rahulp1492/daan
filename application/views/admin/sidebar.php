<?php
$class  = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<div class="container" id="main-container">
    <div id="sidebar" class="navbar-collapse collapse">
        <!-- BEGIN Navlist -->
        <ul class="nav nav-list">
            <!-- END Search Form -->
            <li <?php if($class=='dashboard'){ echo 'class="active"';}?>>
                <a href="<?php echo base_url().ADMIN_CTRL;?>/dashboard">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li <?php if($method=='banner'){ echo 'class="active"';}?>>
                <a href="<?php echo base_url().ADMIN_CTRL;?>/dashboard/banner">
                    <i class="fa fa-cog"></i>
                    <span>Front Banner</span>
                </a>
            </li>
           
            <li <?php if($class=='user' || $class=='model' ||  $class=='color' && ($method =='add' || $method =='edit' || $method =='manage')){ echo 'class="active"';}?>>
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>
                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li <?php if($class=='model' && ($method =='manage' || $method=='edit')){ echo 'class="active"';}?>><a href="<?php echo base_url().ADMIN_CTRL;?>/user">Manage</a></li>
                </ul>
                <!-- END Submenu -->
            </li>
            <li <?php if($class=='contact'){ echo 'class="active"';}?>>
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-phone"></i>
                    <span>Contact Enquiry</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>
                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li><a href="<?php echo base_url().ADMIN_CTRL;?>/contact">Manage</a></li>
                </ul>
                <!-- END Submenu -->
            </li>
            <li <?php if($class=='faq'){ echo 'class="active"';}?>>
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-question-circle"></i>
                    <span>Faq</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo base_url().ADMIN_CTRL;?>/faq">Manage</a></li>
                </ul>
                <!-- END Submenu -->
            </li>
            <li <?php if($class=='newsletter'){ echo 'class="active"';}?>>
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span>News Letter</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>
                <ul class="submenu">
                    <!-- BEGIN Submenu -->

                    <li><a href="<?php echo base_url().ADMIN_CTRL;?>/newsletter">Manage</a></li>
                </ul>
                <!-- END Submenu -->
            </li>
            <div id="sidebar-collapse" class="visible-lg">
                <i class="fa fa-angle-double-left"></i>
            </div>
            <!-- END Sidebar Collapse Button -->
        </div>
<!-- END Sidebar -->