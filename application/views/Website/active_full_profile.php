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
        <div class="col-md-3">
          <div class="adv">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
            <br>
          </div>
          <div class="adv">
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
                      <input type="hidden" id="profile_member_id" name="profile_member_id" value="<?php echo $member_info[0]['member_id']; ?>">
                      <input type="hidden" id="login_member_id" name="login_member_id" value="<?php echo $member_info[0]['member_id']; ?>">
                      <?php if(isset($interest_sent)){ ?>
                        <button class="btn btn-primary btn-sm w-100 mb-2" id="btn_exp_interest" type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                      <?php  } else{ ?>
                        <button class="btn btn-primary btn-sm w-100 mb-2" id="btn_exp_interest" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                      <?php } ?>


                      <div class="row">
                        <div class="col-6">
                          <button class="btn btn-success btn-sm w-100 " id="btn_shortlist" type="submit"><i class="fa fa-list" aria-hidden="true"></i> Short List</button>
                        </div>
                        <div class="col-6">
                          <button class="btn btn-success btn-sm w-100 " type="submit"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>

                <div class="col-md-8">
                  <div class="frist">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="mb-3">Quick Information : </h5>
                      </div>
                    </div>

                    <table class="table tbl_mem_info">
                      <tbody>
                        <tr>
                           <th scope="row" style="font-size:18px;" class="text-danger" colspan="4"><?php echo $member_info[0]['member_name']; ?></th>
                        </tr>
                        <tr>
                          <th>Member ID : </th>
                           <th class="text-danger" colspan="3"><?php echo $member_info[0]['member_id']; ?></th>
                        </tr>
                        <tr>
                          <th>Gender : </th>
                          <td><?php echo $member_info[0]['member_gender']; ?> </td>
                          <th>Age : </th>
                          <td><?php echo $age; ?></td>
                        </tr>
                        <tr>
                          <th>Marital Status : </th>
                          <td><?php echo $member_info[0]['marital_status_name']; ?></td>
                          <th>City : </th>
                          <td><?php echo $member_info[0]['city_name']; ?></td>
                        </tr>
                        <tr>
                          <th>Area : </th>
                          <td><?php echo $member_info[0]['member_area']; ?></td>
                          <th>On Behalf : </th>
                          <td><?php if($member_info[0]['onbehalf_name'] == ''){ echo 'Self'; } else{ echo $member_info[0]['onbehalf_name']; } ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="third">
                    <div class="row">
                      <div class="col-md-6">
                        <h5 class="mb-3">Basic Information : </h5>
                      </div>                    
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <p class="mb-1">  Address : </p>
                      </div>
                      <div class="col-md-6 col-6">
                       <p class="mb-1"><?php echo $member_info[0]['member_address']; ?> </p>
                      </div>
                      <div class="col-12">
                          <hr class="hr-web">
                      </div>

                      <div class="col-md-3 col-6">
                        <p class="mb-1">Area : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['member_area']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">City : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['city_name']; ?></p>
                      </div>
                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Tahasil : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['tahasil_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">District : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['district_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">State : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['state_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Country : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['country_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Blood Group : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['blood_group_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Body type : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['body_type_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Religion : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['religion_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Cast : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['cast_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Sub Cast  : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['sub_cast_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Complexion : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['complexion_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Diet  : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['diet_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Education : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['education_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Family Status  : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['family_status_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Family Type : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['family_type_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Family Value  : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['family_value_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Gothram : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['gothram_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Height : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['height_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Income : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['min_income'].'-'.$member_info[0]['max_income']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Moonsign : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['moonsign_name']; ?></p>
                      </div>
                      <div class="col-12 d-block d-sm-none">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Occupation : </p>
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1"><?php echo $member_info[0]['occupation_name']; ?></p>
                      </div>

                      <div class="col-12">
                          <hr class="hr-web">
                      </div>
                      <div class="col-md-3 col-6">
                        <p class="mb-1">Resident Status  : </p>
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
  </section>
<!-- End of Quick Info Update Modal -->

<?php include("footer.php"); ?>


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
            $('#btn_exp_interest').text('Interest Sent');
            $('#btn_exp_interest').attr('disabled','true');
          } else{
            toastr.error('Interest not sent');
          }
        }
      });
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
