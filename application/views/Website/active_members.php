<?php
  include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
  $mat_member_status = $this->session->userdata('mat_member_status');
  $mat_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
?>
  <body>
    <section class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Active Members</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="profile-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 d-none d-sm-block">
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
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>
          <div class="col-md-9">
          <?php if($active_members_list){
            $interest_sent = '';
            $shortlist_sent = '';
            foreach ($active_members_list as $list) {
              $today = date('d-m-Y');
              $birthdate = $list->member_birth_date;
              $age =  date_diff(date_create($birthdate), date_create($today))->y;
              $member_id = $list->member_id;
              $get_interest = $this->Member_Model->get_interest($mat_member_id,$member_id,'interest_id');

              if($get_interest){
              $interest_sent = 'sent';
                // $interest_status = $get_interest[0]['interest_status'];
              }

              // $get_shortlist = $this->Member_Model->get_shortlist($mat_member_id,$member_id,'shortlist_id');
              // if($get_shortlist){
              //   $shortlist_sent = 'sent';
              // }
          ?>
          <div class="tab-div">
            <div class="row">
              <div class="col-md-3 col-12">
                <?php if($list->member_img == ''){  ?>
                  <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" width="100%" alt="">
                <?php } else{ ?>
                  <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_img; ?>" width="100%" alt="">
                <?php } ?>
              </div>
              <div class="col-md-9 col-12">
                <div class="row">
                  <div class=" col-md-6 col-12">
                <h5 class="mb-1 text-danger text-bold f-18"> <?php echo $list->member_name; ?></h5>
              </div>
              <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Member ID</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 text-danger"><?php echo $list->member_id; ?></p>
              </div>

              <div class="col-12">
                  <hr class="hr-web">
              </div>

              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Age</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $age; ?></p>
              </div>
              <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Marital Status</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $list->marital_status_name; ?></p>
              </div>

              <div class="col-12">
                  <hr class="hr-web">
              </div>

              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Religion</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $list->religion_name; ?></p>
              </div>
              <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Caste</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $list->cast_name; ?></p>
              </div>

              <div class="col-12">
                  <hr class="hr-web">
              </div>

              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Occupation</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $list->occupation_name; ?></p>
              </div>
              <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 text-bold">Education</p>
              </div>
              <div class="col-md-3 col-6">
                  <p class="mb-1 "><?php echo $list->education_name; ?></p>
              </div>
              <div class="col-12">
                  <hr class="hr-web">
              </div>

              <div class="col-12 mt-3">
                <ul class="inline p-0" style="display: inline; list-style-type:none;">
                  <li class="pt-2">
                    <?php if($mat_member_status == 'free'){
                      if($mat_member_info[0]['country_id'] == '' || $mat_member_info[0]['state_id'] == '' || $mat_member_info[0]['district_id'] == '' || $mat_member_info[0]['tahasil_id'] == ''){
                    ?>
                      <button class="btn btn-success btn-sm act_btn btn_open_modal" data-toggle="modal" data-target="#profile_complete_Modal"><i class="fa fa-address-card" aria-hidden="true"></i>  Full Profile</button>
                    <?php } else{ ?>
                      <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-success btn-sm act_btn " ><i class="fa fa-envelope" aria-hidden="true"></i> Full Profile</a>
                    <?php } }  else{ ?>
                      <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                    <?php } ?>
                  </li>
                  <li>
                    <?php if($get_interest){ ?>
                       <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                    <?php } else{ ?>
                      <button class="btn btn-success btn-sm act_btn btn_exp_interest" id="btn_exp_interest_<?php echo $list->member_id; ?>" to_member_id="<?php echo $list->member_id; ?>"  data-toggle="modal" data-target="#exp_interest"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                    <?php } ?>
                  </li>
                  <li>
                    <?php if($mat_member_status == 'free'){
                    if($mat_member_info[0]['country_id'] == '' || $mat_member_info[0]['state_id'] == '' || $mat_member_info[0]['district_id'] == '' || $mat_member_info[0]['tahasil_id'] == ''){
                   ?><button class="btn btn-success btn-sm act_btn btn_open_modal" data-toggle="modal" data-target="#profile_complete_Modal"><i class="fa fa-envelope" aria-hidden="true"></i>  Message</button>
                 <?php } else{ ?>
                      <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-success btn-sm act_btn " ><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
                    <?php } }  else{ ?>
                      <button class="btn btn-success btn-sm act_btn btn_open_modal" to_member_id="<?php echo $list->member_id; ?>" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
                    <?php } ?>
                  </li>
                  <!-- <li>
                    <?php if($shortlist_sent == ''){ ?>
                      <button class="btn btn-success btn-sm act_btn btn_shortlist" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Shorllist</button>
                    <?php } else{ ?>
                      <button class="btn btn-success btn-sm act_btn " type="submit" disabled><i class="fa fa-list" aria-hidden="true" disabled></i> Shorllisted</button>
                    <?php } ?>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php  } } ?>
  </div>

  <div class="col-12 d-block d-sm-none">
    <div class="adv pt-4">
      <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
      <br>
    </div>
  </div>

            <br><br>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="profile_complete_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Update Profile Information.
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
              <a href="<?php echo base_url(); ?>Member/profile" class="btn btn-secondary">Close</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exp_interest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send Interest</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Do You Want to Send Interest.
              <input type="hidden"  id="interest_to_member_id" name="interest_to_member_id">
              <input type="hidden"  id="interest_to_btn_id" name="interest_to_btn_id">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" id="btn_int_send" data-dismiss="modal" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="" method="post">
                <input type="hidden"  id="to_member_id" name="to_member_id">
                <textarea name="message_text" id="message_text" class="form-control form-control-sm" rows="4" cols="80" placeholder="Type your message..." required></textarea>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="btn_msg_send" data-dismiss="modal" class="btn btn-primary">Send</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Advance Search</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form class="" action="<?php echo base_url(); ?>Member/search_member_list" method="post" autocomplete="off">
                <div class="row">
                  <!-- <div class="form-group col-md-2">
                    Looking For :
                  </div>
                  <div class="form-group col-md-4">
                    <select class="form-control select2 form-control-sm" name="min_age" id="min_age2" style="width:100% !important;">
                      <option selected="selected" > Bride </option>
                      <option>Groom</option>
                    </select>
                  </div> -->
                  <div class="form-group col-md-2">
                    Age From :
                  </div>
                  <div class="form-group col-md-2">
                    <select class="form-control select2 form-control-sm" name="min_age" id="min_age2" style="width:100% !important;">
                      <option selected="selected" value="" > Min </option>
                      <?php for ($i=18; $i < 100 ; $i++) { ?>
                        <option><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select class="form-control select2 form-control-sm w-100" name="max_age" id="max_age2" style="width:100% !important;">
                      <option selected="selected" value="" > Max </option>
                      <?php for ($i=18; $i < 100 ; $i++) { ?>
                        <option><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    Height :
                  </div>
                  <div class="form-group col-md-2">
                    <select class="form-control select2 form-control-sm" name="min_height" id="min_height" style="width:100% !important;">
                      <option selected="selected" value="" > Min </option>
                      <?php foreach ($height_list as $list) { ?>
                        <option value="<?php echo $list->height_id ?>" <?php if(isset($height_id) && $height_id == $list->height_id ){ echo 'selected'; } ?>><?php echo $list->height_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <select class="form-control select2 form-control-sm w-100" name="max_height" id="max_height" style="width:100% !important;">
                      <option selected="selected" value="" > Max </option>
                      <?php foreach ($height_list as $list) { ?>
                        <option value="<?php echo $list->height_id ?>" <?php if(isset($height_id) && $height_id == $list->height_id ){ echo 'selected'; } ?>><?php echo $list->height_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id" title="Select Religion" data-placeholder="Select Religion" style="width:100% !important;">
                      <option selected="selected" value="" >Select Religion</option>
                      <?php foreach ($religion_list as $list) { ?>
                        <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id" title="Select Caste" data-placeholder="Select Caste" style="width:100% !important;">
                      <option selected="selected" value="" >Select Caste</option>
                      <!-- <?php foreach ($cast_list as $list) { ?>
                        <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                      <?php  } ?> -->
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" data-placeholder="Marital Status" name="marital_status_id" id="marital_status_id" style="width:100% !important;">
                      <option selected="selected" value="" >Marital Status</option>
                      <?php foreach ($marital_status_list as $list) { ?>
                        <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" data-placeholder="Occupation" name="occupation_id" id="occupation_id" style="width:100% !important;">
                      <option selected="selected" value="" >Occupation</option>
                      <?php foreach ($occupation_list as $list) { ?>
                        <option value="<?php echo $list->occupation_id ?>" <?php if(isset($occupation_id) && $occupation_id == $list->occupation_id ){ echo 'selected'; } ?>><?php echo $list->occupation_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6 ">
                  <select class="form-control select2 form-control-sm w-100 " name="state_id" id="state_id" title="Select State" data-placeholder="Select State" style="width:100% !important;">
                    <option selected="selected" value="" >State </option>
                    <?php foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>

                <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100 " name="district_id" id="district_id" title="Select District" data-placeholder="Select District" style="width:100% !important;">
                  <option selected="selected" value="" >District </option>
                  <!-- <?php foreach ($district_list as $list) { ?>
                    <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                  <?php  } ?> -->
                </select>
              </div>
                  <div class="form-group col-md-6 ">
                  <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id" title="Select City" data-placeholder="Select City" style="width:100% !important;">
                    <option selected="selected" value="" >City </option>
                    <!-- <?php foreach ($city_list as $list) { ?>
                      <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                    <?php  } ?> -->
                  </select>
                </div>


                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="language_id" id="language_id" title="Select Mother Tongue" data-placeholder="Select Mother Tongue" style="width:100% !important;">
                      <option selected="selected" value="" > Mother Tongue </option>
                      <?php foreach ($language_list as $list) { ?>
                        <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="education_id" id="education_id" title="Select Education" data-placeholder="Select Education" style="width:100% !important;">
                      <option selected="selected" value="" > Education </option>
                      <?php foreach ($education_list as $list) { ?>
                        <option value="<?php echo $list->education_id ?>" <?php if(isset($education_id) && $education_id == $list->education_id ){ echo 'selected'; } ?>><?php echo $list->education_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="diet_id" id="diet_id" title="Select Diet" data-placeholder="Select Diet" style="width:100% !important;">
                      <option selected="selected" value="" >Select Diet </option>
                      <?php foreach ($diet_list as $list) { ?>
                        <option value="<?php echo $list->diet_id ?>" <?php if(isset($diet_id) && $diet_id == $list->diet_id ){ echo 'selected'; } ?>><?php echo $list->diet_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 drop-sm">
                    <select class="form-control select2 form-control-sm w-100" name="marriage_type_id" id="marriage_type_id" title="Interested In" data-placeholder="Select Marriage Type" >
                      <option selected="selected" value="" >Select Marriage Type</option>
                      <?php foreach ($marriage_type_list as $list) { ?>
                        <option value="<?php echo $list->marriage_type_id ?>" <?php if(isset($marriage_type_id) && $marriage_type_id == $list->marriage_type_id ){ echo 'selected'; } ?>><?php echo $list->marriage_type_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="Submit" id="btn_adv_search" class="btn btn-primary">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>




    </section>

<?php include("script.php"); ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->

    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
    // Send Interest...
    $('.btn_exp_interest').on('click',function(){
      var to_member_id = $(this).attr('to_member_id');
      var btn_exp_interest_id = $(this).attr('id');
      $('#interest_to_member_id').val(to_member_id);
      $('#interest_to_btn_id').val(btn_exp_interest_id);


    });

    $('#btn_int_send').on('click',function(){
      var from_member_id = <?php echo $mat_member_id; ?>;
      var to_member_id = $('#interest_to_member_id').val();
      var interest_to_btn_id = $('#interest_to_btn_id').val();

      $.ajax({
        url:'<?php echo base_url(); ?>Member/add_interest',
        method:'post',
        data:{'from_member_id':from_member_id,
              'to_member_id':to_member_id},
        context: this,
        success:function(result){
          if(result == 'success'){
            toastr.success('Interest sent successfully');
            $('#'+interest_to_btn_id).html('<i class="fa fa-heart" aria-hidden="true" ></i> Expressed Interest');
            $('#'+interest_to_btn_id).attr('disabled','true');
          } else{
            toastr.error('Interest not sent');
          }
        }
      });
    });



    $('.btn_open_modal').on('click',function(){
      var to_member_id = $(this).attr('to_member_id');
      $('#to_member_id').val(to_member_id);
    });

    $('#btn_msg_send').on('click',function(){
      var to_member_id = $('#to_member_id').val();
      var from_member_id = <?php echo $mat_member_id; ?>;
      var message_text = $('#message_text').val();
      if(message_text == ''){
        toastr.error('Message field is empty');
      } else{
        $('#message_text').val('');
        $.ajax({
          url:'<?php echo base_url(); ?>Member/add_message',
          method:'post',
          data:{'from_member_id':from_member_id,
                'to_member_id':to_member_id,
                'message_text':message_text},
          success:function(result){
            if(result == 'success'){
              toastr.success('Message Sent successfully');
            } else{
              toastr.error('Message Not Sent');
            }
          }
        });
      }
    });

    // Shortlist....
    // $('.btn_shortlist').on('click',function(){
    //   var from_member_id = <?php echo $mat_member_id; ?>;
    //   var to_member_id = $(this).attr('to_member_id');
    //
    //   $.ajax({
    //     url:'<?php echo base_url(); ?>Member/add_shortlist',
    //     method:'post',
    //     data:{'from_member_id':from_member_id,
    //           'to_member_id':to_member_id},
    //     context: this,
    //     success:function(result){
    //       if(result == 'success'){
    //         toastr.success('Profile Shortlisted successfully');
    //         $(this).html('<i class="fa fa-list" aria-hidden="true" ></i> Shortlisted');
    //         $(this).attr('disabled','true');
    //       } else{
    //         toastr.error('Profile Shortlist Error');
    //       }
    //     }
    //   });
    // });

    $(document).ready(function(){
        $('#filter').show();
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
