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
            <h1>MEMBERS INFORMATION</h1>
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
                <h3 class="card-title">Members Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="member_name" id="member_name" value="<?php if(isset($member_name)){ echo $member_name; } ?>" title="Enter Name" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <textarea class="form-control form-control-sm" name="member_address" id="member_address" rows="3" cols="80" title="Enter Address" placeholder="Enter Address" required><?php if(isset($member_address)){ echo $member_address; } ?></textarea>
                  </div>
                  <?php //print_r($country_list); ?>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="country_id" id="country_id" title="Select Country" data-placeholder="Select Country">
                      <option selected="selected" value="" >Select Country </option>
                      <?php foreach ($country_list as $list) { ?>
                        <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="state_id" id="state_id" title="Select State" data-placeholder="Select State">
                      <option selected="selected" value="" >Select State </option>
                      <?php foreach ($state_list as $list) { ?>
                        <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="district_id" id="district_id" title="Select District" data-placeholder="Select District">
                      <option selected="selected" value="" >Select District</option>
                      <?php foreach ($district_list as $list) { ?>
                        <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="tahasil_id" id="tahasil_id" title="Select Tahasil" data-placeholder="Select Tahasil" style="width: 100%;" >
                      <option selected="selected" value="" >Select Tahasil </option>
                      <?php foreach ($tahasil_list as $list) { ?>
                        <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="city_id" id="city_id" title="Select City" data-placeholder="Select City" style="width: 100%;" >
                      <option selected="selected" value="" >Select City </option>
                      <?php foreach ($city_list as $list) { ?>
                        <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control  form-control-sm" name="member_area" id="member_area"  value="<?php if(isset($member_area)){ echo $member_area; } ?>" title="Enter Area" placeholder="Enter Area" >
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <label for="">Gender : </label>
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <div class="form-check">
                      <input class="form-check-input" value="Male" type="radio" <?php if(isset($member_gender) && $member_gender == 'Male'){ echo 'checked'; } else{ echo 'checked'; } ?> name="member_gender">
                      Male
                    </div>
                  </div>
                  <div class="form-group col-md-2 mb-0">
                    <div class="form-check">
                      <input class="form-check-input" value="Female" type="radio" <?php if(isset($member_gender) && $member_gender == 'Female'){ echo 'checked'; } ?> name="member_gender">
                      Female
                    </div>
                  </div>
                  <div class="form-group col-md-6"></div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control  form-control-sm" name="member_birth_date" value="<?php if(isset($member_birth_date)){ echo $member_birth_date; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" title="Enter Birth date" placeholder="Enter Birth date" required>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="language_id" id="language_id" title="Select Mother tongue" data-placeholder="Select Mother tongue" style="width: 100%;" >
                      <option selected="selected" value="" >Select Mother tongue </option>
                      <?php foreach ($language_list as $list) { ?>
                        <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="religion_id" id="religion_id" title="Select Religion" data-placeholder="Select Religion" >
                      <option selected="selected" value="" >Select Religion </option>
                      <?php foreach ($religion_list as $list) { ?>
                        <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="cast_id" id="cast_id" title="Select Caste" data-placeholder="Select Caste" style="width: 100%;" >
                      <option selected="selected" value="" >Select Caste </option>
                      <?php foreach ($caste_list as $list) { ?>
                        <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="marital_status" id="marital_status" title="Select Marital Status" data-placeholder="Select Marital Status" >
                      <option selected="selected" value="" >Select Marital Status</option>
                      <?php foreach ($marital_status_list as $list) { ?>
                        <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2" name="onbehalf_id" id="onbehalf_id" title="Profile Created By" data-placeholder="Profile Created By" >
                      <option selected="selected" value="" >Profile Created By </option>
                      <?php foreach ($onbehalf_list as $list) { ?>
                        <option value="<?php echo $list->onbehalf_id ?>" <?php if(isset($onbehalf_id) && $onbehalf_id == $list->onbehalf_id ){ echo 'selected'; } ?>><?php echo $list->onbehalf_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control form-control-sm" name="member_email" id="member_email" value="<?php if(isset($member_email)){ echo $member_email; } ?>" title="Enter Email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control form-control-sm" name="member_mobile" id="member_mobile" value="<?php if(isset($member_mobile)){ echo $member_mobile; } ?>" title="Enter Mobile" placeholder="Enter Mobile" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="member_password" id="member_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="" id="confirm_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Confirm Password" placeholder="Confirm Password" required>
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

  // Mobile Exist...
  var member_mobile1 = $('#member_mobile').val();
  $('#member_mobile').on('change',function(){
    var member_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"member_mobile",
             "column_val":member_mobile,
             "table_name":"member"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#member_mobile').val(member_mobile1);
          toastr.error(member_mobile+' Mobile No Exist.');
        }
      }
    });
  });

  // Email Exist...
  var member_email1 = $('#member_email').val();
  $('#member_email').on('change',function(){
    var member_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"member_email",
             "column_val":member_email,
             "table_name":"member"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#member_email').val(member_email1);
          toastr.error(member_email+' Email Exist.');
        }
      }
    });
  });
  </script>


  <script type="text/javascript">
    $("#country_id").on("change", function(){
      var country_id =  $('#country_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_state_by_country',
        type: 'POST',
        data: {"country_id":country_id},
        context: this,
        success: function(result){
          $('#state_id').html(result);
        }
      });
    });

    $("#state_id").on("change", function(){
      var state_id =  $('#state_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_district_by_state',
        type: 'POST',
        data: {"state_id":state_id},
        context: this,
        success: function(result){
          $('#district_id').html(result);
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_tahasil_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#tahasil_id').html(result);
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_city_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#city_id').html(result);
        }
      });
    });

    $("#religion_id").on("change", function(){
      var religion_id =  $('#religion_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_cast_by_religion',
        type: 'POST',
        data: {"religion_id":religion_id},
        context: this,
        success: function(result){
          $('#cast_id').html(result);
        }
      });
    });
  </script>


</body>
</html>
