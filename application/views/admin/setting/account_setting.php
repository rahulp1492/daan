 <!-- BEGIN Content -->
 <div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-cog"></i><?php echo isset($module_name)? $module_name:'Demo Page'; ?></h1>
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

                <a href="<?php echo base_url().ADMIN_CTRL;?>/account"><?php echo isset($module_name)? $module_name:'Demo Page'; ?></a>
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
    <?php
    if(isset($error)&&$error!='')
    {
        ?>
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong><?php echo $error; ?>
        </div>
        <?php
    } 
    ?>
    <!-- message box fields end -->
    <!-- BEGIN Main Content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo isset($module_name)? $module_name:'Demo Page'; ?></h3>
            </div> 
            <?php if(isset($arr_account_setting) && sizeof($arr_account_setting)>0)
            {
                ?>
                <div class="box-content">
                    <form action="<?php echo base_url().ADMIN_CTRL;?>/account/edit_profile" method="post" id="validation-form" name="frm_admin_profile" enctype="multipart/form-data" class="form-horizontal">

                       <?php  $csrf = array(
                         'name' => $this->security->get_csrf_token_name(),
                         'hash' => $this->security->get_csrf_hash()); ?>

                         <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                         <div class="col-sm-12">
                             <div class="form-group col-sm-6">
                                 <label class="col-sm-4 col-lg-4 control-label">Image Upload</label>
                                 <div class="col-sm-8 col-lg-8 controls">
                                   <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                     <img src="<?php echo base_url();?>uploads/admin/profile_image/<?php echo ($arr_account_setting[0]['profile_image'])? $arr_account_setting[0]['profile_image']:'no-image-icon.jpg'  ?>" alt="" />
                                 </div>
                                 <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                 <div>
                                     <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                     <span class="fileupload-exists">Change</span>
                                     <input type="file" name="profile_img" id="profile_img" class="default" /></span>
                                     <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-12">
                     <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">First Name<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input class="form-control show-tooltip" type="text" value="<?php if(isset($arr_account_setting[0]['first_name'])) { echo $arr_account_setting[0]['first_name']; } ?>" name="first_name" id="first_name" data-rule-required="true" data-original-title="Add First Name" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('first_name');?>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Last Name<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true" value="<?php if(isset($arr_account_setting[0]['last_name'])) { echo $arr_account_setting[0]['last_name']; } ?>" name="last_name" class="form-control show-tooltip" data-original-title="Add Last Name" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('last_name');?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">

                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Gender</label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="male" <?php if($arr_account_setting[0]['gender']=='male') { ?> checked <?php } ?> /> Male
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="female" <?php if($arr_account_setting[0]['gender']=='female') { ?> checked <?php } ?>/> Female
                            </label> 
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Mobile Number<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true" value="<?php if(isset($arr_account_setting[0]['mobile_number'])) { echo $arr_account_setting[0]['mobile_number']; } ?>" name="mobile_number" class="form-control show-tooltip" data-original-title="Add Mobile Number" data-trigger="hover" />
                            <div style="color:red;">
                                <?php echo form_error('mobile_number');?>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">

                    <div class="form-group  col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Address<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <textarea  rows="2" class="form-control" rows="5" id="comment" data-rule-required="true" name="address" class="form-control show-tooltip" data-original-title="Add Address" data-trigger="hover"><?php echo ($arr_account_setting[0]['address'])? $arr_account_setting[0]['address']:'' ;?></textarea>
                            <div style="color:red;">
                                <?php echo form_error('mobile_number');?>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Website</label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text"  value="<?php if(isset($arr_account_setting[0]['website'])) { echo $arr_account_setting[0]['website']; } ?>" name="website" class="form-control show-tooltip" data-original-title="Add Website" data-trigger="hover" />
                            <div style="color:red;">
                                <?php echo form_error('website');?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">

                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Email<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true" data-rule-email="true" value="<?php if(isset($arr_account_setting[0]['email'])) { echo $arr_account_setting[0]['email']; } ?>" name="email" class="form-control show-tooltip" data-original-title="Add Email" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('email');?>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Social Login<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <label class="radio-inline"><input type="radio" name="social_login" value="1" <?php echo ($arr_account_setting[0]['social_login']=='1')? "checked='checked'":''; ?> data-rule-required="true">Enable</label>
                            <label class="radio-inline"><input type="radio" name="social_login" value="0" <?php echo ($arr_account_setting[0]['social_login']!='1')? "checked='checked'":''; ?>>Disable</label>
                            <div style="color:red;">
                                <?php echo form_error('social_login');?>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-sm-12"> 
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Facebook URL<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true"  value="<?php if(isset($arr_account_setting[0]['fb_url'])) { echo $arr_account_setting[0]['fb_url']; } ?>" name="fb_url" class="form-control show-tooltip" data-original-title="Fb Url" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('fb_url');?>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Google Plus URL<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true"  value="<?php if(isset($arr_account_setting[0]['google_url'])) { echo $arr_account_setting[0]['google_url']; } ?>" name="google_url" class="form-control show-tooltip" data-original-title="Google Url" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('google_url');?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">

                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Twitter URL<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true"  value="<?php if(isset($arr_account_setting[0]['twitter_url'])) { echo $arr_account_setting[0]['twitter_url']; } ?>" name="twitter_url" class="form-control show-tooltip" data-original-title="Twitter Url" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('twitter_url');?>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-sm-4 col-lg-4 control-label">Instagram URL<span style="color:red">*</span></label>
                        <div class="col-sm-8 col-lg-8 controls">
                            <input type="text" data-rule-required="true"  value="<?php if(isset($arr_account_setting[0]['instagram_url'])) { echo $arr_account_setting[0]['instagram_url']; } ?>" name="instagram_url" class="form-control show-tooltip" data-original-title="Instagram Url" data-trigger="hover"/>
                            <div style="color:red;">
                                <?php echo form_error('instagram_url');?>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">

                    <div class="form-group col-sm-6">
                      <label class="col-sm-4 col-lg-4 control-label">Site Status
                        <i class="red">*</i>
                    </label>
                    <div class="col-sm-8 col-lg-8 controls">
                        <select class="form-control" name="site_status" data-rule-required="true">
                          <option value="0" <?php if($arr_account_setting[0]['site_status']== '0'){ echo ' selected ="selected"';} ?> >Offline</option>
                          <option value="1" <?php if($arr_account_setting[0]['site_status']== '1'){ echo ' selected ="selected"';} ?> >Online</option>
                      </select>
                  </div>
              </div>
              <div class="form-group col-sm-6">
                <label class="col-sm-4 col-lg-4 control-label">Purchase Tax
                    <i class="red">*</i>
                </label>
                <div class="col-sm-8 col-lg-8 controls">
                <input type="text" data-rule-required="true"  value="<?php if(isset($arr_account_setting[0]['tax'])) { echo $arr_account_setting[0]['tax']; } ?>" name="tax" class="form-control show-tooltip" data-original-title="Tax" data-rule-min="0" data-rule-max="100" data-trigger="hover" data-rule-number="true"/>
                    <div style="color:red;">
                        <?php echo form_error('tax');?>
                    </div> 
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-5 col-lg-10 col-lg-offset-5">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                <a href="<?php echo base_url().ADMIN_CTRL;?>/dashboard"> <button type="button" class="btn">Cancel</button></a>
            </div>
        </div>
    </form>
</div>
<?php } ?>
</div>
</div>
</div>
