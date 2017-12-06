<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login</title>
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
            <!-- BEGIN Login Form -->
            <form id="form-login" action="<?php echo base_url().ADMIN_CTRL;?>/login" method="post">                
                <?php $this->load->view('admin/alert') ?>

                <h3>Login to your account</h3>
                <hr/>
                <div class="form-group">
                    <div class="controls">
                        <input type="text" name="email" id="email" placeholder="Email" data-rule-required ="true" class="form-control" />
		                     <div style="color:red">
		                    	<?php echo form_error('email');?>
		                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <input type="password" name="password" id="password" placeholder="Password" data-rule-required = "true" data-rule-minlength="6" class="form-control" />
		                   	 <div style="color:red">
		                    	<?php echo form_error('password');?>
		                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary form-control">Sign In</button>
                    </div>
                </div>
            </form>
            <!-- END Login Form -->
        </div>
        <!-- END Main Content -->

<!--basic scripts-->
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/admin/jquery/jquery-2.1.4.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/jquery-cookie/jquery.cookie.js"></script>
<!--page specific plugin scripts-->
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.crosshair.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/sparkline/jquery.sparkline.min.js"></script>
       <!--flaty scripts-->
<script src="<?php echo base_url(); ?>assets/admin/js/flaty.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/flaty-demo-codes.js"></script>
       <!-- ckeditor scripts-->
<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js" type="text/javascript"></script>
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
                $('.goto-forgot').click(function(){
                    goToForm('forgot');
                });
            });
$('#form-forgot').submit(function(e){
e.preventDefault();
});
       </script>
    </body>
</html>
