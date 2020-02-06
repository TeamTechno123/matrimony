<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Member Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Member Profile</h3>
              </div>
              <div class="card-body">
                <div class="profile-div">
                  <div class="profile-div-left">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="card card-red" style="width: 100%;">
                          <div class="card-body text-center">
                            <div class="img w-100 text-center">
                              <div class="row owl-main  text-center">
                                <div class="owl-carousel owl-theme  text-center">
                                  <?php if($member_img == ''){ ?>
                                    <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" width="100%" alt="">
                                  <?php } else{?>
                                  <div class="item text-center">
                                    <a target="_blank" href="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>">
                                      <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>" width="100%" alt="">
                                    </a>
                                  </div>
                                <?php } if($member_image_list){
                                    foreach ($member_image_list as $list) {
                                  ?>
                                  <div class="item text-center">
                                    <a target="_blank" href="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>">
                                      <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>" width="100%" alt="">
                                    </a>
                                  </div>
                                  <?php  }   } ?>
                                </div>
                              </div>
                            </div>

                          </div>
                         </div>
                      </div>

                      <div class="col-md-9">
                        <div class="card card-red" style="width: 100%;">
                          <div class="card-body">
                            <div class="frist">
                              <div class="row">
                                <div class="col-md-12">
                                  <h5 class="mb-3">Quick Information : </h5>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12 py-1">
                                  <h5  class="mb-1 text-danger text-bold f-18"><?php echo $member_info[0]['member_name']; ?></h5>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-6 col-6 py-1">
                                  <p class="mb-1 text-bold ">Member Id : </p>
                                </div>
                                <div class="col-md-6 col-6 py-1">
                                 <p class="mb-1 text-danger"><?php echo $member_info[0]['member_id']; ?></p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>

                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">Gender : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $member_info[0]['member_gender']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">Age : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $age; ?></p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">Marital Status : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $member_info[0]['marital_status_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">City : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $member_info[0]['city_name']; ?></p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">Area : </p>
                                </div>

                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $member_info[0]['member_area']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">On Behalf : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php if($member_info[0]['onbehalf_name'] == ''){ echo 'Self'; } else{ echo $member_info[0]['onbehalf_name']; } ?></p>
                                </div>
                                <div class="col-12">
                                  <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1 text-bold">Interested In : </p>
                                </div>
                                <div class="col-md-3 col-6 py-1">
                                  <p class="mb-1"><?php echo $member_info[0]['marriage_type_name']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card card-red" style="width: 100%;">
                          <div class="card-body">
                            <div class="third">
                              <div class="row">
                                <div class="col-md-6">
                                  <h5 class="mb-3">Basic Information : </h5>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6 col-6">
                                  <p class="mb-1 text-bold text-bold">  Address : </p>
                                </div>
                                <div class="col-md-6 col-6">
                                 <p class="mb-1"><?php echo $member_info[0]['member_address']; ?> </p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>

                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Mobile : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php if($member_info[0]['show_mobile'] == 1){ echo $member_info[0]['member_mobile']; }  ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Email : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php if($member_info[0]['show_email'] == 1){ echo $member_info[0]['member_email']; } ?></p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>

                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Area : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['member_area']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">City : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['city_name']; ?></p>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>

                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Tahasil : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['tahasil_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">District : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['district_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">State : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['state_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Country : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['country_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Blood Group : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['blood_group_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Body type : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['body_type_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Religion : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['religion_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Cast : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['cast_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Sub Cast  : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['sub_cast_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Complexion : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['complexion_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Diet  : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['diet_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Education : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['education_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Family Status  : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['family_status_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Family Type : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['family_type_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Family Value  : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['family_value_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Gothram : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['gothram_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Height : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['height_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Income : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['min_income'].'-'.$member_info[0]['max_income']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Moonsign : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['moonsign_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Occupation : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['occupation_name']; ?></p>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-web">
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1 text-bold">Resident Status  : </p>
                                </div>
                                <div class="col-md-3 col-6">
                                  <p class="mb-1"><?php echo $member_info[0]['resident_status_name']; ?></p>
                                </div>
                                <div class="col-12 d-block d-sm-none">
                                    <hr class="hr-web">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
