  <footer class="page-footer blue darken-2">

    <div class="container" style="position:sticky;">

      <div class="row">

        <div class="col l6 s12">

          <h5 class="white-text">Company Bio</h5>

          <p class="grey-text text-lighten-4">We are a team working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>

          <p class="grey-text text-lighten-4">DAAN did not take money for any type of donation. Its end to end transaction where one user donates by his wish and one user receives it by his wish.</p>

          <p class"grey-text text-lighten-4"><b><i>"Be a part of the breakthrough and make someone’s dream come true."</i></b></p>
        </div>
        <div class="col l3 s12">

          <h5 class="white-text">Useful Links</h5>

          <ul>

            <li><a class="white-text" href="our_team.php">Our Team</a></li>

            <li><a class="white-text" href="contact_us.php">Contact Us</a></li>
          </ul>

        </div>

        <div class="col l3 s12 black">

          <h5 class="white-text">News Letter</h5>
          <form id="subscribe">
          <ul>

            <li><input type="email" id="sub_email" placeholder="Email address here" /></li>

            <li><input type="submit" class="btn blue" style="width:100%" value="Subscribe Now" /></li>


          </ul>
        </form>
        </div>

      </div>

    </div>

    <div class="footer-copyright">

      <div class="container">

        Made by <a class="brown-text text-lighten-3" href="http://centralwal.com">centralwal.com</a>

      </div>

    </div>

  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/materialize.js"></script>
  <script src="<?php echo base_url();?>assets/js/init.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/plugins.min.js"></script>
-->      <script type="text/javascript">
  $('#card-alert .close').click(function(){
    $("#card-alert").fadeOut( "slow", function() {
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#subscribe").submit(function(e){
    e.preventDefault()
     $.post("<?php echo base_url();?>index.php/index/newsletter",{user_email:$("#sub_email").val()},function(data, status){
        console.log($("#subscribe").serialize()+"sdfs");
        alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
</body>
</html>
