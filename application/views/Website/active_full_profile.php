<?php include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
?>
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

        <div class="col-md-9" style="height:1000px; overflow-y: auto;">
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-red" style="width: 100%;">
                    <div class="card-body">
                      <div class="img w-100 text-center">
                        <div class="row owl-main">
                          <div class="owl-carousel owl-theme">
                            <?php if($member_img == ''){ ?>
                              <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" width="100" alt="">
                            <?php } else{?>
                            <div class="item">
                              <a target="_blank" href="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>">
                                <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>" width="100" alt="">
                              </a>
                            </div>
                          <?php } if($member_image_list){
                              foreach ($member_image_list as $list) {
                            ?>
                            <div class="item">
                              <a target="_blank" href="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>">
                                <img class="pb-2" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>" width="100" alt="">
                              </a>
                            </div>
                            <?php  }   } ?>

                          </div>
                        </div>
                      </div>
                      <hr class="white">
                      <input type="hidden" id="profile_member_id" name="profile_member_id" value="<?php echo $member_info[0]['member_id']; ?>">
                      <input type="hidden" id="login_member_id" name="login_member_id" value="<?php echo $member_info[0]['member_id']; ?>">
                      <?php if(isset($interest_sent)){ ?>
                        <button class="btn btn-primary btn-sm w-100 mb-2" type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                      <?php  } else{ ?>
                        <button class="btn btn-primary btn-sm w-100 mb-2" id="btn_exp_int_modal" data-toggle="modal" data-target="#exp_interest"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                      <?php } ?>

                      <div class="row">
                        <!-- <div class="col-6">
                          <?php if(isset($shortlist_sent)){ ?>
                            <button class="btn btn-success btn-sm w-100 " type="submit" disabled><i class="fa fa-list" aria-hidden="true" ></i> Shortlisted</button>
                          <?php  } else{ ?>
                            <button class="btn btn-success btn-sm w-100 " id="btn_shortlist" type="submit"><i class="fa fa-list" aria-hidden="true"></i> Shortlist</button>
                          <?php } ?>
                        </div> -->
                        <div class="col-12">
                          <button class="btn btn-success btn-sm w-100 " type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>

                <div class="col-12 d-block d-sm-none">
                  <div class="adv">
                    <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%"  alt="">
                    <br>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Personal Information : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_personal_info"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
                    <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-12 py-1">
                        <h5  class="mb-1 text-danger text-bold f-18"><?php echo $member_info[0]['member_name']; ?></h5>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold ">Member Id : <span class="mb-1 text-danger"></span></p></div>
                      <div class="col-md-3 col-6 py-1">
                       <p class="mb-1 text-danger text-bold"><?php echo $member_info[0]['member_id']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Gender (लिंग) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_gender']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Date of birth (जन्म तारीख) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_birth_date'];; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Marital Status (वैवाहिक स्थिति) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['marital_status_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Profile Created by(On Behalf) (प्रोफ़ाइल किसी ओर से बनाई गई) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php if($member_info[0]['onbehalf_name'] == ''){ echo 'Self'; } else{ echo $member_info[0]['onbehalf_name']; } ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Interested In (इसमें दिलचस्पी है) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['marriage_type_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Religion (धर्म) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['religion_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Cast (जाति) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['cast_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Sub Cast (उप-जाति)  : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['sub_cast_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Mother tongue (मातृ भाषा) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['language_name']; ?></p>
                      </div>
                    </div>
                  </div>

                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Address Information : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_address_info"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
                    <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-12 col-12 py-1">
                        <p class="mb-1"> <span class=" text-bold"> Address :</span> <?php echo $member_info[0]['member_address']; ?> </p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Country (देश) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['country_name']; ?></p>
                      </div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">State (राज्य) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['state_name']; ?></p>
                      </div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">District (जिला) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['district_name']; ?></p>
                      </div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Tehsil (तहसील) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['tahasil_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">City (शहर) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['city_name']; ?></p>
                      </div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Area (इलाका) : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_area']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Mobile : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_mobile']; ?></p>
                      </div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Email : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_email']; ?></p>
                      </div>
                    </div>
                  </div>

                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Education Information : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_education_info"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
                    <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-12 col-12 py-1">
                        <p class="mb-1"> <span class=" text-bold"> Education (शिक्षा) :</span> <?php echo $member_info[0]['education_name']; ?> </p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-12 col-12 py-1">
                        <p class="mb-1"> <span class=" text-bold"> Education Details :</span> <?php echo $member_info[0]['education_details']; ?> </p>
                      </div>
                    </div>
                  </div>

                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Career Information : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_career_info"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
                    <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Profession (व्यवसाय) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['occupation_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Details  : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['occupation_details']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Annual Income (वार्षिक आमदनी) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['min_income']; ?> - <?php echo $member_info[0]['max_income']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Name of Company (कंपनी का नाम) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['occ_company_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Company Address (कंपनी का पता) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['occ_company_addr']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Company Contact No (कंपनी संपर्क नं)  : </p></div>
                      <div class="col-md-3 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['occ_company_con_no']; ?></p>
                      </div>
                    </div>
                  </div>

                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Family Details : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_family_details"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
      			          <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Family Status (पारिवारिक स्थिति) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['family_status_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Family Values (पारिवारिक मान्यता) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['family_value_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Family Type (परिवार का प्रकार) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['family_type_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Resident Status (निवासी की स्थिति) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['resident_status_name']; ?></p>
                      </div>
                    </div>
                  </div>


                  <div class="col-12 d-block d-sm-none">
                    <div class="adv ">
                      <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="100%" alt="">
                    </div>
                  </div>

                  <div class="frist">
                    <div class="row">
                      <div class="col-md-6"><h5 class="mb-3 text-danger">Social Information : </h5></div>
                      <div class="col-md-6 text-right">
                        <!-- <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_social_info"> <i class="fa fa-edit"></i> </a></h5> -->
                      </div>
                    </div>
                    <hr class="hr-web">
                    <div class="row">
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Diet (आहार) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['diet_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Height (ऊंचाई) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['height_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Body type (शरीर प्रकार) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['body_type_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Skin Complexion (त्वचा का रंग) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['complexion_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Blood Group (रक्त वर्ग) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['blood_group_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Smoker (धूम्रपान) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_smoker']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Drink (शराब) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_drink']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Moonsign (राशि) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['moonsign_name']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Manglik (मांगलिक) : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['member_mangalik']; ?></p>
                      </div>
                      <div class="col-12"><hr class="hr-web"></div>
                      <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Gothram : </p></div>
                      <div class="col-md-6 col-6 py-1">
                        <p class="mb-1"><?php echo $member_info[0]['gothram_name']; ?></p>
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
              <textarea name="message_text" id="message_text" class="form-control form-control-sm" rows="4" cols="80" placeholder="Type your message..."></textarea>
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
            <!-- <input type="hidden"  id="interest_to_member_id" name="interest_to_member_id">
            <input type="hidden"  id="interest_to_btn_id" name="interest_to_btn_id"> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" id="btn_exp_interest" data-dismiss="modal" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>

  </section>


<!-- End of Quick Info Update Modal -->

<?php include("script.php"); ?>


<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    $('#btn_exp_interest').on('click',function(){

      var to_member_id = $('#profile_member_id').val();
      var from_member_id = <?php echo $mat_member_id; ?>;
      $.ajax({
        url:'<?php echo base_url(); ?>Member/add_interest',
        method:'post',
        data:{'from_member_id':from_member_id,
              'to_member_id':to_member_id},
        success:function(result){
          if(result == 'success'){
            toastr.success('Interest sent successfully');
            $('#btn_exp_int_modal').html('<i class="fa fa-heart" aria-hidden="true" ></i> Expressed Interest');
            $('#btn_exp_int_modal').attr('disabled','true');
          } else{
            toastr.error('Interest not sent');
          }
        }
      });
    });

    $('#btn_shortlist').on('click',function(){
      var to_member_id = $('#profile_member_id').val();
      var from_member_id = <?php echo $mat_member_id; ?>;
      $.ajax({
        url:'<?php echo base_url(); ?>Member/add_shortlist',
        method:'post',
        data:{'from_member_id':from_member_id,
              'to_member_id':to_member_id},
        success:function(result){
          if(result == 'success'){
            toastr.success('This Profile Shortlisted successfully');
            $('#btn_shortlist').html('<i class="fa fa-list" aria-hidden="true" ></i> Shortlisted');
            $('#btn_shortlist').attr('disabled','true');
          } else{
            toastr.error('Profile Shortlist Error');
          }
        }
      });
    });

    $('#btn_msg_send').on('click',function(){
      var to_member_id = $('#profile_member_id').val();
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

  </script>

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
    });
  </script>
