<?php include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
  $member_is_login = $this->session->userdata('member_is_login');
  $mat_member_status = $this->session->userdata('mat_member_status');
?>
<style media="screen">
  label{
    font-size: 14px;
  }
</style>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">My Profile</h1>
      </div>
    </div>
  </div>
</section>

<section class="profile-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 d-none d-sm-block" >
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

        <div class="col-md-9 no-left-padding" style="height:1000px; overflow-y: auto;" >
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="col-md-4 ">
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
                        <div class="row">
                          <div class="col-12 mb-1">
                            <a href="<?php echo base_url(); ?>Member/profile_gallery" class="btn btn-sm btn-success w-100  pl-1" type="submit">Upload Photo</a>
                          </div>
                          <?php if($mat_member_status == 'free'){
                            if($member_info[0]['country_id'] == '' || $member_info[0]['state_id'] == '' || $member_info[0]['district_id'] == '' || $member_info[0]['tahasil_id'] == ''){
                          ?>


                          <div class="col-12 mb-1">
                            <a href="" class="btn btn-sm btn-success w-100  pl-1" type="submit">Sent Interest - <?php echo $sent_interest_cnt; ?></a>
                          </div>
                          <div class="col-12 mb-1">
                            <a href="" class="btn btn-sm btn-success w-100  pl-1" type="submit">Received Interest - <?php echo $rec_interect_cnt; ?></a>
                          </div>
                          <div class="col-12 mb-1">
                            <a href="" class="btn btn-sm btn-success w-100  pl-1" type="submit">Messages</a>
                          </div>
                          <?php  } else{ ?>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-sm btn-success w-100  pl-1" type="submit">Sent Interest - <?php echo $sent_interest_cnt; ?></a>
                            </div>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-sm btn-success w-100  pl-1" type="submit">Received Interest - <?php echo $rec_interect_cnt; ?></a>
                            </div>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Payment/member_payment" class="btn btn-sm btn-success w-100  pl-1" type="submit">Messages</a>
                            </div>
                          <?php  } } else{ ?>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Member/sent_interest_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Sent Interest - <?php echo $sent_interest_cnt; ?></a>
                            </div>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Member/received_interest_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Received Interest - <?php echo $rec_interect_cnt; ?></a>
                            </div>
                            <div class="col-12 mb-1">
                              <a href="<?php echo base_url(); ?>Member/messages_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Messages</a>
                            </div>
                          <?php } ?>


                          <div class="col-12 mb-1">
                            <a href="<?php echo base_url(); ?>Member/lead_list" class="btn btn-sm btn-success w-100  pl-1" type="submit">Add New Lead</a>
                          </div>
                        </div>
                      </div>
                     </div>
                  </div>

                  <div class="col-12 d-block d-sm-none">
                    <div class="adv">
                      <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
                       <br><br>
                       <div class="w-100 center text-center">
                         <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
                       </div>
                    </div>
                  </div>

          <div class="col-md-8">

            <div class="frist">
              <div class="row">
                <div class="col-md-6"><h5 class="mb-3 text-danger">Personal Information : </h5></div>
                <div class="col-md-6 text-right">
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_personal_info"> <i class="fa fa-edit"></i> </a></h5>
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
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_address_info"> <i class="fa fa-edit"></i> </a></h5>
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
                <div class="col-md-6">

                </div>
                <div class="col-md-3 col-6 py-1"><p class="mb-1 text-bold">Email : </p></div>
                <div class="col-md-9 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['member_email']; ?></p>
                </div>
              </div>
            </div>

            <div class="frist">
              <div class="row">
                <div class="col-md-6"><h5 class="mb-3 text-danger">Education Information : </h5></div>
                <div class="col-md-6 text-right">
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_education_info"> <i class="fa fa-edit"></i> </a></h5>
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
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_career_info"> <i class="fa fa-edit"></i> </a></h5>
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
                <div class="col-md-6 col-6 py-1"><p class="mb-1 text-bold">Company Contact No (कंपनी संपर्क नं)  : </p></div>
                <div class="col-md-6 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['occ_company_con_no']; ?></p>
                </div>
              </div>
            </div>

            <div class="frist">
              <div class="row">
                <div class="col-md-6"><h5 class="mb-3 text-danger">Family Details : </h5></div>
                <div class="col-md-6 text-right">
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_family_details"> <i class="fa fa-edit"></i> </a></h5>
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
                  <h5><a href="" class="m-0 txt-pink" data-toggle="modal" data-target=".modal_social_info"> <i class="fa fa-edit"></i> </a></h5>
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

            <div class="col-12 d-block d-sm-none">
              <div class="adv">
                <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image3; ?>" width="100%" height="60%" alt="">
              </div>
            </div>

            <div class="third">
              <div class="row">
                <div class="col-md-6 py-1">
                  <h5 class="mb-3 text-danger">Login Information : </h5>
                </div>
                <div class="col-md-6 text-right py-1">
                  <a href="" class=" btn btn-primary btn-sm m-0 " data-toggle="modal" data-target=".pass_modal"> <i class="fa fa-edit"></i> Change Password</a>
                </div>
                <div class="col-md-12">
                  <hr class="hr-web">
                </div>
                <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Mobile Number : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1"><?php echo $member_info[0]['member_mobile']; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                  <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1 text-bold">Password : </p>
                </div>
                <div class="col-md-3 col-6 py-1">
                  <p class="mb-1">********</p>
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

