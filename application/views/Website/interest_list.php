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
                                <p class="mb-1">Member ID</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 text-danger"><?php echo $list->member_id; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-3 col-6">
                                <p class="mb-1">Age</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 "><?php echo $age; ?></p>
                            </div>
                            <div class="col-12 d-block d-sm-none">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1">Marital Status</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 "><?php echo $list->marital_status; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-3 col-6">
                                <p class="mb-1">Religion</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 "><?php echo $list->religion_name; ?></p>
                            </div>
                            <div class="col-12 d-block d-sm-none">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1">Caste</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 "><?php echo $list->cast_name; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-3 col-6">
                                <p class="mb-1">Occupation</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1 "><?php echo $list->occupation_name; ?></p>
                            </div>
                            <div class="col-12 d-block d-sm-none">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-3 col-6">
                                <p class="mb-1">Education</p>
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
                                    Pending
                                  <?php } else if($list->interest_status == 1){ ?>
                                    Accepted
                                  <?php } } elseif (isset($received_list)) {
                                    // echo $list->to_member_id;
                                    if($list->interest_status == 0){ ?>
                                    <button class="btn btn-success btn-sm btn_accept_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Accept Interest</button>
                                  <?php } else if($list->interest_status == 1){ ?>
                                    <button class="btn btn-success btn-sm" type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Accepted</button>
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
  </section>




<?php include("footer.php"); ?>

<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">

  $('.btn_accept_interest').on('click',function(){
    var to_member_id = $(this).attr('to_member_id');
    var from_member_id = <?php echo $mat_member_id; ?>;
    $.ajax({
      url:'<?php echo base_url(); ?>Member/accept_interest',
      method:'post',
      data:{'from_member_id':to_member_id,
            'to_member_id':from_member_id},
      context: this,
      success:function(result){
        toastr.success('Interest Acepted successfully');
        $(this).html('<i class="fa fa-heart" aria-hidden="true" ></i> Accepted');
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
