<!-- BEGIN Content -->
<div id="main-content">
    <!-- BEGIN Page Title -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-user"></i> User Registration </h1>
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
                <a href="<?php echo base_url() . ADMIN_CTRL; ?>/user/manage">Users</a>
                <span class="divider"><i class="fa fa-angle-right"></i></span>
            </li>
            <li class="active">Add User</li>
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
                    <h3><i class="fa fa-bars"></i>Add user</h3>
                </div>
                <div class="box-content">
                    <form action="<?php echo base_url() . ADMIN_CTRL; ?>/user/add" id="validation-form" class="form-horizontal" method="post">
                        <div class="col-sm-12">
                            <?php $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash());
                            ?>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="color_name">First Name<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo set_value('first_name'); ?>" type="text" name="first_name" id="first_name" data-rule-required="true" data-original-title="Add First Name" data-trigger="hover" maxlength="40"/>
                                        <div style="color:red;">
                                            <?php echo form_error('first_name'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="last_name">Last Name<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo set_value('last_name'); ?>" type="text" name="last_name" id="last_name" data-rule-required="true" data-original-title="Add Last Name" data-trigger="hover" maxlength="40"/>
                                        <div style="color:red;">
                                            <?php echo form_error('last_name'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Email Id<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo set_value('email_id'); ?>" type="text" name="email_id" id="email_id" data-rule-required="true" data-rule-email="true" data-original-title="Add Email Id" data-trigger="hover"/>
                                        <div style="color:red;">
                                            <?php echo form_error('email_id'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Phone<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip"  value="<?php echo set_value('phone'); ?>" type="text" name="phone" id="phone"/>

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
                                                    <option value="1">Maharashtra</option>;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="col-sm-4 col-lg-3 control-label">City<span style="color: red;">*</span></label>
                                        <div class="col-sm-8 col-lg-9 controls">
                                            <select class="form-control" data-rule-required="true" data-original-title="Select City" id="city" name="city">
                                                <option value="">Select State First</option>
                                                    <option value="1">Nashik</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Address<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">

                                        <textarea class="form-control show-tooltip"  type="text" name="addr_line_1" id="addr_line_1" data-rule-required="true" data-original-title="Add Address" data-trigger="hover"><?php echo set_value('addr_line_1'); ?></textarea>
                                        <div style="color:red;">
                                            <?php echo form_error('addr_line_1'); ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group col-lg-6 col-sm-6">
                                    <label class="col-sm-4 col-lg-3 control-label" for="email_id">Pin Code<span style="color: red;">*</span></label>
                                    <div class="col-sm-8 col-lg-9 controls">
                                        <input class="form-control show-tooltip" value="<?php echo set_value('pin_code'); ?>" type="text" name="pin_code" id="pin_code" data-rule-required="true" minlength="6" maxlength="6" data-original-title="Add Pin Code" data-trigger="hover" data-rule-number="true"/>
                                        <div style="color:red;">
                                            <?php echo form_error('pin_code'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-5 col-lg-10 col-lg-offset-5">
                                    <button type="submit" name="add_user" id="add_user" class="btn btn-primary"><i class="fa fa-check"></i> Register</button>
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
                if(id.value != '')
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