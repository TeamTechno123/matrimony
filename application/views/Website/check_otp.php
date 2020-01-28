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

    <title>BHARTIYA SHADI</title>
  </head>
  <body>
    <section class="navbar-top d-none d-sm-block">
       <div class="container">
         <div class="row">
           <div class="col-md-3">
            <img class="logo-img mt-2" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
           </div>
           <div class="col-md-9">
             <div class="row">
               <div class="col-md-3 offset-md-7 ">
                <label class="top-label" for="mobile">Enter OTP</label>
               </div>
               <!-- <div class="col-md-2">
                <label class="top-label" for="mobile">Password</label>
               </div> -->
               <div class="col-md-2">
               </div>
             </div>
            <form class="" action="<?php echo base_url(); ?>Member/verify_otp" method="post" >
              <div class="row">
                <div class="col-md-3 offset-md-7">
                   <input class="form-control form-control-sm only_number required " name="member_otp" type="text" maxlength="6" min="100000" class="form-control top-input" required>
                </div>
                <!-- <div class="col-md-3">
                  <input class="form-control form-control-sm" name="password" type="password" class="form-control top-input" required>
                </div> -->
                <div class="col-md-2">
                  <button type="submit" class="btn btn-outline-light btn-web">Verify</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-2 offset-md-10 text-left">
                 <label class="top-label font-12" for="mobile">Fogot Password</label>
              </div>
            </div>
           </div>

         </div>
       </div>
    </section>

    <section class="navbar-top d-block d-sm-none" >
      <div class="container">
        <div class="row">
          <div class="col-12">
           <img class="logo-img mt-2" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
          </div>
          <div class="col-12">
             <form class="" action="<?php echo base_url(); ?>Member/check_login" method="post" >
            <div class="row">
              <div class="col-12">
               <label class="top-label padding-8 text-center font-16 w-100" >Mobile No.</label>
              </div>
              <div class="col-12">
                 <input class="form-control form-control-sm  mobile only_number required " name="mobile_no" type="text" maxlength="10" min="6000000000" class="form-control top-input" required>
              </div>
              <div class="col-12">
               <label class="top-label padding-8 text-center font-16 w-100">Password</label>
              </div>
              <div class="col-12">
                <input  name="password" type="password" class="form-control  form-control-sm top-input" required>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-outline-light btn-web margin-8 w-100">Log In</button>
              </div>
              <div class="col-12">
                 <label class="top-label font-12" for="mobile">Fogot Password ?</label>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    </section>

    <section class="login-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>We Understand Your Dream's</h2>
            <img class="company-img" src="<?php echo base_url(); ?>assets/images/matri.png" alt="">
          </div>
          <div class="col-md-6">
            <div class="input-login">
              <form class="" action="<?php echo base_url(); ?>Member/save_member" method="post" autocomplete="off">
              <div class="row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm w-100 required title-case text" name="member_name" id="member_name"  placeholder="Enter Full Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <textarea name="member_address" id="member_address" class="form-control form-control-sm" rows="2" cols="80" placeholder="Enter Address"></textarea>
                  </div>
                  <div class="form-group col-md-6 ">
                    <select class="form-control select2 form-control-sm w-100" name="country_id" id="country_id" title="Select Country" data-placeholder="Select Country" required>
                      <option selected="selected" value="" >Select Country </option>
                      <?php foreach ($country_list as $list) { ?>
                        <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6 ">
                  <select class="form-control select2 form-control-sm w-100" name="state_id" id="state_id"  title="Select State" data-placeholder="Select State" required>
                    <option selected="selected" value="" >Select State </option>
                    <?php foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>

              <div class="form-group col-md-6 ">
              <select class="form-control select2 form-control-sm w-100" name="district_id" id="district_id"  title="Select District" data-placeholder="Select District" required>
                <option selected="selected" value="" >Select District </option>
                <?php foreach ($district_list as $list) { ?>
                  <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                <?php  } ?>
              </select>
            </div>
                <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100" name="tahasil_id" id="tahasil_id"  title="Select Tahasil" data-placeholder="Select Tahasil" required>
                  <option selected="selected" value="" >Select Tahasil </option>
                  <?php foreach ($tahasil_list as $list) { ?>
                    <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 ">
              <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id" title="Select City" data-placeholder="Select City" required>
                <option selected="selected" value="" >Select City </option>
                <?php foreach ($city_list as $list) { ?>
                  <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control form-control-sm" name="member_area" id="member_area"  title="Enter Area"  placeholder="Enter Area" required>
            </div>
            <div class="col-md-12">
              <div class="row">
              <div class="form-group col-md-2  col-4 mb-0">
                <label for="">Gender : </label>
              </div>
              <div class="form-group col-md-2 col-4 mb-0">
                <div class="form-check">
                  <input class="form-check-input" value="Male" type="radio" name="member_gender">
                  Male
                </div>
              </div>
              <div class="form-group col-md-2 col-4 mb-0">
                <div class="form-check">
                  <input class="form-check-input" value="Female" type="radio" name="member_gender">
                  Female
                </div>
              </div>
            </div>
          </div>

              <div class="form-group col-md-6">
                <input type="text" class="form-control form-control-sm" name="member_birth_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="Enter Birth date" placeholder="Enter Birth date" required>
              </div>

              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="language_id" id="language_id" title="Select Mother tongue" data-placeholder="Select Mother tongue" >
                  <option selected="selected" value="" >Select Mother tongue </option>
                  <?php foreach ($language_list as $list) { ?>
                    <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control form-control-sm " name="member_email" id="member_email" value="<?php if(isset($member_email)){ echo $member_email; } ?>" title="Enter Email" placeholder="Enter Email" required>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control form-control-sm mobile only_number" name="member_mobile" id="member_mobile" value="<?php if(isset($member_mobile)){ echo $member_mobile; } ?>" title="Enter Mobile" placeholder="Enter Mobile" required>
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control form-control-sm" name="member_password" id="member_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control form-control-sm" name="" id="confirm_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Confirm Password" placeholder="Confirm Password" required>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="profile_created_id" id="profile_created_id" title="Profile Created By" data-placeholder="Profile Created By" >
                  <option selected="selected" value="" >Profile Created By</option>
                  <?php foreach ($onbehalf_list as $list) { ?>
                    <option value="<?php echo $list->onbehalf_id ?>" <?php if(isset($onbehalf_id) && $onbehalf_id == $list->onbehalf_id ){ echo 'selected'; } ?>><?php echo $list->onbehalf_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="marital_status" id="marital_status" title="Select Marital Status" data-placeholder="Select Marital Status" >
                  <option selected="selected" value="" >Select Marital Status</option>
                  <?php foreach ($marital_status_list as $list) { ?>
                    <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id" title="Select Religion" data-placeholder="Select Religion" >
                  <option selected="selected" value="" >Select Religion</option>
                  <?php foreach ($religion_list as $list) { ?>
                    <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id" title="Select Caste" data-placeholder="Select Caste" >
                  <option selected="selected" value="" >Select Caste</option>
                  <?php foreach ($cast_list as $list) { ?>
                    <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                  <?php  } ?>
                </select>
              </div>

              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-success mr-3">Save</button>
                <button type="button" class="btn btn-info">Cancel</button>
              </div>
          </div>
      </form>
      </div>
      </div>
    </div>
</div>
</section>


<?php //include("footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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

    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
  </body>
</html>
