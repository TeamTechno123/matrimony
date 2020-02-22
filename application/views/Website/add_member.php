<?php include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
  $mat_member_user_id = $this->session->userdata('mat_member_user_id');
?>
<style media="screen">
  label{
    font-size: 14px;
  }
</style>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Add New Lead</h1>
      </div>
    </div>
  </div>
</section>

<section class="profile-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3  d-none d-sm-block">
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
          </div>
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
          </div>
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image3; ?>" width="100%" height="60%" alt="">
          </div>
        </div>

        <div class="col-12 d-block d-sm-none">
          <div class="adv pt-1">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
            <br>
          </div>
        </div>

        <div class="col-md-9">
          <div class="row">
            <div class="card card-red" style="width: 100%;">
              <div class="card-body">
                <form class="" action="<?php echo base_url(); ?>Member/save_member" method="post" autocomplete="off">
                  <input type="hidden" name="member_addedby" value="<?php echo $mat_member_user_id; ?>">
                  <div class="row">
                    <div class="form-group col-md-2 pr-0">
                      <label>Full Name</label>
                    </div>
                    <div class="form-group col-md-10">
                      <input type="text" class="form-control form-control-sm w-100 required title-case text" name="member_name" id="member_name"  placeholder="Enter Full Name" required>
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>Address</label>
                    </div>
                    <div class="form-group col-md-10">
                      <textarea name="member_address" id="member_address" class="form-control form-control-sm" rows="2" cols="80" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>Country</label>
                    </div>
                    <div class="form-group col-md-4 ">
                      <select class="form-control select2 form-control-sm w-100" name="country_id" id="country_id" title="Select Country" data-placeholder="Select Country" required>
                        <option selected="selected" value="" >Select Country </option>
                        <?php foreach ($country_list as $list) { ?>
                          <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>State</label>
                    </div>
                    <div class="form-group col-md-4 ">
                      <select class="form-control select2 form-control-sm w-100" name="state_id" id="state_id"  title="Select State" data-placeholder="Select State" required>
                        <option selected="selected" value="" >Select State </option>
                        <!-- <?php foreach ($state_list as $list) { ?>
                          <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                        <?php  } ?> -->
                      </select>
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>District</label>
                    </div>
                    <div class="form-group col-md-4 ">
                      <select class="form-control select2 form-control-sm w-100" name="district_id" id="district_id"  title="Select District" data-placeholder="Select District" required>
                        <option selected="selected" value="" >Select District </option>
                        <!-- <?php foreach ($district_list as $list) { ?>
                          <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                        <?php  } ?> -->
                        <!-- <option value="-1">Other</option> -->
                      </select>
                      <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_district_name" id="other_district_name" placeholder="Enter District Name">
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>Tahsil</label>
                    </div>
                    <div class="form-group col-md-4 ">
                      <select class="form-control select2 form-control-sm w-100" name="tahasil_id" id="tahasil_id"  title="Select Tahsil" data-placeholder="Select Tahsil" required>
                        <option selected="selected" value="" >Select Tahsil </option>
                        <!-- <?php foreach ($tahasil_list as $list) { ?>
                          <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                        <?php  } ?> -->
                        <!-- <option value="-1">Other</option> -->
                      </select>
                      <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_tahasil_name" id="other_tahasil_name" title="Enter Tahsil Name"  placeholder="Enter Tahsil Name">
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>City</label>
                    </div>
                    <div class="form-group col-md-4 ">
                      <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id" title="Select City" data-placeholder="Select City" required>
                        <option selected="selected" value="" >Select City </option>
                        <!-- <?php foreach ($city_list as $list) { ?>
                          <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                        <?php  } ?> -->
                        <!-- <option value="-1">Other</option> -->
                      </select>
                      <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_city_name" id="other_city_name" title="Enter City Name"  placeholder="Enter City Name">
                    </div>
                    <div class="form-group col-md-2 pr-0">
                      <label>Area</label>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" class="form-control form-control-sm" name="member_area" id="member_area"  title="Enter Area"  placeholder="Enter Area" required>
                    </div>

                    <div class="form-group col-md-2  col-4">
                      <label for="">Gender</label>
                    </div>
                    <div class="form-group col-md-2 col-4">
                      <div class="form-check">
                        <input class="form-check-input" value="Male" type="radio" name="member_gender">
                        Male
                      </div>
                    </div>
                    <div class="form-group col-md-2 col-4">
                      <div class="form-check">
                        <input class="form-check-input" value="Female" type="radio" name="member_gender">
                        Female
                      </div>
                    </div>
                    <div class="form-group col-md-6"></div>

                  <div class="form-group col-md-2 pr-0">
                    <label>Birthdate</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="member_birth_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="Enter Birth date" placeholder="Enter Birth date" required>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Mother Tongue</label>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="language_id" id="language_id" title="Select Mother Tongue" data-placeholder="Select Mother Tongue" >
                      <option selected="selected" value="" >Select Mother Tongue </option>
                      <?php foreach ($language_list as $list) { ?>
                        <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Email</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="email" class="form-control form-control-sm " name="member_email" id="member_email" value="<?php if(isset($member_email)){ echo $member_email; } ?>" title="Enter Email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Mobile</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm mobile only_number" name="member_mobile" id="member_mobile" value="<?php if(isset($member_mobile)){ echo $member_mobile; } ?>" title="Enter Mobile" placeholder="Enter Mobile" required>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Password</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="password" class="form-control form-control-sm" name="member_password" id="member_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Confirm Password</label>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="password" class="form-control form-control-sm" name="" id="confirm_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Confirm Password" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Created By</label>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="profile_created_id" id="profile_created_id" title="Profile Created By" data-placeholder="Profile Created By" >
                      <option selected="selected" value="" >Profile Created By</option>
                      <?php foreach ($onbehalf_list as $list) { ?>
                        <option value="<?php echo $list->onbehalf_id ?>" <?php if(isset($onbehalf_id) && $onbehalf_id == $list->onbehalf_id ){ echo 'selected'; } ?>><?php echo $list->onbehalf_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Marital Status</label>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="marital_status" id="marital_status" title="Select Marital Status" data-placeholder="Select Marital Status" >
                      <option selected="selected" value="" >Select Marital Status</option>
                      <?php foreach ($marital_status_list as $list) { ?>
                        <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Religion</label>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id" title="Select Religion" data-placeholder="Select Religion" >
                      <option selected="selected" value="" >Select Religion</option>
                      <?php foreach ($religion_list as $list) { ?>
                        <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2 pr-0">
                    <label>Caste</label>
                  </div>
                  <div class="form-group col-md-4 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id" title="Select Caste" data-placeholder="Select Caste" >
                      <option selected="selected" value="" >Select Caste</option>
                      <!-- <?php foreach ($cast_list as $list) { ?>
                        <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                      <?php  } ?> -->
                      <option value="-1">Other</option>
                    </select>
                    <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_cast_name" id="other_cast_name" title="Enter Caste"  placeholder="Enter Caste">
                  </div>

                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success mr-3">Save</button>
                    <a href="<?php echo base_url(); ?>Member/profile" class="btn btn-info">Cancel</a>
                  </div>
              </div>
          </form>
              </div>
            </div>

          </div>
        </div>

        <div class="col-12 d-block d-sm-none">
          <div class="adv pt-4">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image3; ?>" width="100%" height="60%" alt="">
            <br>
          </div>
        </div>
      </div>
    </div>

  </section>

<!-- End of Quick Info Update Modal -->

<?php //include("footer.php"); ?>
<?php include("script.php"); ?>


  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

  <script type="text/javascript">

    var member_mobile1 = $('#member_mobile').val();
    $('#member_mobile').on('change',function(){
      var member_mobile = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/check_duplication',
        type: 'POST',
        data: {"column_name":"user_mobile",
               "column_val":member_mobile,
               "table_name":"user"},
        context: this,
        success: function(result){
          if(result > 0){
            $('#member_mobile').val(member_mobile1);
            toastr.error(member_mobile+' Mobile No Exist.');
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

  <script type="text/javascript">
    $("#cast_id").on("change", function(){
      var cast_id =  $('#cast_id').find("option:selected").val();
      if(cast_id == '-1'){
        $('#other_cast_name').css('display','block');
        $('#other_cast_name').attr('required',true);
      } else{
        $('#other_cast_name').css('display','none');
        $('#other_cast_name').attr('required',false);
      }
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      if(district_id == '-1'){
        $('#other_district_name').css('display','block');
        $('#other_district_name').attr('required',true);
        $("#other_district_name").focus();
      } else{
        $('#other_district_name').css('display','none');
        $('#other_district_name').attr('required',false);
      }
    });

    $("#tahasil_id").on("change", function(){
      var tahasil_id =  $('#tahasil_id').find("option:selected").val();
      if(tahasil_id == '-1'){
        $('#other_tahasil_name').css('display','block');
        $('#other_tahasil_name').attr('required',true);
      } else{
        $('#other_tahasil_name').css('display','none');
        $('#other_tahasil_name').attr('required',false);
      }
    });

    $("#city_id").on("change", function(){
      var city_id =  $('#city_id').find("option:selected").val();
      if(city_id == '-1'){
        $('#other_city_name').css('display','block');
        $('#other_city_name').attr('required',true);
      } else{
        $('#other_city_name').css('display','none');
        $('#other_city_name').attr('required',false);
      }
    });
  </script>
