<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- SweetAlert2 -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- Toastr -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_css.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <style media="screen">
  .form-group {
    margin-bottom: .5rem !important;
  }
  label {
    display: inline-block;
    margin-bottom: .2rem !important;
  }
  </style>
    <title>BHARTIYA SHADI</title>
  </head>
  <body>
    <section class="navbar-top">
       <div class="container">
         <div class="row">
           <div class="col-md-5">
            <img class="logo-img m-0" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
           </div>
         </div>
       </div>
    </section>

    <section class="login-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h4 class="text-center">Complete Profile</h4>
            <div class="mt-4">
              <div class="mx-auto">
                <!-- <?php if($this->session->flashdata('invalid_otp')){ ?>
                  <div class="alert alert-danger invalid_otp" role="alert">
                    Invalide OTP.
                  </div>
                <?php } ?> -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <!-- <p class="login-box-msg text-bold">OTP is sent to Your Mobile Number</p> -->
                    <form class="" action="<?php echo base_url(); ?>Member/update_complete_profile/<?php echo $member_id; ?>" method="post" autocomplete="off">
                      <div class="row">
                        <div class="form-group col-md-6 pr-0">
                          <label>Country</label>
                          <select class="form-control select2 form-control-sm" name="country_id" id="country_id2" data-placeholder="Select Country" required>
                            <option selected="selected" value="" >Select Country </option>
                            <?php foreach ($country_list as $list) { ?>
                              <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>State</label>
                          <select class="form-control select2 form-control-sm w-100" name="state_id" id="state_id2"  title="Select State" data-placeholder="Select State" required>
                            <option selected="selected" value="" >Select State </option>
                            <?php foreach ($state_list as $list) { ?>
                              <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>District</label>
                          <select class="form-control select2 form-control-sm w-100" name="district_id" id="district_id2"  title="Select District" data-placeholder="Select District" required>
                            <option selected="selected" value="" >Select District </option>
                            <?php foreach ($district_list as $list) { ?>
                              <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                            <?php  } ?>
                            <!-- <option value="-1">Other</option> -->
                          </select>
                          <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_district_name" id="other_district_name" placeholder="Enter District Name">
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Tahsil</label>
                          <select class="form-control select2 form-control-sm w-100" name="tahasil_id" id="tahasil_id2"  title="Select Tahsil" data-placeholder="Select Tahsil" required>
                            <option selected="selected" value="" >Select Tahsil </option>
                            <?php foreach ($tahasil_list as $list) { ?>
                              <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                            <?php  } ?>
                            <!-- <option value="-1">Other</option> -->
                          </select>
                          <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_tahasil_name" id="other_tahasil_name" title="Enter Tahsil Name"  placeholder="Enter Tahsil Name">
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Religion</label>
                          <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id2" title="Select Religion" data-placeholder="Select Religion"  required>
                            <option selected="selected" value="" >Select Religion</option>
                            <?php foreach ($religion_list as $list) { ?>
                              <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Caste</label>
                          <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id2" title="Select Caste" data-placeholder="Select Caste"  required>
                            <option selected="selected" value="" >Select Caste</option>
                            <?php foreach ($cast_list as $list) { ?>
                              <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                            <?php  } ?>
                            <option value="-1">Other</option>
                          </select>
                          <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_cast_name" id="other_cast_name" title="Enter Caste"  placeholder="Enter Caste">
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Education</label>
                          <select class="form-control select2 form-control-sm w-100" name="education_id" id="education_id2" title="Select Education" data-placeholder="Select Education"  required>
                            <option selected="selected" value="" >Select Education</option>
                            <option value="-1">Other</option>
                            <?php foreach ($education_list as $list) { ?>
                              <option value="<?php echo $list->education_id ?>" <?php if(isset($education_id) && $education_id == $list->education_id ){ echo 'selected'; } ?>><?php echo $list->education_name; ?></option>
                            <?php  } ?>
                          </select>
                          <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_education_name" id="other_education_name" placeholder="Enter Education">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Occupation</label>
                          <select class="form-control select2 form-control-sm w-100" name="occupation_id" id="occupation_id2" title="Select Occupation" data-placeholder="Select Occupation"  required>
                            <option selected="selected" value="" >Select Occupation</option>
                            <?php foreach ($occupation_list as $list) { ?>
                              <option value="<?php echo $list->occupation_id ?>" <?php if(isset($occupation_id) && $occupation_id == $list->occupation_id ){ echo 'selected'; } ?>><?php echo $list->occupation_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Occupation Details</label>
                          <input type="text" class="form-control form-control-sm" name="occupation_details" id="occupation_details2" value="<?php if(isset($occupation_details)){ echo $occupation_details; } ?>"  title="Name of Company and Details"  placeholder="Name of Company and Details" required>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Marital Status</label>
                          <select class="form-control select2 form-control-sm w-100" name="marital_status" id="marital_status" title="Select Marital Status" data-placeholder="Select Marital Status" required>
                            <option selected="selected" value="" >Select Marital Status</option>
                            <?php foreach ($marital_status_list as $list) { ?>
                              <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6 pr-0">
                          <label>Interesred In</label>
                          <select class="form-control select2 form-control-sm w-100" name="marriage_type_id" id="marriage_type_id" title="Interested In" data-placeholder="Select Marriage Type" required>
                            <option selected="selected" value="" >Select Marriage Type</option>
                            <?php foreach ($marriage_type_list as $list) { ?>
                              <option value="<?php echo $list->marriage_type_id ?>" <?php if(isset($marriage_type_id) && $marriage_type_id == $list->marriage_type_id ){ echo 'selected'; } ?>><?php echo $list->marriage_type_name; ?></option>
                            <?php  } ?>
                          </select>
                        </div>

                      </div>
                      <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-6">
          <?php if($this->session->flashdata('reg_success')){ ?>
            <div class="alert alert-success mt-3 reg_success" role="alert">
              <b>Registered Successfully. Verify OTP.</b>
            </div>
          <?php } ?>
          </div> -->
        </div>
      </div>
    </section>


<?php //include("footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.invalid_otp').show().delay(5000).fadeOut();
      });
    </script>

    <?php if($this->session->flashdata('invalid_otp')){ ?>
      <script type="text/javascript">
        $(document).ready(function(){
          // alert();
          toastr.error('Invalid OTP');
        });
      </script>
    <?php } ?>

    <script type="text/javascript">
      $('#date1').datetimepicker({
        format: 'DD-MM-Y'
      });
      $('#date2').datetimepicker({
        format: 'DD-MM-Y'
      });
      $('#date3').datetimepicker({
        format: 'DD-MM-Y'
      })
      $('#date4').datetimepicker({
        format: 'DD-MM-Y'
      })
      $('#date5').datetimepicker({
        format: 'DD-MM-Y'
      })
    </script>

    <script>
      $(function () {
        // Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
        //Initialize Select2 Elements
        $('.select2').select2();
        //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox();
      })
    </script>

    <script type="text/javascript">
      $("#country_id2").on("change", function(){
        var country_id =  $('#country_id2').find("option:selected").val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_state_by_country',
          type: 'POST',
          data: {"country_id":country_id},
          context: this,
          success: function(result){
            $('#state_id2').html(result);
            $('#district_id2').html('');
            $('#tahasil_id2').html('');
            $('#city_id2').html('');
          }
        });
      });

      $("#state_id2").on("change", function(){
        var state_id =  $('#state_id2').find("option:selected").val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_district_by_state',
          type: 'POST',
          data: {"state_id":state_id},
          context: this,
          success: function(result){
            $('#district_id2').html(result);
            $('#tahasil_id2').html('');
            $('#city_id2').html('');
          }
        });
      });

      $("#district_id2").on("change", function(){
        var district_id =  $('#district_id2').find("option:selected").val();
        // alert(district_id);
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_tahasil_by_district',
          type: 'POST',
          data: {"district_id":district_id},
          context: this,
          success: function(result){
            $('#tahasil_id2').html(result);
          }
        });
      });

      $("#district_id2").on("change", function(){
        var district_id =  $('#district_id2').find("option:selected").val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_city_by_district',
          type: 'POST',
          data: {"district_id":district_id},
          context: this,
          success: function(result){
            $('#city_id2').html(result);
          }
        });
      });

      $("#religion_id2").on("change", function(){
        var religion_id2 =  $('#religion_id2').find("option:selected").val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_cast_by_religion',
          type: 'POST',
          data: {"religion_id":religion_id2},
          context: this,
          success: function(result){
            $('#cast_id2').html(result);
            $('#sub_cast_id2').html('');
          }
        });
      });

      $("#cast_id2").on("change", function(){
        var cast_id2 =  $('#cast_id2').find("option:selected").val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/get_subcast_by_cast',
          type: 'POST',
          data: {"cast_id":cast_id2},
          context: this,
          success: function(result){
            $('#sub_cast_id2').html(result);
          }
        });
      });
    </script>

    <script type="text/javascript">
      $("#cast_id2").on("change", function(){
        var cast_id2 =  $('#cast_id2').find("option:selected").val();
        if(cast_id2 == '-1'){
          $('#other_cast_name').css('display','block');
          $('#other_cast_name').attr('required',true);
        } else{
          $('#other_cast_name').css('display','none');
          $('#other_cast_name').attr('required',false);
        }
      });

      $("#sub_cast_id2").on("change", function(){
        var sub_cast_id2 =  $('#sub_cast_id2').find("option:selected").val();
        if(sub_cast_id2 == '-1'){
          $('#other_subcast_name').css('display','block');
          $('#other_subcast_name').attr('required',true);
        } else{
          $('#other_subcast_name').css('display','none');
          $('#other_subcast_name').attr('required',false);
        }
      });

      $("#district_id2").on("change", function(){
        var district_id2 =  $('#district_id2').find("option:selected").val();

        // $('#other_district_name').focus();
        if(district_id2 == '-1'){
          $('#other_district_name').css('display','block');
          $('#other_district_name').attr('required',true);
          document.getElementById("other_district_name").focus();
        } else{
          $('#other_district_name').css('display','none');
          $('#other_district_name').attr('required',false);
        }
      });

      $("#tahasil_id2").on("change", function(){
        var tahasil_id2 =  $('#tahasil_id2').find("option:selected").val();
        if(tahasil_id2 == '-1'){
          $('#other_tahasil_name').css('display','block');
          $('#other_tahasil_name').attr('required',true);
        } else{
          $('#other_tahasil_name').css('display','none');
          $('#other_tahasil_name').attr('required',false);
        }
      });

      $("#city_id2").on("change", function(){
        var city_id2 =  $('#city_id2').find("option:selected").val();
        if(city_id2 == '-1'){
          $('#other_city_name').css('display','block');
          $('#other_city_name').attr('required',true);
        } else{
          $('#other_city_name').css('display','none');
          $('#other_city_name').attr('required',false);
        }
      });

      $("#education_id2").on("change", function(){
        var education_id2 =  $('#education_id2').find("option:selected").val();
        if(education_id2 == '-1'){
          $('#other_education_name').css('display','block');
          $('#other_education_name').attr('required',true);
        } else{
          $('#other_education_name').css('display','none');
          $('#other_education_name').attr('required',false);
        }
      });

      $("#new_password, #new_con_password").on('change',function(){
        var new_password = $('#new_password').val();
        var new_con_password = $('#new_con_password').val();
        if(new_password != new_con_password){
          $('#new_con_password').val('');
          $('.psw_alert').show().delay(5000).fadeOut();
        }
      });

    </script>

    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
  </body>
</html>
