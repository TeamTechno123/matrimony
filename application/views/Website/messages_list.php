<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id'); ?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">
          Messages List
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
                      <?php if($messages_member_list){
                        $interest_sent = '';
                        $shortlist_sent = '';
                        foreach ($messages_member_list as $list) {
                          $today = date('d-m-Y');
                          $birthdate = $list->member_birth_date;
                          $age =  date_diff(date_create($birthdate), date_create($today))->y;
                          $member_id = $list->member_id;
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
                                <li>
                                  <a href="<?php echo base_url(); ?>Member/messages/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn btn_msg" to_member_id="<?php echo $list->member_id; ?>" ><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
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
    <!-- <form id="form_msg" action="<?php echo base_url(); ?>Member/messages" method="post">
      <input type="hidden" id="to_member_id" name="to_member_id">
    </form> -->
  </section>


<?php include("footer.php"); ?>

<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">

  // $('.btn_msg').on('click',function(){
  //   var to_member_id = $(this).attr('to_member_id');
  //   $('#to_member_id').val(to_member_id);
  //   $('#form_msg').submit();
  // });

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
