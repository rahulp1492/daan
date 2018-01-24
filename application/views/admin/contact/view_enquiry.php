 <!-- BEGIN Content -->
<div id="main-content">
<!-- BEGIN Page Title -->

<style type="text/css">
.box-content.posn-retv{position: relative;}
  .form-horizontal .control-label{padding-top: 0px;}
  
}
</style>

<div class="page-title">
    <div>
        <h1><i class="fa fa-user"></i>  <?php echo ($module_name)? $module_name:'Demo Page'; ?>  </h1>
       <!--  <h4>Simple and advance form elements</h4> -->
    </div>
</div>
<!-- END Page Title-->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo base_url().ADMIN_CTRL;?>/dashboard">Home</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li>
            <i class="fa fa-phone"></i>
            <a href="<?php echo base_url().ADMIN_CTRL;?>/contact"> <?php echo ($module_name)? $module_name:'Demo Page'; ?> </a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active">View Enquiry</li>
    </ul>
</div>
<!-- END Breadcrumb -->
<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Contact Enquiry </h3>
               <!--  <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div> -->
            </div>
      <div class="box-content">
      
       <?php 
        if(count($enquiry)>0)
        {
       ?>   
        <form action="<?php echo base_url().ADMIN_CTRL;?>/user_registration/edit/<?php echo $enquiry[0]['id'];?>" id="validation-form" class="form-horizontal" method="post" > 
           <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="firstname">User Name</label>
              <div class="col-sm-9 col-lg-9 controls">
                <?php echo $enquiry[0]['user_name'];?>
                <!--  <input class="form-control"  type="text" name="firstname" id="firstname" data-rule-required='true' value="<?php echo $view_user_registration_show[0]['user_firstname'];?>"/> -->
               
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="lastname">User Email</label>
              <div class="col-sm-9 col-lg-9 controls">
              <?php echo $enquiry[0]['user_email'];?>
               <!--   <input class="form-control"  type="text" name="middlename" id="middlename" value="<?php echo $view_user_registration_show[0]['user_middlename'];?>"/> -->
               
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="lastname">Message</label>
              <div class="col-sm-9 col-lg-9 controls">
                <?php echo $enquiry[0]['comments'];?>
                <!--  <input class="form-control"  type="text" name="lastname" id="lastname" data-rule-required='true' value="<?php echo $view_user_registration_show[0]['user_lastname'];?>"/> -->
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="lastname">Address</label>
              <div class="col-sm-9 col-lg-9 controls">
                <?php echo $enquiry[0]['user_address'];?>
                <!--  <input class="form-control"  type="text" name="lastname" id="lastname" data-rule-required='true' value="<?php echo $view_user_registration_show[0]['user_lastname'];?>"/> -->
              </div>
           </div>
           <div class="form-group">
           <label class="col-sm-3 col-lg-2 control-label" for="lastname">Pet Category</label>
            <div class="col-sm-9 col-lg-9 controls">
              <?php echo isset($category[0]['category_name'])?$category[0]['category_name']:'';?>
              <!--  <input class="form-control"  type="text" name="lastname" id="lastname" data-rule-required='true' value="<?php echo $view_user_registration_show[0]['user_lastname'];?>"/> -->
            </div>
          </div>           
           <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">

             <!--  <button type="button" name="edit_user" id="edit_user" class="btn btn-primary"><i class="fa fa-check"></i> Back</button>
            -->        
        <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-primary">Back</a></button>
           
            </div>
          </div>
      </form>
      <?php
        }
      ?>
    </div>
  </div>
 </div>
</div>

<!-- <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Addresses </h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
  <?php //echo '<pre>'; print_r($view_user_registration_address);die();?>
  <?php 
  if(count($view_user_registration_address)>0)
  {

  foreach ($view_user_registration_address as $key => $value) {
  ?>   

     <form action="#" id="validation-form" class="form-horizontal" method="post" > 
      
         <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" for="address1">Address Line One</label>
            <div class="col-sm-9 col-lg-9 controls">
            
               <input class="form-control"  disabled="" readonly="" type="text" name="address1" id="address1" value="<?php echo $value['user_address_line1'];?>"/>
             
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" for="lastname">Address Line Two</label>
            <div class="col-sm-9 col-lg-9 controls">
            
               <input class="form-control"  disabled="" readonly="" type="text" name="address2" id="address2" value="<?php echo $value['user_address_line2'];?>"/>
             
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" for="city">City</label>
            <div class="col-sm-9 col-lg-9 controls">
            
               <input class="form-control"  disabled="" readonly="" type="text" name="city" id="city" value="<?php echo $value['city_name'];?>"/>
             
            </div>
         </div>
         
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" for="state">State</label>
            <div class="col-sm-9 col-lg-9 controls">
               <input class="form-control"  disabled="" readonly="" type="text" name="state" id="state" value="<?php echo $value['state_name'];?>"/>
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" for="country">Country</label>
            <div class="col-sm-9 col-lg-9 controls">
               <input class="form-control"  disabled="" readonly="" type="date" name="country" id="country" value="<?php echo $value['country_name'];?>"/>
            </div>
         </div>

         <br/>
         <hr/>
        

              <?php 
              }
              ?>


          <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                 <a href ="<?php echo base_url().ADMIN_CTRL;?>/user_registration/manage"><button type="button" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Go Back</button></a>
              </div>
             </div>
                  </form>
           <?php   
           }  
           else
           {
            echo "<b>No Address Found.</b>";
           } 
           ?> 

            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript">
   jQuery(document).ready(function(){
    
         jQuery("#birthdate").datepicker({
        // dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange:"1950:"+(new Date).getFullYear()
         });
      });
</script>
               
               
                <!-- END Main Content -->