<!-- Update Profile-->

<!-- Update Personal Information -->
<div class="modal fade modal_personal_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Personal Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_personal_info/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-2 pr-0"><label>Name ( नाम )</label></div>
          <div class="form-group col-md-10">
            <input type="text" class="form-control form-control-sm w-100 required title-case text" name="member_name" id="member_name" value="<?php if(isset($member_name)){ echo $member_name; } ?>"  placeholder="Enter Full Name" required>
          </div>
          <div class="form-group col-md-2 mb-0"><label>Gender ( लिंग )</label></div>
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
          <div class="form-group col-md-2 pr-0"><label>Date of birth ( जन्म तारीख )</label></div>
          <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm" name="member_birth_date" value="<?php if(isset($member_birth_date)){ echo $member_birth_date; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" title="Enter Birth date" placeholder="Enter Birth date" required>
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Marital Status ( वैवाहिक स्थिति )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="marital_status" id="marital_status" title="Select Marital Status" data-placeholder="Select Marital Status" >
              <option selected="selected" value="" >Select Marital Status</option>
              <?php foreach ($marital_status_list as $list) { ?>
                <option value="<?php echo $list->marital_status_id ?>" <?php if(isset($marital_status) && $marital_status == $list->marital_status_id ){ echo 'selected'; } ?>><?php echo $list->marital_status_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0"><label>Created By</label></div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="onbehalf_id" id="onbehalf_id" title="Profile Created By" data-placeholder="Profile Created By" >
              <option selected="selected" value="" >Profile Created By</option>
              <?php foreach ($onbehalf_list as $list) { ?>
                <option value="<?php echo $list->onbehalf_id ?>" <?php if(isset($onbehalf_id) && $onbehalf_id == $list->onbehalf_id ){ echo 'selected'; } ?>><?php echo $list->onbehalf_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Interesred In ( इसमें दिलचस्पी है )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="marriage_type_id" id="marriage_type_id" title="Interested In" data-placeholder="Select Marriage Type" >
              <option selected="selected" value="" >Select Marriage Type</option>
              <?php foreach ($marriage_type_list as $list) { ?>
                <option value="<?php echo $list->marriage_type_id ?>" <?php if(isset($marriage_type_id) && $marriage_type_id == $list->marriage_type_id ){ echo 'selected'; } ?>><?php echo $list->marriage_type_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Religion ( धर्म )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="religion_id" id="religion_id2" title="Select Religion" data-placeholder="Select Religion" >
              <option selected="selected" value="" >Select Religion</option>
              <?php foreach ($religion_list as $list) { ?>
                <option value="<?php echo $list->religion_id ?>" <?php if(isset($religion_id) && $religion_id == $list->religion_id ){ echo 'selected'; } ?>><?php echo $list->religion_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Cast ( जाति )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="cast_id" id="cast_id2" title="Select Caste" data-placeholder="Select Caste" >
              <option selected="selected" value="" >Select Caste</option>
              <?php foreach ($cast_list as $list) { ?>
                <option value="<?php echo $list->cast_id ?>" <?php if(isset($cast_id) && $cast_id == $list->cast_id ){ echo 'selected'; } ?>><?php echo $list->cast_name; ?></option>
              <?php  } ?>
              <option value="-1">Other</option>
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_cast_name" id="other_cast_name" title="Enter Caste"  placeholder="Enter Caste">
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Sub Cast ( उप-जाति )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="sub_cast_id" id="sub_cast_id2" title="Select Sub Caste" data-placeholder="Select Sub Caste" >
              <option selected="selected" value="" >Select Sub Caste</option>
              <?php foreach ($sub_cast_list as $list) { ?>
                <option value="<?php echo $list->sub_cast_id ?>" <?php if(isset($sub_cast_id) && $sub_cast_id == $list->sub_cast_id ){ echo 'selected'; } ?>><?php echo $list->sub_cast_name; ?></option>
              <?php  } ?>
              <option value="-1">Other</option>
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_subcast_name" id="other_subcast_name" title="Enter Sub Caste"  placeholder="Enter Sub Caste">
          </div>
          <div class="form-group col-md-2 pr-0"><label>Mother tongue (मातृ भाषा )</label></div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="language_id" id="language_id" title="Select Mother tongue" data-placeholder="Select Mother tongue" >
              <option selected="selected" value="" >Select Mother Tongue </option>
              <?php foreach ($language_list as $list) { ?>
                <option value="<?php echo $list->language_id ?>" <?php if(isset($language_id) && $language_id == $list->language_id ){ echo 'selected'; } ?>><?php echo $list->language_name; ?></option>
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

<!-- Update Address Information -->
<div class="modal fade modal_address_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Address Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_address_info/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-2 pr-0">
            <label>Address</label>
          </div>
          <div class="form-group col-md-10">
            <textarea name="member_address" id="member_address" class="form-control form-control-sm" rows="2" cols="80" placeholder="Enter Address"><?php if(isset($member_address)){ echo $member_address; } ?></textarea>
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Country ( देश )</label>
          </div>
          <div class="form-group col-md-4 ">
            <select class="form-control select2 form-control-sm" name="country_id" id="country_id2" data-placeholder="Select Country" required>
              <option selected="selected" value="" >Select Country </option>
              <?php foreach ($country_list as $list) { ?>
                <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0"><label>State ( राज्य )</label></div>
          <div class="form-group col-md-4 ">
            <select class="form-control select2 form-control-sm w-100" name="state_id" id="state_id2"  title="Select State" data-placeholder="Select State" required>
              <option selected="selected" value="" >Select State </option>
              <?php foreach ($state_list as $list) { ?>
                <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-2 pr-0"><label>District (जिला )</label></div>
          <div class="form-group col-md-4 ">
            <select class="form-control select2 form-control-sm w-100" name="district_id" id="district_id2"  title="Select District" data-placeholder="Select District" required>
              <option selected="selected" value="" >Select District </option>
              <?php foreach ($district_list as $list) { ?>
                <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
              <?php  } ?>
              <!-- <option value="-1">Other</option> -->
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_district_name" id="other_district_name" placeholder="Enter District Name">
          </div>
          <div class="form-group col-md-2 pr-0"><label>Tehsil (तहसील)</label></div>
          <div class="form-group col-md-4 ">
            <select class="form-control select2 form-control-sm w-100" name="tahasil_id" id="tahasil_id2"  title="Select Tahsil" data-placeholder="Select Tahsil" required>
              <option selected="selected" value="" >Select Tahsil </option>
              <?php foreach ($tahasil_list as $list) { ?>
                <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
              <?php  } ?>
              <!-- <option value="-1">Other</option> -->
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_tahasil_name" id="other_tahasil_name" title="Enter Tahsil Name"  placeholder="Enter Tahsil Name">
          </div>
          <div class="form-group col-md-2 pr-0"><label>City ( शहर )</label></div>
          <div class="form-group col-md-4 ">
            <select class="form-control select2 form-control-sm w-100 " name="city_id" id="city_id2" title="Select City" data-placeholder="Select City">
              <option selected="selected" value="" >Select City </option>
              <?php foreach ($city_list as $list) { ?>
                <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
              <?php  } ?>
              <!-- <option value="-1">Other</option> -->
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_city_name" id="other_city_name" title="Enter City Name"  placeholder="Enter City Name">
          </div>
          <div class="form-group col-md-2 pr-0"><label>Area ( इलाका )</label></div>
          <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm" name="member_area" id="member_area2" value="<?php if(isset($member_area)){ echo $member_area; } ?>"  title="Enter Area"  placeholder="Enter Area" required>
          </div>

          <div class="form-group col-md-2 pr-0"><label>Email</label></div>
          <div class="form-group col-md-4">
            <input type="email" class="form-control form-control-sm " name="member_email" id="member_email" value="<?php if(isset($member_email)){ echo $member_email; } ?>" title="Enter Email" placeholder="Enter Email" required>
          </div>
          <div class="form-group col-md-2 pr-0"><label>Mobile No</label></div>
          <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm mobile only_number" name="member_mobile" id="member_mobile" value="<?php if(isset($member_mobile)){ echo $member_mobile; } ?>" title="Enter Mobile" placeholder="Enter Mobile" required readonly>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="form-group col-md-5 mb-0"><label>Show Email To : </label></div>
              <div class="form-group col-md-3 mb-0">
                <input class="form-check-input" value="1" type="radio" name="show_email" <?php if(isset($show_email) && $show_email == '1'){ echo 'checked'; }  ?>>
                Public
              </div>
              <div class="form-group col-md-4 mb-0">
                <input class="form-check-input" value="0" type="radio" name="show_email"<?php if(isset($show_email) && $show_email == '0'){ echo 'checked'; }?>>
                Only Me
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="form-group col-md-5 mb-0"><label for="">Show Mobile To : </label></div>
              <div class="form-group col-md-3 mb-0">
                <input class="form-check-input" value="1" type="radio" name="show_mobile" <?php if(isset($show_mobile) && $show_mobile == '1'){ echo 'checked'; } ?>>
                Public
              </div>
              <div class="form-group col-md-4 mb-0">
                <input class="form-check-input" value="0" type="radio" name="show_mobile"<?php if(isset($show_mobile) && $show_mobile == '0'){ echo 'checked'; } ?>>
                Only Me
              </div>
            </div>
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

<!-- Update Education Information -->
<div class="modal fade modal_education_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Education Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_education_info/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-2 pr-0">
            <label>Education ( शिक्षा )</label>
          </div>
          <div class="form-group col-md-4 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="education_id" id="education_id2" title="Select Education" data-placeholder="Select Education" >
              <option selected="selected" value="" >Select Education</option>
              <option value="-1">Other</option>
              <?php foreach ($education_list as $list) { ?>
                <option value="<?php echo $list->education_id ?>" <?php if(isset($education_id) && $education_id == $list->education_id ){ echo 'selected'; } ?>><?php echo $list->education_name; ?></option>
              <?php  } ?>
            </select>
            <input type="text" style="display:none;" class="form-control form-control-sm mt-1" name="other_education_name" id="other_education_name" placeholder="Enter Education">
          </div>
          <div class="form-group col-md-2 pr-0">
            <label>Education Details ( शिक्षा )</label>
          </div>
          <div class="form-group col-md-4">
            <input type="text" class="form-control form-control-sm" name="education_details" id="education_details" value="<?php if(isset($education_details)){ echo $education_details; } ?>" placeholder="Enter Education Details">
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

<!-- Update Career/Occupation Information -->
<div class="modal fade modal_career_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Career Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_career_info/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-3 pr-0">
            <label>Profession ( व्यवसाय) </label>
          </div>
          <div class="form-group col-md-9 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="occupation_id" id="occupation_id2" title="Select Occupation" data-placeholder="Select Occupation" >
              <option selected="selected" value="" >Select Profession</option>
              <?php foreach ($occupation_list as $list) { ?>
                <option value="<?php echo $list->occupation_id ?>" <?php if(isset($occupation_id) && $occupation_id == $list->occupation_id ){ echo 'selected'; } ?>><?php echo $list->occupation_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-3 pr-0">
            <label>Profession Details ( व्यवसाय )</label>
          </div>
          <div class="form-group col-md-9">
            <input type="text" class="form-control form-control-sm" name="occupation_details" id="occupation_details2" value="<?php if(isset($occupation_details)){ echo $occupation_details; } ?>"  title="Profession Details"  placeholder="Profession Details" required>
          </div>
          <div class="form-group col-md-3 pr-0">
            <label>Annual Income ( वार्षिक आमदनी)</label>
          </div>
          <div class="form-group col-md-9 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="income_id" id="income_id2" title="Select Income" placeholder="Select Income" data-placeholder="Select Income" >
              <option selected="selected" value="" >Select Income</option>
              <?php foreach ($income_list as $list) { ?>
                <option value="<?php echo $list->income_id ?>" <?php if(isset($income_id) && $income_id == $list->income_id ){ echo 'selected'; } ?>><?php echo $list->min_income.'-'.$list->max_income; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-3 pr-0">
            <label>Name of Company ( कंपनी का नाम )</label>
          </div>
          <div class="form-group col-md-9">
            <input type="text" class="form-control form-control-sm" name="occ_company_name" id="occ_company_name" value="<?php if(isset($occ_company_name)){ echo $occ_company_name; } ?>"  title="Company Name"  placeholder="Company Name" required>
          </div>
          <div class="form-group col-md-3 pr-0">
            <label>Company Address  (कंपनी का पता )</label>
          </div>
          <div class="form-group col-md-9">
            <input type="text" class="form-control form-control-sm" name="occ_company_addr" id="occ_company_addr" value="<?php if(isset($occ_company_addr)){ echo $occ_company_addr; } ?>"  title="Company Address"  placeholder="Company Address" required>
          </div>
          <div class="form-group col-md-3 pr-0">
            <label>Company Contact No (कंपनी संपर्क नं)</label>
          </div>
          <div class="form-group col-md-9">
            <input type="text" class="form-control form-control-sm" name="occ_company_con_no" id="occ_company_con_no" value="<?php if(isset($occ_company_con_no)){ echo $occ_company_con_no; } ?>"  title="Company Contact No."  placeholder="Company Contact No." required>
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

<!-- Update Family Details -->
<div class="modal fade modal_family_details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Family Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_family_details/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-4 pr-0">
            <label>Family Status  (पारिवारिक स्थिति)</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="family_status_id" id="family_status_id2" title="Select Family Status" data-placeholder="Select Family Status" >
              <option selected="selected" value="" >Select Family Status</option>
              <?php foreach ($family_status_list as $list) { ?>
                <option value="<?php echo $list->family_status_id ?>" <?php if(isset($family_status_id) && $family_status_id == $list->family_status_id ){ echo 'selected'; } ?>><?php echo $list->family_status_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Family Values (पारिवारिक मान्यता )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="family_value_id" id="family_value_id2" title="Select Family Value" data-placeholder="Select Family Value" >
              <option selected="selected" value="" >Select Family Value</option>
              <?php foreach ($family_value_list as $list) { ?>
                <option value="<?php echo $list->family_value_id ?>" <?php if(isset($family_value_id) && $family_value_id == $list->family_value_id ){ echo 'selected'; } ?>><?php echo $list->family_value_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Family Type (परिवार का प्रकार )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="family_type_id" id="family_type_id2" title="Select Family Type" data-placeholder="Select Family Type" >
              <option selected="selected" value="" >Select Family Type</option>
              <?php foreach ($family_type_list as $list) { ?>
                <option value="<?php echo $list->family_type_id ?>" <?php if(isset($family_type_id) && $family_type_id == $list->family_type_id ){ echo 'selected'; } ?>><?php echo $list->family_type_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Resident Status (निवासी की स्थिति )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="resident_status_id" id="resident_status_id2" title="Select Resident Status" data-placeholder="Select Resident Status" >
              <option selected="selected" value="" >Select Resident Status</option>
              <?php foreach ($resident_status_list as $list) { ?>
                <option value="<?php echo $list->resident_status_id ?>" <?php if(isset($resident_status_id) && $resident_status_id == $list->resident_status_id ){ echo 'selected'; } ?>><?php echo $list->resident_status_name; ?></option>
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

<!-- Update Social Information -->
<div class="modal fade modal_social_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Social Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>Member/update_social_info/<?php echo $member_id; ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="form-group col-md-4 pr-0">
            <label>Diet  (आहार )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="diet_id" id="diet_id2" title="Select Diet" data-placeholder="Select Diet" >
              <option selected="selected" value="" >Select Diet</option>
              <?php foreach ($diet_list as $list) { ?>
                <option value="<?php echo $list->diet_id ?>" <?php if(isset($diet_id) && $diet_id == $list->diet_id ){ echo 'selected'; } ?>><?php echo $list->diet_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Height (ऊंचाई )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="height_id" id="height_id2" title="Select Height" data-placeholder="Select Height" >
              <option selected="selected" value="" >Select Height</option>
              <?php foreach ($height_list as $list) { ?>
                <option value="<?php echo $list->height_id ?>" <?php if(isset($height_id) && $height_id == $list->height_id ){ echo 'selected'; } ?>><?php echo $list->height_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Body type (शरीर प्रकार)</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="body_type_id" id="body_type_id2" title="Select Body Type" data-placeholder="Select Body Type" >
              <option selected="selected" value="" >Select Body Type</option>
              <?php foreach ($body_type_list as $list) { ?>
                <option value="<?php echo $list->body_type_id ?>" <?php if(isset($body_type_id) && $body_type_id == $list->body_type_id ){ echo 'selected'; } ?>><?php echo $list->body_type_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Skin Complexion (त्वचा का रंग)</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="complexion_id" id="complexion_id2" title="Select Skin Complexion" data-placeholder="Select Skin Complexion" >
              <option selected="selected" value="" >Select Skin Complexion</option>
              <?php foreach ($complexion_list as $list) { ?>
                <option value="<?php echo $list->complexion_id ?>" <?php if(isset($complexion_id) && $complexion_id == $list->complexion_id ){ echo 'selected'; } ?>><?php echo $list->complexion_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Blood Group (रक्त वर्ग )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="blood_group_id" id="blood_group_id2" title="Select Blood Group" data-placeholder="Select Blood Group" >
              <option selected="selected" value="" >Select Blood Group</option>
              <?php foreach ($blood_group_list as $list) { ?>
                <option value="<?php echo $list->blood_group_id ?>" <?php if(isset($blood_group_id) && $blood_group_id == $list->blood_group_id ){ echo 'selected'; } ?>><?php echo $list->blood_group_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Smoker (धूम्रपान)</label>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="Yes" type="radio" name="member_smoker" <?php if(isset($member_smoker) && $member_smoker == 'Yes'){ echo 'checked'; }  ?>>
              Yes
            </div>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="No" type="radio" name="member_smoker"<?php if(isset($member_smoker) && $member_smoker == 'No'){ echo 'checked'; } else{ echo 'checked'; } ?>>
              No
            </div>
          </div>
          <div class="form-group col-md-4 pr-0"></div>
          <div class="form-group col-md-4 pr-0">
            <label>Drink (शराब)</label>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="Yes" type="radio" name="member_drink" <?php if(isset($member_drink) && $member_drink == 'Yes'){ echo 'checked'; } else{ echo 'checked'; } ?>>
              Yes
            </div>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="No" type="radio" name="member_drink"<?php if(isset($member_drink) && $member_drink == 'No'){ echo 'checked'; } else{ echo 'checked'; }  ?>>
              No
            </div>
          </div>
          <div class="form-group col-md-4 pr-0"></div>
          <div class="form-group col-md-4 pr-0">
            <label>Moonsign (राशि )</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="moonsign_id" id="moonsign_id2" title="Select Moonsign" data-placeholder="Select Moonsign" >
              <option selected="selected" value="" >Select Moonsign</option>
              <?php foreach ($moonsign_list as $list) { ?>
                <option value="<?php echo $list->moonsign_id ?>" <?php if(isset($moonsign_id) && $moonsign_id == $list->moonsign_id ){ echo 'selected'; } ?>><?php echo $list->moonsign_name; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group col-md-4 pr-0">
            <label>Manglik (मांगलिक)</label>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="Yes" type="radio" name="member_mangalik" <?php if(isset($member_mangalik) && $member_mangalik == 'Yes'){ echo 'checked'; } ?>>
              Yes
            </div>
          </div>
          <div class="form-group col-md-2 mb-0">
            <div class="form-check">
              <input class="form-check-input" value="No" type="radio" name="member_mangalik"<?php if(isset($member_mangalik) && $member_mangalik == 'No'){ echo 'checked'; } else{ echo 'checked'; } ?>>
              No
            </div>
          </div>
          <div class="form-group col-md-4 pr-0"></div>
          <div class="form-group col-md-4 pr-0">
            <label>Gothram</label>
          </div>
          <div class="form-group col-md-8 drop-sm">
            <select class="form-control select2 form-control-sm w-100" name="gothram_id" id="gothram_id2" title="Select Gothram" data-placeholder="Select Gothram" >
              <option selected="selected" value="" >Select Gothram</option>
              <?php foreach ($gothram_list as $list) { ?>
                <option value="<?php echo $list->gothram_id ?>" <?php if(isset($gothram_id) && $gothram_id == $list->gothram_id ){ echo 'selected'; } ?>><?php echo $list->gothram_name; ?></option>
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

  <!-- Model Change Password  -->
  <div class="modal fade pass_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="<?php echo base_url(); ?>Member/change_member_password/<?php echo $member_id; ?>" method="post" autocomplete="off">
          <div class="row">
            <div class="form-group col-md-3 offset-md-2">
              <label>New Password</label>
            </div>
            <div class="form-group col-md-5">
              <input type="password" class="form-control form-control-sm mt-1" name="new_password" id="new_password" value="<?php echo $member_password; ?>" title="Enter New Password"  placeholder="Enter New Password" required>
            </div>
            <div class="form-group col-md-3 offset-md-2">
              <label>Confirm Password</label>
            </div>
            <div class="form-group col-md-5">
              <input type="password" class="form-control form-control-sm mt-1" name="new_con_password" id="new_con_password" value="<?php echo $member_password; ?>" title="Confirm New Password"  placeholder="Confirm New Password" required>
            </div>
            <div style="display:none;" class="psw_alert alert alert-danger p-2 col-md-8 offset-md-2" role="alert">
              New Password and Confirm Password must be same
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


<?php include("script.php"); ?>
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<?php if($this->session->flashdata('update_profile')){ ?>
  <script type="text/javascript">
    $(document).ready(function(){
      toastr.error('Update Your Profile Information');
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('update_success')){ ?>
  <script type="text/javascript">
    $(document).ready(function(){
      toastr.info('Information Updated Successfully');
    });
  </script>
<?php } ?>

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

<script type="text/javascript">
  $("#country_id2").on("change", function(){
    var country_id =  $('#country_id2').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_state_by_country',
      type: 'POST',
      data: {"country_id":country_id},
      context: this,
      success: function(result){
        $('#state_id2').html(result);
        $('#district_id2').html('');
        $('#tahasil_id2').html('');
        $('#city_id2').html('');
      }
    });
  });

  $("#state_id2").on("change", function(){
    var state_id =  $('#state_id2').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_district_by_state',
      type: 'POST',
      data: {"state_id":state_id},
      context: this,
      success: function(result){
        $('#district_id2').html(result);
        $('#tahasil_id2').html('');
        $('#city_id2').html('');
      }
    });
  });

  $("#district_id2").on("change", function(){
    var district_id =  $('#district_id2').find("option:selected").val();
    // alert(district_id);
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_tahasil_by_district',
      type: 'POST',
      data: {"district_id":district_id},
      context: this,
      success: function(result){
        $('#tahasil_id2').html(result);
      }
    });
  });

  $("#district_id2").on("change", function(){
    var district_id =  $('#district_id2').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_city_by_district',
      type: 'POST',
      data: {"district_id":district_id},
      context: this,
      success: function(result){
        $('#city_id2').html(result);
      }
    });
  });

  $("#religion_id2").on("change", function(){
    var religion_id2 =  $('#religion_id2').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_cast_by_religion',
      type: 'POST',
      data: {"religion_id":religion_id2},
      context: this,
      success: function(result){
        $('#cast_id2').html(result);
        $('#sub_cast_id2').html('');
      }
    });
  });

  $("#cast_id2").on("change", function(){
    var cast_id2 =  $('#cast_id2').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_subcast_by_cast',
      type: 'POST',
      data: {"cast_id":cast_id2},
      context: this,
      success: function(result){
        $('#sub_cast_id2').html(result);
      }
    });
  });
</script>

<script type="text/javascript">
  $("#cast_id2").on("change", function(){
    var cast_id2 =  $('#cast_id2').find("option:selected").val();
    if(cast_id2 == '-1'){
      $('#other_cast_name').css('display','block');
      $('#other_cast_name').attr('required',true);
    } else{
      $('#other_cast_name').css('display','none');
      $('#other_cast_name').attr('required',false);
    }
  });

  $("#sub_cast_id2").on("change", function(){
    var sub_cast_id2 =  $('#sub_cast_id2').find("option:selected").val();
    if(sub_cast_id2 == '-1'){
      $('#other_subcast_name').css('display','block');
      $('#other_subcast_name').attr('required',true);
    } else{
      $('#other_subcast_name').css('display','none');
      $('#other_subcast_name').attr('required',false);
    }
  });

  $("#district_id2").on("change", function(){
    var district_id2 =  $('#district_id2').find("option:selected").val();

    // $('#other_district_name').focus();
    if(district_id2 == '-1'){
      $('#other_district_name').css('display','block');
      $('#other_district_name').attr('required',true);
      document.getElementById("other_district_name").focus();
    } else{
      $('#other_district_name').css('display','none');
      $('#other_district_name').attr('required',false);
    }
  });

  $("#tahasil_id2").on("change", function(){
    var tahasil_id2 =  $('#tahasil_id2').find("option:selected").val();
    if(tahasil_id2 == '-1'){
      $('#other_tahasil_name').css('display','block');
      $('#other_tahasil_name').attr('required',true);
    } else{
      $('#other_tahasil_name').css('display','none');
      $('#other_tahasil_name').attr('required',false);
    }
  });

  $("#city_id2").on("change", function(){
    var city_id2 =  $('#city_id2').find("option:selected").val();
    if(city_id2 == '-1'){
      $('#other_city_name').css('display','block');
      $('#other_city_name').attr('required',true);
    } else{
      $('#other_city_name').css('display','none');
      $('#other_city_name').attr('required',false);
    }
  });

  $("#education_id2").on("change", function(){
    var education_id2 =  $('#education_id2').find("option:selected").val();
    if(education_id2 == '-1'){
      $('#other_education_name').css('display','block');
      $('#other_education_name').attr('required',true);
    } else{
      $('#other_education_name').css('display','none');
      $('#other_education_name').attr('required',false);
    }
  });

  $("#new_password, #new_con_password").on('change',function(){
    var new_password = $('#new_password').val();
    var new_con_password = $('#new_con_password').val();
    if(new_password != new_con_password){
      $('#new_con_password').val('');
      $('.psw_alert').show().delay(5000).fadeOut();
    }
  });

</script>
