 <footer>
  <p><?php echo date('Y') ?> © SwaDaan Admin.</p>
</footer>

<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- END Content -->
</div>
<!-- END Container -->


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
<script type="text/javascript">

        $('#search_form').submit(function(){
          if($('#search_name').val()==''){
            $('#search_error').html('* This field is required.');
            return false;
          }
        });
</script>
</body>
</html>