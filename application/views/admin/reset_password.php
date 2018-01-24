<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Reset Password</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.co and apple-touch-icon.png in the root directory -->
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
    </head>
    <body class="login-page">
        <!-- BEGIN Main Content -->
        <div class="login-wrapper">
            <!-- BEGIN Reset Password Form -->
            <form id="form-login" action="<?php echo base_url();?>admin/login/reset/<?php echo $data;?>" method="post">
            <?php $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()); ?>

                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <h3>Reset Your Password</h3>
                <hr/>

                 <!-- message box fields start -->
                        
                        <?php
                            if($this->session->flashdata('success')!='')
                            {
                        ?>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>Success!</strong><?php echo $this->session->flashdata('success'); ?>
                                </div>
                        <?php
                            } 
                        ?>

                        <?php
                            if($this->session->flashdata('error')!='')
                            {
                        ?>
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>Error!</strong><?php echo $this->session->flashdata('error'); ?>
                                </div>
                        <?php
                            } 
                        ?>

<!--                         <?php
                            if($error!='')
                            {
                        ?>
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <strong>Error!</strong><?php echo $error; ?>
                                </div>
                        <?php
                            } 
                        ?>
 -->                        <!-- message box fields end -->

                <div class="form-group">
                    <div class="controls">
                        <input type="password" name="new_password" id="password" placeholder="New Password" data-rule-required ="true" class="form-control" />
		                     <div style="color:red">
		                    	<?php echo form_error('new_password');?>
		                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <input type="password" name="cnf_password" id="cnf_password" placeholder="Confirm New Password" data-rule-required = "true" data-rule-minlength="6" class="form-control" />
		                   	 <div style="color:red">
		                    	<?php echo form_error('cnf_password');?>
		                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" name="reset" id="submit" class="btn btn-primary form-control">Reset</button>
                    </div>
                </div>
                <hr/>
            </form>
            <!-- END Reset Password Form -->
        </div>
        <!-- END Main Content -->

        <!-- page related scripts added by Nayan -->
        <script src="<?php echo base_url();?>assets/admin/js/admin_validations.js"></script>
         <script src="<?php echo base_url();?>assets/admin/js/jquery-1.11.1.min.js"></script>
       <script src="<?php echo base_url();?>assets/front/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>assets/front/js/additional-methods.min.js"></script>

        <script>
        // just for the demos, avoids form submit
       // jQuery.validator.setDefaults({
       //    debug: true,
       //    success: "valid"
       //  });
        $("#form-login").validate();
        </script>
        <style type="text/css">
            #form-login .error {
            color: red;
            }
        </style>

        <!-- page related scripts end -->

        <!--basic scripts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/admin/assets/jquery/jquery-2.1.4.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function goToForm(form)
            {
                $('.login-wrapper > form:visible').fadeOut(500, function(){
                    $('#form-' + form).fadeIn(500);
                });
            }
            $(function() {
                $('.goto-login').click(function(){
                    goToForm('login');
                });
            });
        </script>
    </body>
</html>
