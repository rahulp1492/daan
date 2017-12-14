<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-user"></i> User </h1>
            <!--  <h4>Simple and advance form elements</h4> -->
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
            <li>
                <i class="fa fa-user"></i>
                <a href="<?php echo base_url() . ADMIN_CTRL; ?>/user">Users</a>
                <span class="divider"><i class="fa fa-angle-right"></i></span>
            </li>
            <li class="active">Edit User</li>
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
                    <h3><i class="fa fa-bars"></i>Edit user</h3>
                </div>
                <div class="box-content">
                    <form action="<?= base_url(uri_string())?>" id="validation-form" class="form-horizontal" method="post">
                        <div class="col-sm-12">
                            <?php $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash());
                            ?>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="color_name">First Name<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['first_name']; ?>" type="text" name="first_name" id="first_name" data-rule-required="true" data-original-title="Add First Name" data-trigger="hover" maxlength="40"/>
                                        <div style="color:red;">
                                            <?php echo form_error('first_name'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="last_name">Last Name<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['last_name']; ?>" type="text" name="last_name" id="last_name" data-rule-required="true" data-original-title="Add Last Name" data-trigger="hover" maxlength="40"/>
                                        <div style="color:red;">
                                            <?php echo form_error('last_name'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email">Email Id</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['email']; ?>" type="text" name="email" id="email" disabled data-rule-required="true" data-rule-email="true" data-original-title="Add Email Id" data-trigger="hover"/>
                                        <div style="color:red;">
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Phone</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip"  value="<?php echo $arr_user['phone']; ?>" type="text" name="phone" id="phone" disabled/>
                                        <div style="color:red;">
                                            <?php echo form_error('phone'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                    <div class="form-group col-sm-6">
                                        <label class="col-sm-4 col-lg-3 control-label">State<span style="color: red;">*</span></label>
                                        <div class="col-sm-8 col-lg-9 controls">
                                            <select class="form-control" data-rule-required="true" data-original-title="Select State" id="state" name="state">
                                                <option value="">Select State</option>
                                                    <option <?php if($arr_user['state']=='1') echo "selected";?> value="1">Maharashtra</option>;
                                            </select>
                                        <div style="color:red;">
                                            <?php echo form_error('state'); ?>
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-sm-4 col-lg-3 control-label">City<span style="color: red;">*</span></label>
                                        <div class="col-sm-8 col-lg-9 controls">
                                            <select class="form-control" data-rule-required="true" data-original-title="Select City" id="city" name="city">
                                                <option value="">Select State First</option>
                                                    <option <?php if($arr_user['city']=='1') echo "selected";?> value="1">Nashik</option>
                                            </select>
                                        <div style="color:red;">
                                            <?php echo form_error('city'); ?>
                                        </div>                                            
                                        </div>
                                    </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Address<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <textarea class="form-control show-tooltip"  type="text" name="address" id="address" data-rule-required="true" data-original-title="Add Address" data-trigger="hover"><?php echo $arr_user['address']; ?></textarea>
                                        <div style="color:red;">
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Pin Code<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['pincode']; ?>" type="text" name="pincode" id="pincode" data-rule-required="true" minlength="6" maxlength="6" data-original-title="Add Pin Code" data-trigger="hover" data-rule-number="true"/>
                                        <div style="color:red;">
                                            <?php echo form_error('pincode'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Aadhar Number</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" type="text" name="aadhar_number" value="<?php echo $arr_user['sd_aadhar']; ?>" id="aadhar_number" data-rule-required="true" data-original-title="Add Address" data-trigger="hover" />
                                        <div style="color:red;">
                                            <?php echo form_error('aadhar_number'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Tax ID</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['sd_tax_card']; ?>" type="text" name="tax_id" id="tax_id" data-rule-required="true" minlength="6" maxlength="6" data-original-title="Add Pin Code" data-trigger="hover" data-rule-number="true"/>
                                        <div style="color:red;">
                                            <?php echo form_error('tax_id'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Other</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <textarea class="form-control show-tooltip"  type="text" name="other" id="other" data-rule-required="true" data-original-title="Add Address" data-trigger="hover"><?php echo $arr_user['other']; ?></textarea>
                                        <div style="color:red;">
                                            <?php echo form_error('other'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Profession</label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo $arr_user['profession']; ?>" type="text" name="profession" id="profession" />
                                        <div style="color:red;">
                                            <?php echo form_error('profession'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-5 col-lg-10 col-lg-offset-5">
                                    <button type="submit" name="user_edit" id="user_edit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--         <script type="text/javascript">

            function getcity(id)
            {
                if(id.value != '']
                {
                    $.ajax({
                        url: '<?=base_url() . 'admin/user/getcity_records'?>',
                        type:'POST',
                        dataType: 'json',
                        data: "state_id="+id.value+"&<?=$csrf['name'];?>=<?=$csrf['hash'];?>",
                        success:function(response){
                            var trHTML = '';

                            trHTML = '<option value="">Select City</option>';

                            $.each(response, function (i, item) {

                                trHTML += '<option value="'+ response[i].city_id +'">' + response[i].city_name + '</option>';
                            });

                            document.getElementById("city"). innerHTML= trHTML;
                        }
                    });
                }
            }
        </script> -->
<!-- END Main Content -->