 <!-- BEGIN Content -->
 <div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-cog"></i><?php echo isset($module_name) ? $module_name : 'Demo Page'; ?></h1>
        </div>
    </div>
    <!-- END Page Title-->
    <!-- BEGIN Breadcrumb -->
    <div id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo base_url() . ADMIN_CTRL; ?>/dashboard">Home</a>
                <span class="divider"><i class="fa fa-angle-right"></i></span>
            </li>
        </ul>
    </div>
    <!-- END Breadcrumb -->
    <!-- message box fields start -->
    <?php $this->load->view('admin/alert')?>
    <!-- message box fields end -->
    <!-- BEGIN Main Content -->
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i><?php echo isset($module_name) ? $module_name : 'Demo Page'; ?></h3>
            </div>
            <?php if (isset($arr_banner) && sizeof($arr_banner) > 0) {
                ?>
                <div class="box-content">
                    <form action="<?php echo base_url() . ADMIN_CTRL; ?>/dashboard/banner_upload" method="post" id="validation-form" name="frm_admin_profile" enctype="multipart/form-data" class="form-horizontal">

                       <?php $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash());?>

                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <div class="col-sm-12">
                         <div class="form-group col-sm-6">
                             <label class="col-sm-4 col-lg-4 control-label">Banner Upload</label>
                             <div class="col-sm-8 col-lg-8 controls">
                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>uploads/admin/banner/<?php echo ($arr_banner['banner_image']) ? $arr_banner['banner_image'] : 'no-image-icon.jpg' ?>" alt="" style="width: 200px; height: 150px;"/>
                                </div>
                                <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
                                <div>
                                 <input type="file" name="profile_img" id="profile_img" class="default" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                <div class="col-sm-9 col-sm-offset-5 col-lg-10 col-lg-offset-5">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    <a href="<?php echo base_url() . ADMIN_CTRL; ?>/dashboard"> <button type="button" class="btn">Cancel</button></a>
                </div>
            </div>
        </form>
    </div>
    <?php }?>
</div>
</div>
</div>
