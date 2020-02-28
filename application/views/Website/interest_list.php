<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id');
      $mat_member_status = $this->session->userdata('mat_member_status');
      $mat_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">
          <?php if(isset($sent_list)){  echo 'Sent Interest List';  }
          elseif (isset($received_list)) {  echo 'Recieved Interest List'; } ?>

        </h1>
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
          <div class="adv pt-4">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
            <br>
          </div>

        </div>
        <div class="col-md-9">
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-12 p-0">
                  <!-- <div class="card card-red" style="width: 100%;"> -->

                      <?php if($interest_list){
                        $interest_sent = '';
                        $shortlist_sent = '';
                        foreach ($interest_list as $list) {
                          $today = date('d-m-Y');
                          $birthdate = $list->member_birth_date;
                          $age =  date_diff(date_create($birthdate), date_create($today))->y;
                          $member_id = $list->member_id;
                          $get_interest = $this->Member_Model->get_interest($mat_member_id,$member_id,'interest_id');
                          if($get_interest){
                            $interest_sent = 'sent';
                            // $interest_status = $get_interest[0]['interest_status'];
                          }

                          $get_shortlist = $this->Member_Model->get_shortlist($mat_member_id,$member_id,'shortlist_id');
                          if($get_shortlist){
                            $shortlist_sent = 'sent';
                          }
                      ?>
                      <!-- <div class="card-body"> -->
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
                                <div class="col-md-4 col-12">
                              <h5 class="mb-1 text-danger text-bold f-18"> <?php echo $list->member_name; ?></h5>
                            </div>
                            <div class="col-md-4 col-12">
                             <p class="mb-1"> <span class="text-bold">Age </span>  : <?php echo $age; ?> </p>
                            </div>
                            <div class="col-md-4 col-12">
                             <p class="mb-1"> <span class="text-bold"> Member ID</span> : <?php echo $list->member_id; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Marital Status ( वैवाहिक स्थिति )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list->marital_status_name; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Religion ( धर्म )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list->religion_name; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Cast ( जाति )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list->cast_name; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Occupation ( व्यवसाय)</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list->occupation_name; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Education ( शिक्षा )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list->education_name; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-12 mt-3">
                              <ul  class="inline p-0" style="display: inline; list-style-type:none;">
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
                                <!-- <li>
                                  <?php if($interest_sent == ''){ ?>
                                    <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                                  <?php } else{ ?>
                                    <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                                  <?php } ?>
                                </li> -->
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
                                <li>
                                  <?php if(isset($sent_list)){ if($list->interest_status == 0){ ?>
                                    <span class="right badge badge-warning">Pending</span>
                                  <?php } else if($list->interest_status == 1){ ?>
                                    <span class="right badge badge-success">Accepted</span>
                                  <?php } else if($list->interest_status == 2){ ?>
                                    <span class="right badge badge-danger">Rejected</span>
                                  <?php } } elseif (isset($received_list)) {
                                    // echo $list->to_member_id;
                                    if($list->interest_status == 0){ ?>
                                    <button class="btn btn-success btn-sm btn_accept_interest accept" interest="1" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Accept</button>
                                    <button class="btn btn-danger btn-sm btn_accept_interest reject" interest="2" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Reject</button>
                                  <?php } else if($list->interest_status == 1){ ?>
                                    <button class="btn btn-success btn-sm" type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Accepted</button>
                                  <?php } else if($list->interest_status == 2){ ?>
                                    <button class="btn btn-danger btn-sm" type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Rejected</button>
                                  <?php } } ?>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>

<!-- </div> -->

                      <?php  }
                      } ?>

                    <!-- </div> -->
                   </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-block d-sm-none">
            <div class="adv pt-4">
              <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
              <br>
            </div>
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

  </section>


<?php //include("footer.php"); ?>
<?php include("script.php"); ?>

<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">

  $('.btn_accept_interest').on('click',function(){
    var to_member_id = $(this).attr('to_member_id');
    var from_member_id = <?php echo $mat_member_id; ?>;
    var interest = $(this).attr('interest');
    $.ajax({
      url:'<?php echo base_url(); ?>Member/accept_interest',
      method:'post',
      data:{'from_member_id':to_member_id,
            'to_member_id':from_member_id,
            'interest':interest },
      context: this,
      success:function(result){
        if(interest == 1){
          toastr.success('Interest Acepted successfully');
          $(this).html('<i class="fa fa-heart" aria-hidden="true" ></i> Accepted');
          $(this).closest('li').find('.reject').attr('disabled','true');
        } else{
          toastr.error('Interest Rejected successfully');
          $(this).html('<i class="fa fa-heart" aria-hidden="true" ></i> Rejected');
          $(this).closest('li').find('.accept').attr('disabled','true');
        }

        $(this).attr('disabled','true');

      }
    });
  });

  // Send Message...
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

  $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    margin:40,
    padding:30,
    dots: true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
});
  </script>
