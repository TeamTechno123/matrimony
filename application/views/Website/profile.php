<?php include("header.php"); ?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">User Profile</h1>
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
             <br><br>
             <div class="w-100 center text-center">
               <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
             </div>
          </div>

          <div class="adv ">
            <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
             <br><br>
             <div class="w-100 center text-center">
               <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
             </div>
          </div>

          <div class="adv">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
             <br><br>
             <div class="w-100 center text-center">
               <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
             </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-red" style="width: 100%;">
                    <div class="card-body">
                      <div class="img w-100 text-center">
                        <div class="row owl-main">
                          <div class="owl-carousel owl-theme">
                            <div class="item">
                              <a target="_blank" href="<?php echo base_url(); ?>assets/images/profile-girl.jpg">
                                <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100" alt="">
                              </a>
                            </div>
                            <div class="item"><img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100" alt=""></div>
                            <div class="item"><img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100" alt=""></div>
                            <div class="item"><img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100" alt=""></div>
                            <div class="item"><img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100" alt=""></div>
                          </div>
                        </div>
                      </div>
                      <hr class="white">
                        <!-- <button class="btn btn-primary btn-profile w-100" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button> -->
                        <div class="row">
                          <div class="col-12 mb-1">
                            <a href="<?php echo base_url(); ?>Member/sent_interest_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Sent Interest - <?php echo $sent_interest_cnt; ?></a>
                          </div>
                          <div class="col-12 mb-1">
                            <a href="<?php echo base_url(); ?>Member/received_interest_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Received Interest - <?php echo $rec_interect_cnt; ?></a>
                          </div>
                          <div class="col-12 mb-1">
                            <a href="<?php echo base_url(); ?>Member/messages_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Messages</a>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>

                  <div class="col-12 d-block d-sm-none">
                    <div class="adv">
                      <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
                       <br><br>
                       <div class="w-100 center text-center">
                         <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
                       </div>
                    </div>
                  </div>

          <div class="col-md-8">
            <div class="frist">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="mb-3">Quick Information : </h5>
                </div>
                <div class="col-md-6 text-right">
                  <h5>
                    <a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-edit"></i> </a>
                  </h5>
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
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['member_area']; ?></p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">On Behalf : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php if($member_info[0]['onbehalf_name'] == ''){ echo 'Self'; } else{ echo $member_info[0]['onbehalf_name']; } ?></p>
                </div>
              </div>
            </div>

            <div class="col-12 d-block d-sm-none">
              <div class="adv ">
                <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
                 <br><br>
                 <div class="w-100 center text-center">
                   <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
                 </div>
              </div>
            </div>

            <div class="third">
              <div class="row">
                <div class="col-md-6 py-1">
                  <h5 class="mb-3">Basic Information : </h5>
                </div>
                <div class="col-md-6 text-right py-1">
                  <h5>
                    <a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".basic_info_modal"> <i class="fa fa-edit"></i> </a>
                  </h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12 py-1">
                  <p class="mb-1"> <span class=" text-bold"> Address :</span> <?php echo $member_info[0]['member_address']; ?> </p>
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
                  <p class="mb-1 text-bold">City : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['city_name']; ?></p>
                </div>
                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Tahasil : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['tahasil_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">District : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['district_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">State : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['state_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Country : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['country_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Blood Group : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['blood_group_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Body type : </p>
                </div>
                <div class="col-md-3 col-6">
                  <p class="mb-1"><?php echo $member_info[0]['body_type_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Religion : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['religion_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Cast : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['cast_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Sub Cast  : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['sub_cast_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Complexion : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['complexion_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Diet  : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['diet_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Education : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['education_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Family Status  : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['family_status_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Family Type : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['family_type_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Family Value  : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['family_value_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Gothram : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['gothram_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Height : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['height_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Income : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['min_income'].'-'.$member_info[0]['max_income']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Moonsign : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['moonsign_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Occupation : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['occupation_name']; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Resident Status  : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['resident_status_name']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
              </div>
            </div>
            <div class="col-12 d-block d-sm-none">
              <div class="adv">
                <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
                 <br><br>
                 <div class="w-100 center text-center">
                   <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
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
</section>

<!-- Quick Info Update Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_profile/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control form-control-sm w-100 required title-case text" name="member_name" id="member_name" value="<?php if(isset($member_name)){ echo $member_name; } ?>"  placeholder="Enter Full Name" required>
            </div>
            <div class="form-group col-md-12">
              <textarea name="member_address" id="member_address" class="form-control form-control-sm" rows="2" cols="80" placeholder="Enter Address"><?php if(isset($member_address)){ echo $member_address; } ?></textarea>
            </div>
            <div class="form-group col-md-6 ">
              <select class="form-control select2 form-control-sm" name="country_id" id="country_id" data-placeholder="Select Country" required>
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
            <input type="text" class="form-control form-control-sm" name="member_area" id="member_area" value="<?php if(isset($member_area)){ echo $member_area; } ?>"  title="Enter Area"  placeholder="Enter Area" required>
          </div>
          <div class="col-md-12">
            <div class="row">
            <div class="form-group col-md-2 mb-0">
              <label for="">Gender : </label>
            </div>
            <div class="form-group col-md-2 mb-0">
              <div class="form-check">
                <input class="form-check-input" value="Male" type="radio" name="member_gender" <?php if(isset($member_gender) && $member_gender == 'Male'){ echo 'checked'; } else{ echo 'checked'; } ?>>
                Male
              </div>
            </div>
            <div class="form-group col-md-2 mb-0">
              <div class="form-check">
                <input class="form-check-input" value="Female" type="radio" name="member_gender"<?php if(isset($member_gender) && $member_gender == 'Female'){ echo 'checked'; } ?>>
                Female
              </div>
            </div>
          </div>
        </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control form-control-sm" name="member_birth_date" value="<?php if(isset($member_birth_date)){ echo $member_birth_date; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" title="Enter Birth date" placeholder="Enter Birth date" required>
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
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End of Quick Info Update Modal -->

<!-- Basic Info Update Modal -->
  <div class="modal fade basic_info_modal " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Basic Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo base_url(); ?>Member/update_profile_basic/<?php echo $member_id; ?>" method="post" autocomplete="off">
            <div class="row">
              <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm" name="country_id" id="country_id2" data-placeholder="Select Country" required>
                  <option selected="selected" value="" >Select Country </option>
                  <?php foreach ($country_list as $list) { ?>
                    <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100" name="state_id" id="state_id2"  title="Select State" data-placeholder="Select State" required>
                  <option selected="selected" value="" >Select State </option>
                  <?php foreach ($state_list as $list) { ?>
                    <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100" name="district_id" id="district_id2"  title="Select District" data-placeholder="Select District" required>
                  <option selected="selected" value="" >Select District </option>
                  <?php foreach ($district_list as $list) { ?>
                    <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100" name="tahasil_id" id="tahasil_id2"  title="Select Tahasil" data-placeholder="Select Tahasil" required>
                  <option selected="selected" value="" >Select Tahasil </option>
                  <?php foreach ($tahasil_list as $list) { ?>
                    <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 ">
                <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id2" title="Select City" data-placeholder="Select City" required>
                  <option selected="selected" value="" >Select City </option>
                  <?php foreach ($city_list as $list) { ?>
                    <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control form-control-sm" name="member_area" id="member_area2" value="<?php if(isset($member_area)){ echo $member_area; } ?>"  title="Enter Area"  placeholder="Enter Area" required>
              </div>


              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id2" title="Select Religion" data-placeholder="Select Religion" >
                  <option selected="selected" value="" >Select Religion</option>
                  <?php foreach ($religion_list as $list) { ?>
                    <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id2" title="Select Caste" data-placeholder="Select Caste" >
                  <option selected="selected" value="" >Select Caste</option>
                  <?php foreach ($cast_list as $list) { ?>
                    <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="sub_cast_id" id="sub_cast_id2" title="Select Sub Caste" data-placeholder="Select Sub Caste" >
                  <option selected="selected" value="" >Select Sub Caste</option>
                  <?php foreach ($sub_cast_list as $list) { ?>
                    <option value="<?php echo $list->sub_cast_id ?>" <?php if(isset($sub_cast_id) && $sub_cast_id == $list->sub_cast_id ){ echo 'selected'; } ?>><?php echo $list->sub_cast_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="complexion_id" id="complexion_id2" title="Select Complexion" data-placeholder="Select Complexion" >
                  <option selected="selected" value="" >Select Complexion</option>
                  <?php foreach ($complexion_list as $list) { ?>
                    <option value="<?php echo $list->complexion_id ?>" <?php if(isset($complexion_id) && $complexion_id == $list->complexion_id ){ echo 'selected'; } ?>><?php echo $list->complexion_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="blood_group_id" id="blood_group_id2" title="Select Blood Group" data-placeholder="Select Blood Group" >
                  <option selected="selected" value="" >Select Blood Group</option>
                  <?php foreach ($blood_group_list as $list) { ?>
                    <option value="<?php echo $list->blood_group_id ?>" <?php if(isset($blood_group_id) && $blood_group_id == $list->blood_group_id ){ echo 'selected'; } ?>><?php echo $list->blood_group_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="body_type_id" id="body_type_id2" title="Select Body Type" data-placeholder="Select Body Type" >
                  <option selected="selected" value="" >Select Body Type</option>
                  <?php foreach ($body_type_list as $list) { ?>
                    <option value="<?php echo $list->body_type_id ?>" <?php if(isset($body_type_id) && $body_type_id == $list->body_type_id ){ echo 'selected'; } ?>><?php echo $list->body_type_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="diet_id" id="diet_id2" title="Select Diet" data-placeholder="Select Diet" >
                  <option selected="selected" value="" >Select Diet</option>
                  <?php foreach ($diet_list as $list) { ?>
                    <option value="<?php echo $list->diet_id ?>" <?php if(isset($diet_id) && $diet_id == $list->diet_id ){ echo 'selected'; } ?>><?php echo $list->diet_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="education_id" id="education_id2" title="Select Education" data-placeholder="Select Education" >
                  <option selected="selected" value="" >Select Education</option>
                  <?php foreach ($education_list as $list) { ?>
                    <option value="<?php echo $list->education_id ?>" <?php if(isset($education_id) && $education_id == $list->education_id ){ echo 'selected'; } ?>><?php echo $list->education_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="family_status_id" id="family_status_id2" title="Select Family Status" data-placeholder="Select Family Status" >
                  <option selected="selected" value="" >Select Family Status</option>
                  <?php foreach ($family_status_list as $list) { ?>
                    <option value="<?php echo $list->family_status_id ?>" <?php if(isset($family_status_id) && $family_status_id == $list->family_status_id ){ echo 'selected'; } ?>><?php echo $list->family_status_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="family_type_id" id="family_type_id2" title="Select Family Type" data-placeholder="Select Family Type" >
                  <option selected="selected" value="" >Select Family Type</option>
                  <?php foreach ($family_type_list as $list) { ?>
                    <option value="<?php echo $list->family_type_id ?>" <?php if(isset($family_type_id) && $family_type_id == $list->family_type_id ){ echo 'selected'; } ?>><?php echo $list->family_type_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="family_value_id" id="family_value_id2" title="Select Family Value" data-placeholder="Select Family Value" >
                  <option selected="selected" value="" >Select Family Value</option>
                  <?php foreach ($family_value_list as $list) { ?>
                    <option value="<?php echo $list->family_value_id ?>" <?php if(isset($family_value_id) && $family_value_id == $list->family_value_id ){ echo 'selected'; } ?>><?php echo $list->family_value_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="gothram_id" id="gothram_id2" title="Select Gothram" data-placeholder="Select Gothram" >
                  <option selected="selected" value="" >Select Gothram</option>
                  <?php foreach ($gothram_list as $list) { ?>
                    <option value="<?php echo $list->gothram_id ?>" <?php if(isset($gothram_id) && $gothram_id == $list->gothram_id ){ echo 'selected'; } ?>><?php echo $list->gothram_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="height_id" id="height_id2" title="Select Height" data-placeholder="Select Height" >
                  <option selected="selected" value="" >Select Height</option>
                  <?php foreach ($height_list as $list) { ?>
                    <option value="<?php echo $list->height_id ?>" <?php if(isset($height_id) && $height_id == $list->height_id ){ echo 'selected'; } ?>><?php echo $list->height_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="income_id" id="income_id2" title="Select Income" placeholder="Select Income" data-placeholder="Select Income" >
                  <option selected="selected" value="" >Select Income</option>
                  <?php foreach ($income_list as $list) { ?>
                    <option value="<?php echo $list->income_id ?>" <?php if(isset($income_id) && $income_id == $list->income_id ){ echo 'selected'; } ?>><?php echo $list->min_income.'-'.$list->max_income; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="moonsign_id" id="moonsign_id2" title="Select Moonsign" data-placeholder="Select Moonsign" >
                  <option selected="selected" value="" >Select Moonsign</option>
                  <?php foreach ($moonsign_list as $list) { ?>
                    <option value="<?php echo $list->moonsign_id ?>" <?php if(isset($moonsign_id) && $moonsign_id == $list->moonsign_id ){ echo 'selected'; } ?>><?php echo $list->moonsign_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="occupation_id" id="occupation_id2" title="Select Occupation" data-placeholder="Select Occupation" >
                  <option selected="selected" value="" >Select Occupation</option>
                  <?php foreach ($occupation_list as $list) { ?>
                    <option value="<?php echo $list->occupation_id ?>" <?php if(isset($occupation_id) && $occupation_id == $list->occupation_id ){ echo 'selected'; } ?>><?php echo $list->occupation_name; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="form-group col-md-6 drop-sm">
                <select class="form-control select2 form-control-sm w-100" name="resident_status_id" id="resident_status_id2" title="Select Resident Status" data-placeholder="Select Resident Status" >
                  <option selected="selected" value="" >Select Resident Status</option>
                  <?php foreach ($resident_status_list as $list) { ?>
                    <option value="<?php echo $list->resident_status_id ?>" <?php if(isset($resident_status_id) && $resident_status_id == $list->resident_status_id ){ echo 'selected'; } ?>><?php echo $list->resident_status_name; ?></option>
                  <?php  } ?>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="Submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include("footer.php"); ?>

<script type="text/javascript">
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
