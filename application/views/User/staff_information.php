<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>STAFF INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Staff Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select-sm">
                    <select class="form-control select2" name="role_id" id="role_id" title="Select Role  Name" data-placeholder="Select Role Name" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Role Name </option>
                      <?php foreach ($role_list as $list) { ?>
                        <option value="<?php echo $list->role_id ?>" <?php if(isset($roll_id) && $roll_id == $list->role_id ){ echo 'selected'; } ?>><?php echo $list->role_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="staff_name" id="staff_name" value="<?php if(isset($staff_name)){ echo $staff_name;} ?>" title="Enter User Name" placeholder="Enter User Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="staff_city" id="staff_city" value="<?php if(isset($staff_city)){ echo $staff_city;} ?>" title="Enter City" placeholder="Enter City" required>
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <label for="">Gender : </label>
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <div class="form-check">
                      <input class="form-check-input" value="Male" type="radio" <?php if(isset($staff_gender) && $staff_gender == 'Male'){ echo 'checked'; } else{ echo 'checked'; } ?> name="staff_gender">
                      Male
                    </div>
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <div class="form-check">
                      <input class="form-check-input" value="Female" type="radio" <?php if(isset($staff_gender) && $staff_gender == 'Female'){ echo 'checked'; } ?> name="staff_gender">
                      Female
                    </div>
                  </div>
                  <div class="form-group col-md-6"></div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="staff_email" id="staff_email" value="<?php if(isset($staff_email)){ echo $staff_email;} ?>" title="Enter Email Id" placeholder="Enter Email Id" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="staff_mobile" id="staff_mobile" value="<?php if(isset($staff_mobile)){ echo $staff_mobile;} ?>" title="Enter Mobile no." placeholder="Enter Mobile no." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="staff_password" id="staff_password" value="<?php if(isset($staff_password)){ echo $staff_password;} ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="c_staff_password" id="c_staff_password" value="<?php if(isset($staff_password)){ echo $staff_password;} ?>" title="Confirm Password" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group col-md-6 pl-4">
                    <div class="form-check">
                      <input type="checkbox" name="staff_status" <?php if(isset($staff_status) && $staff_status == 'deactivate') { echo 'checked'; } ?> value="deactivate" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label text-bold"  for="exampleCheck1">Disable This User</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="../dashboard" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
      var staff_mobile1 = $('#mobile').val();
      $('#staff_mobile').on('change',function(){
        var staff_mobile = $(this).val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/check_duplication',
          type: 'POST',
          data: {"column_name":"user_mobile",
                 "column_val":staff_mobile,
                 "table_name":"user"},
          context: this,
          success: function(result){
            if(result > 0){
              $('#staff_mobile').val(staff_mobile1);
              toastr.error(staff_mobile+' Mobile No Exist.');
            }
          }
        });
      });
    </script>
</body>
</html>
