<!-- BEGIN Content -->
<div id="main-content">
  <!-- BEGIN Page Title -->
  <div class="page-title">
    <div>
      <h1><i class="fa fa-user"></i> <?php echo isset($module_name) ? $module_name : 'Demo Page'; ?></h1>
      <!--  <h4>Advance table with pagination and toolbar</h4> -->
    </div>
  </div>
  <!-- END Page Title -->

  <!-- BEGIN Breadcrumb -->
  <div id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="<?php echo base_url() . ADMIN_CTRL; ?>/dashboard">Home</a>
        <span class="divider"><i class="fa fa-angle-right"></i></span>
      </li>
      <li class="active">Users</li>
    </ul>
  </div>
  <!-- END Breadcrumb -->
  <?php $this->load->view('admin/alert')?>

  <div class="row">
    <div class="col-md-12">

      <div class="">
        <div class="box-title">

          <div class="box box-black">
            <div class="tabing-section-order">
              <ul>
                <li><a class="acti" href="<?php echo base_url() . 'admin/user'; ?>">All Users(<?php echo $total ? $total : 0; ?>)</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="box-content">
              <div class="btn-toolbar pull-right">
                <div class="btn-group">
                  <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Block selected"><i class="fa fa-lock" onclick="javascript:blockselect();"></i></a>
                  <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Unblock selected"><i class="fa fa-unlock" onclick="javascript:unblockselect();"></i></a>
                  <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Delete selected" onclick="javascript:delselect();"><i class="fa fa-trash-o"></i></a>
                </div>
              </div>
              <br/><br/>

              <div class="table-responsive">
                <form id="per_page" method="POST">
                  <?php $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash());?>

                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

                    <div class="form-group col-md-1">
                      <select class="form-control" id="perpage" name="per_page">
                        <option value="10" <?php echo (set_value('per_page') && set_value('per_page') == 10) ? "selected='selected'" : ''; ?>>10</option>
                        <option value="25" <?php echo (set_value('per_page') && set_value('per_page') == 25) ? "selected='selected'" : ''; ?>>25</option>
                        <option value="50" <?php echo (set_value('per_page') && set_value('per_page') == 50) ? "selected='selected'" : ''; ?>>50</option>
                        <option value="100" <?php echo (set_value('per_page') && set_value('per_page') == 100) ? "selected='selected'" : ''; ?>>100</option>
                      </select>
                    </div>
                  </form>
                  <form method="GET" id="search_form" class="form-inline" action="">
                    <div class="form-group">
                      <div class="col-sm-9 col-lg-4 col-sm-offset-3 controls">
                        <input  class="form-control" type="text" name="search_name" value="<?php echo isset($_GET['search_name']) ? $_GET['search_name'] : ''; ?>" id="search_name" data-rule-required="true" data-original-title="Add Search Name" data-trigger="hover" placeholder="Search By Name" />
                        <div style="color:red;">
                          <?php echo form_error('search_name'); ?>
                        </div>
                      </div>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                      <div class="col-sm-9 col-lg-4 col-sm-offset-3 controls">
                        <button type="submit" id="submit-btn" class="btn btn-primary col-sm-offset-3"> Search</button>
                      </div>
                    </div>
                  </form>
                  <span id="search_error" class="col-sm-offset-1" style="color: red"></span>
                  <form name="frm_make_view" id="frm_make_view" method="post" action="<?php echo base_url() . ADMIN_CTRL; ?>/user/multi_action">
                    <?php $csrf = array(
                      'name' => $this->security->get_csrf_token_name(),
                      'hash' => $this->security->get_csrf_hash());?>

                      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>"/>
                      <input type="hidden" name="action" value="" id="action">
                      <table class="table table-advance">
                        <thead>
                          <tr>
                            <!-- <th style="width:5%;"><input type="checkbox" name="all" value="Check All" onclick="this.value=check(this.form.chk)"/></th> -->
                            <th style="width:18px">
                              <input type="checkbox" name="mult_change" id="mult_change" />
                            </th>
                            <th>Sr. No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email ID</th>
                            <th>Active</th>
                            <th class="visible-md visible-lg" style="width:15%;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (count($arr_user) > 0) {
                            $i = 1;

                            foreach ($arr_user as $key => $user) {
                              ?>
                              <tr class="table">
                                <td><input type="checkbox" name="chk[]" id="chk" value="<?php echo $user['id']; ?>"/></td>
                                <td><?php echo $i + ($page ? $page : 0); ?> </td>
                                <th><?php echo $user['first_name']; ?></th>
                                <th><?php echo $user['last_name']; ?></th>
                                <th><?php echo $user['email']; ?></th>
                                <td>
                                  <?php
                                  if ($user['active'] != 1) {
                                    ?>
                                    <a class="btn btn-circle show-tooltip" style="color:red;" title="Deactive" href="#"><i class="fa fa-circle" style="color:red;"></i></a>
                                    <?php
                                  } else {
                                    ?>
                                    <a class="btn btn-circle show-tooltip" style="color:green;"  title="Active" href="#"><i class="fa fa-circle" style="color:green;"></i></a>
                                    <?php
                                  }
                                  ?>
                                </td>
                                <td class="visible-md visible-lg">
                                  <div class="btn-group">

                                  <?php if ($user['user_verification'] == '1') { //Verified user it is. ?>
                                    
                                    <a class="btn btn-sm btn-success show-tooltip" title="" data-original-title="Verified"><i class="fa fa-check"></i></a>
                                  
                                  <?php }elseif ($user['user_verification'] == '2') { //Verification request ?>

                                    <a class="btn btn-sm show-tooltip" title="" href="<?php echo base_url(ADMIN_CTRL . '/user/verify/') . base64_encode($user['id']); ?>" data-original-title="Verification Request"><i class="fa fa-check-square-o"></i></a>
                                  
                                  <?php }else{  //not verified user ?>

                                    <a class="btn btn-sm btn-danger show-tooltip" data-original-title="Not Verified"><i class="fa fa-times"></i></a>
                                  
                                  <?php } ?>

                                    <a class="btn btn-sm show-tooltip" title="" href="#" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger show-tooltip" onclick="return confirm('Are you sure you want to Delete this Doctor ?')" title="" href="<?php echo base_url(ADMIN_CTRL . '/user/delete/') . base64_encode($user['id']); ?>" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                  </div>
                                </td>
                              </tr>
                              <?php
                              $i++;
                            }
                          } else {
                            $i = 1;
                            ?>
                            <tr class="table">
                              <td colspan="8">
                                <b> No records found..!</b>
                              </td>
                            </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>

                    </form>
                  </div>
                  <div class="text-center">
                    <?php
                    echo $pagination;
                    ?>
                  </div>
                  <div class="dataTables_info" id="table1_info"> Showing <?php echo (($i == 1) ? 0 : $page + 1); ?> - <?php echo ($i + ($page ? $page : 0)) - 1; ?>
                    Out of <?php echo $total ? $total : 0; ?> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          var checkflag = "false";
          function check(field)
          {
            if(checkflag=="false")
            {
              for(i=0;i<field.length;i++)
              {
                field[i].checked=true;
              }
              checkflag="true";
              return "Uncheck All";
            }
            else
            {
              for(i=0;i<field.length;i++)
              {
                field[i].checked=false;
              }
              checkflag="false";
              return "Check All";
            }
          }

          function delselect()
          {
            var chk=document.frm_make_view.chk;
            var total="";

            if((chk.length)>0)
            {
              for(var i=0;i<chk.length;i++)
              {
                if(chk[i].checked)
                {

                  total +=chk[i].value+ "\n";

                }

              }
              if(total=="")
              {
                alert("Please Select Any Record");
              }
              else
              {
                if(confirm("Do you really want to delete this record")==true)
                {
                  $("#action").val('delete');
                  $("#frm_make_view")[0].submit();

                }
              }
            }
            else
            {
              if(chk.checked)
              {
                if(confirm("Do you really want to delete this record")==true)
                {
                  $("#action").val('delete');
                  $("#frm_make_view")[0].submit();
                }
              }
              else
              {
                alert("Please Select Any Record");
              }
            }

          }
          function blockselect()
          {
            var chk=document.frm_make_view.chk;
            var total="";

            if((chk.length)>0)
            {
              for(var i=0;i<chk.length;i++)
              {
                if(chk[i].checked)
                {

                  total +=chk[i].value+ "\n";

                }

              }
              if(total=="")
              {
                alert("Please Select Any Record");
              }
              else
              {
                if(confirm("Do You Want To Block This Record ?")==true)
                {
                  $("#action").val('block');
                  $("#frm_make_view")[0].submit();

                }
              }
            }
            else
            {
              if(chk.checked)
              {
                if(confirm("Do You Want To Block This Record ?")==true)
                {
                  $("#action").val('block');
                  $("#frm_make_view")[0].submit();
                }
              }
              else
              {
                alert("Please Select Any Record");
              }
            }

          }
          function unblockselect()
          {
            var chk=document.frm_make_view.chk;
            var total="";

            if((chk.length)>0)
            {
              for(var i=0;i<chk.length;i++)
              {
                if(chk[i].checked)
                {

                  total +=chk[i].value+ "\n";

                }

              }
              if(total=="")
              {
                alert("Please Select Any Record");
              }
              else
              {
                if(confirm("Do You Want To Unblock This Record ?")==true)
                {
                  $("#action").val('unblock');
                  $("#frm_make_view")[0].submit();

                }
              }
            }
            else
            {
              if(chk.checked)
              {
                if(confirm("Do You Want To Unblock This Record ?")==true)
                {
                  $("#action").val('unblock');
                  $("#frm_make_view")[0].submit();
                }
              }
              else
              {
                alert("Please Select Any Record");
              }
            }

          }

          $('#perpage').on('change',function()
          {
            $('#per_page').submit();
          });

        </script>