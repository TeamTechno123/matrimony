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
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
            <br>
          </div>
        </div>

        <div class="col-md-9">
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-12 p-0">
                      <?php if($messages_member_list){
                        $interest_sent = '';
                        $shortlist_sent = '';
                        foreach ($messages_member_list as $list2) {
                          $msg_member_id = $list2->msg_member_id;

                          $member_info = $this->Member_Model->get_member_info($msg_member_id);
                          foreach ($member_info as $list) {
                          }
                          $today = date('d-m-Y');
                          $birthdate = $list['member_birth_date'];
                          $age =  date_diff(date_create($birthdate), date_create($today))->y;
                          $member_id = $list['member_id'];
                      ?>
                        <div class="tab-div">
                          <div class="row">
                            <div class="col-md-3 col-12">
                              <?php if($list['member_img']  == ''){  ?>
                                <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" width="100%" alt="">
                              <?php } else{ ?>
                                <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list['member_img']; ?>" width="100%" alt="">
                              <?php } ?>
                            </div>
                            <div class="col-md-9 col-12">
                              <div class="row">
                            <div class="col-md-4 col-12">
                          <h5 class="mb-1 text-danger text-bold f-18"> <?php echo $list['member_name']; ?></h5>
                        </div>
                        <div class="col-md-4 col-12">
                         <p class="mb-1"> <span class="text-bold">Age </span>  : <?php echo $age; ?> </p>
                        </div>
                        <div class="col-md-4 col-12">
                         <p class="mb-1"> <span class="text-bold"> Member ID</span> : <?php echo $list['member_id']; ?></p>
                        </div>
                        <div class="col-12">
                            <hr class="hr-web">
                        </div>

                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Marital Status ( वैवाहिक स्थिति )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list['marital_status_name']; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Religion ( धर्म )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list['religion_name']; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Cast ( जाति )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list['cast_name']; ?></p>
                            </div>

                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Occupation ( व्यवसाय)</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list['occupation_name']; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>
                            <div class="col-md-5 col-6">
                                <p class="mb-1 text-bold">Education ( शिक्षा )</p>
                            </div>
                            <div class="col-md-7 col-6">
                                <p class="mb-1 "><?php echo $list['education_name']; ?></p>
                            </div>
                            <div class="col-12">
                                <hr class="hr-web">
                            </div>

                            <div class="col-12 mt-3">
                              <ul  class="inline" style="display: inline; list-style-type:none;">
                                <li class="pt-2">
                                  <?php if($mat_member_status == 'free'){?>
                                    <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-success btn-sm act_btn " ><i class="fa fa-envelope" aria-hidden="true"></i> Full Profile</a>
                                  <?php  }  else{ ?>
                                    <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list['member_id']; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                                  <?php } ?>
                                </li>
                                <li>
                                  <?php if($mat_member_status == 'free'){ ?>
                                    <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-success btn-sm act_btn " ><i class="fa fa-envelope" aria-hidden="true"></i> View Messages</a>
                                  <?php }  else{ ?>
                                    <a href="<?php echo base_url(); ?>Member/messages/<?php echo $list['member_id']; ?>" class="btn btn-success btn-sm act_btn " ><i class="fa fa-envelope" aria-hidden="true"></i> View Messages</a>
                                  <?php } ?>
                                </li>
                              </ul>
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

          <div class="col-12 d-block d-sm-none">
            <div class="adv pt-4">
              <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <form id="form_msg" action="<?php echo base_url(); ?>Member/messages" method="post">
      <input type="hidden" id="to_member_id" name="to_member_id">
    </form> -->
  </section>


<?php //include("footer.php"); ?>
<?php include("script.php"); ?>

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
