<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id'); ?>
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
          <div class="adv">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
             <br>
          </div>

          <div class="adv ">
            <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
             <br>
          </div>

          <div class="adv">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
             <br>
          </div>
        </div>

        <div class="col-md-9">
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-red" style="width: 100%;">
                    <div class="card-body">
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
                        <div class="tab-div">
                          <div class="row">
                            <div class="col-md-3 col-12">
                              <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" alt="">
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
                                <p class="mb-1 "><?php echo $list->marital_status; ?></p>
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

                            <div class="col-12 mt-1">
                              <ul  class="inline" style="display: inline; list-style-type:none;">
                                <li class="pt-2">
                                  <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                                </li>
                                <!-- <li>
                                  <?php if($interest_sent == ''){ ?>
                                    <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                                  <?php } else{ ?>
                                    <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                                  <?php } ?>
                                </li> -->
                                <li>
                                  <button class="btn btn-success btn-sm act_btn btn_open_modal" to_member_id="<?php echo $list->member_id; ?>" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
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
                </div>


                      <?php  }
                      } ?>
                    </div>
                   </div>
                </div>
              </div>
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


<?php include("footer.php"); ?>

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
  })
  </script>
