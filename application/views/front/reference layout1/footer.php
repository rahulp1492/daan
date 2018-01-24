<?php $result = get_details(); ?>
<div class="footer-main">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-4 col-lg-4 abc">
       <div class="subscribe border-none">
        <h4 class="footer-head">About Us <img src="<?=base_url();?>images/arrow-down.png" alt="" /> <span class="clr"></span></h4>
        <div class="open-block-footer">
          <p class="about-us-content">Hello we are Comre. We are here to provide you the best offers through our coupons. Hello we are company... <a href="<?php echo base_url().'about_us' ?>">More</a> 
          </p>
          <br/>
          <div class="footer-menu">
            <?php if($result){ ?>

            <ul>
              <li><a href="#"><i class="fa fa-link"></i> <span class="footer-contact"><?php echo isset($result[0]['website'])? $result[0]['website']:'' ?></span></a></li>
              <li><a href="#"><i class="fa fa-envelope-o"></i> <span class="footer-contact"> <?php echo isset($result[0]['email'])? $result[0]['email']:''?></span></a></li>
              <li><a href="#"><i class="fa fa-phone"></i> <span class="footer-contact"> +91-<?php echo isset($result[0]['mobile_number'])? $result[0]['mobile_number']:''; ?></span></a></li>
              <li><a href="#"><i class="fa fa-map-marker"></i> <span class="footer-contact"> <?php echo isset($result[0]['address'])? $result[0]['address']:''; ?></span></a></li>
            </ul>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 abc">
     <div class="subscribe border-none">
      <h4 class="footer-head">Useful Links <img src="<?=base_url();?>images/arrow-down.png" alt="" /> <span class="clr"></span></h4>
      <div class="open-block-footer footer-menu">
        <ul>
          <li><a href="<?php echo base_url(); ?>"><span class="footer-dash">-</span> Home</a></li>
          <li><a href="<?php echo base_url().'about_us'; ?>"><span class="footer-dash">-</span> About Us</a></li>
          <li><a href="<?php echo base_url().'petstories'; ?>"><span class="footer-dash">-</span> Pet Stories</a></li>
          <li><a href="javascript:void(0)"><span class="footer-dash">-</span> Pet Speciality Care</a></li>
          <li><a href="javascript:void(0)"><span class="footer-dash">-</span> Pet Services</a></li>
          <li><a href="<?php echo base_url().'contact_us'; ?>"><span class="footer-dash">-</span> Contact Us</a></li>
          <li><a href="<?php echo base_url().'faq'; ?>"><span class="footer-dash">-</span> FAQ</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-sm-4 col-md-4 col-lg-4 abc">
    <div class="subscribe">
      <h4 class="footer-head">Subscribe To Mail! <img src="<?=base_url();?>images/arrow-down.png" alt="" /> <span class="clr"></span></h4>
      <div class="open-block-footer">

        <p>Get our Daily email newsletter with Special Services, Updates, Offers and more</p>
        <div class="email-box">
          <!-- <form method="POST" data-parsley-validate> -->
          <input type="email" class="form-control" placeholder="Email Address" id="newsletter_email" name="user_email" data-parsley-required ="true" data-parsley-required-message="User email is required." value="" data-parsley-errors-container="#err_newsletter_email"/>

          <span class="error" id="err_newsletter_email"></span>



          <button type="submit" name="email_submit" id="email_submit"><i class="fa fa-paper-plane"></i></button>
          <!-- </form> -->
        </div>
        <?php if($result){ ?>
        <ul class="social-links visible-xs">
          <li><a href="<?php echo isset($result[0]['fb_url'])? $result[0]['fb_url']:''; ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo isset($result[0]['twitter_url'])? $result[0]['twitter_url']:''; ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo isset($result[0]['google_url'])? $result[0]['google_url']:''; ?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
          <li><a href="<?php echo isset($result[0]['instagram_url'])? $result[0]['instagram_url']:''; ?>"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <?php } ?>
      </div>
      
    </div>  
    <?php if($result){ ?>
    <ul class="social-links hidden-xs">
      <li><a href="<?php echo isset($result[0]['fb_url'])? $result[0]['fb_url']:''; ?>"><i class="fa fa-facebook"></i></a></li>
      <li><a href="<?php echo isset($result[0]['twitter_url'])? $result[0]['twitter_url']:''; ?>"><i class="fa fa-twitter"></i></a></li>
      <li><a href="<?php echo isset($result[0]['google_url'])? $result[0]['google_url']:''; ?>"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
      <li><a href="<?php echo isset($result[0]['instagram_url'])? $result[0]['instagram_url']:''; ?>"><i class="fa fa-instagram"></i></a></li>
    </ul>          
    <?php } ?>
  </div>
</div>
</div>
</div>

<a class="cd-top hidden-xs hidden-sm" href="#0">Top</a>
<div class="footer-copy-right">
  <div class="container">
    Copyright &copy; 2017 <a href="<?php echo base_url(); ?>">101 Tails.</a> All Rights Reserved.
  </div>
</div>
<script type="text/javascript">
  $( function() {
    $( ".footer-head" ).on( "click", function() {
      $(this).toggleClass( "active");
      $(this).next( ".open-block-footer" ).slideToggle("slow");
      $(this).parent(".subscribe").parent(".abc").siblings().find(".open-block-footer").slideUp();   
      $(this).parent(".subscribe").parent(".abc").siblings().children().children().removeClass("active");
    });

    $("#email_submit").on("click", function() {
     <?php  $csrf = array(
       'name' => $this->security->get_csrf_token_name(),
       'hash' => $this->security->get_csrf_hash()); ?>

     $.ajax({
      url: '<?= base_url().'signup/newsletter'?>',
      type:'POST',
      dataType: 'json',
      data: "user_email="+document.getElementById('newsletter_email').value+"&<?=$csrf['name'];?>=<?=$csrf['hash'];?>",
      success:function(response){
        var str=response;
        str=str.replace("<p>","");
        str=str.replace("</p>","");
        $('#err_newsletter_email').html(str);
      }
    });
   });
  } );
</script>
<script type="text/javascript" language="javascript" src="<?=base_url();?>js/backtotop.js"></script>
<script type="text/javascript" language="javascript" src="<?=base_url();?>js/wow.min.js"></script>
<script>
  /*  Animation */ 
  wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) 
    {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
  );
  wow.init();
  if($("#moar").length>0)
  {
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  }
</script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<!--time picker css-->
<script type="text/javascript" src="js/bootstrap-timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/timepicker.css" />
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
        //<!--date and time picker js script-->  
        $(function () {
          $("#datepicker").datepicker();
          $('.timepicker-default').timepicker(); 
          /*$('#basicExample').timepicker();*/
          $('#datetimepicker1').datetimepicker();
          $('input[name="daterange"]').daterangepicker();
        });
      </script>  
      