<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id'); ?>
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
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
            <div class="adv mb-4">
              <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
               <br>
            </div>
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
               <br>
            </div>
          </div>
          <div class="col-12 d-block d-sm-none">
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
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
                  <h5 class="mb-1 text-black text-bold f-18"> <?php echo $list->member_name; ?></h5>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2">Member ID</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 text-black"><?php echo $list->member_id; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-2">Age</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $age; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2">Marital Status</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $list->marital_status; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-2">Religion</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $list->religion_name; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2">Caste</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $list->cast_name; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-2">Occupation</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $list->occupation_name; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2">Education</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-2"><?php echo $list->education_name; ?></p>
                </div>
                <div class="col-12">
                    <hr class="hr-web">
                </div>


                <div class="col-12 mt-4 mb-2">
                  <ul  class="inline" style="display: inline; list-style-type:none;">
                    <li class="pt-2">
                      <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                    </li>
                    <li>
                      <?php
                      //echo $interest_sent;
                       if($get_interest){ ?>
                         <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                      <?php } else{ ?>
                     <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                      <?php } ?>
                    </li>
                    <li>
                      <button class="btn btn-success btn-sm act_btn btn_open_modal" to_member_id="<?php echo $list->member_id; ?>" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
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
    <?php  }
    } ?>
  </div>

  <div class="col-12 d-block d-sm-none">
    <div class="adv pt-4">
      <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
      <br>
    </div>
  </div>

            <br><br>
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
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="marital_status_id" id="marital_status_id" style="width:100% !important;">
                      <option selected="selected" value="" > Marital Status </option>
                      <?php foreach ($marital_status_list as $list) { ?>
                        <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="occupation_id" id="occupation_id" style="width:100% !important;">
                      <option selected="selected" value="" > Occupation </option>
                      <?php foreach ($occupation_list as $list) { ?>
                        <option value="<?php echo $list->occupation_id ?>" <?php if(isset($occupation_id) && $occupation_id == $list->occupation_id ){ echo 'selected'; } ?>><?php echo $list->occupation_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 ">
                  <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id" title="Select City" data-placeholder="Select City" style="width:100% !important;">
                    <option selected="selected" value="" >City </option>
                    <?php foreach ($city_list as $list) { ?>
                      <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>
                  <div class="form-group col-md-6">
                    <select class="form-control select2 form-control-sm w-100" name="language_id" id="language_id" style="width:100% !important;">
                      <option selected="selected" value="" > Mother Tongue </option>
                      <?php foreach ($language_list as $list) { ?>
                        <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
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
                      <?php foreach ($cast_list as $list) { ?>
                        <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
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
    // Send Interest...
    $('.btn_exp_interest').on('click',function(){
      var from_member_id = <?php echo $mat_member_id; ?>;
      var to_member_id = $(this).attr('to_member_id');

      $.ajax({
        url:'<?php echo base_url(); ?>Member/add_interest',
        method:'post',
        data:{'from_member_id':from_member_id,
              'to_member_id':to_member_id},
        context: this,
        success:function(result){
          if(result == 'success'){
            toastr.success('Interest sent successfully');
            $(this).html('<i class="fa fa-heart" aria-hidden="true" ></i> Expressed Interest');
            $(this).attr('disabled','true');
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
