 <!-- BEGIN Content -->
 <div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-key"></i> Change Password</h1>
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
            <li class="active">
               <!-- <i class="fa fa-key"></i> -->
               <a href="<?php echo base_url().ADMIN_CTRL;?>/password">Change Password</a>
           </li>
       </ul>
   </div>
   <!-- END Breadcrumb -->
   <!-- message box fields start -->
   <?php
   if($this->session->flashdata('success')!='')
   {
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">×</button>
        <strong></strong><?php echo $this->session->flashdata('success'); ?>
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


<div class="row">
    <div class="col-md-12">
      <div class="box ">
        <div class="box-title">
          <h3><i class="fa fa-table"></i>Change Password</h3>

      </div>
      <div class="box-content">
        <form action="<?php echo base_url().ADMIN_CTRL;?>/password/change_password" method="post" name="frm_change_password" id="validation-form" class="form-horizontal">

            <?php $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()); ?>

                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Current password<span style="color:red">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <input type="password"  placeholder="Current password" data-rule-required="true"  name="current_password" data-original-title="Current Password" id= "current_password" class="form-control show-tooltip" />
                        <div style="color:red;">
                            <?php echo form_error('current_password');?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">New password<span style="color:red">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                    <input type="password"  placeholder="New password" data-rule-required="true" data-rule-minlength="6"  name="new_password" data-original-title="New Password" id= "new_password" class="form-control show-tooltip"/>
                        <div style="color:red;">
                            <?php echo form_error('new_password');?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Re-type new password<span style="color:red">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <input type="password"  placeholder="Re-type new password" data-rule-required="true" data-rule-minlength="6"  data-rule-equalto="#new_password"  name="confirm_password" data-original-title="Re-type New Password" id= "confirm_password" class="form-control show-tooltip" />
                        <div style="color:red;">
                            <?php echo form_error('confirm_password');?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                        <input type="submit" name="submit" id="btn_submit" value="Submit" class="btn btn-primary">
                        <a href="<?php echo base_url().ADMIN_CTRL;?>/dashboard"><button type="button" class="btn">Cancel</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- END Main Content -->
