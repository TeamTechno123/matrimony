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
        <div class="col-md-3">
          <div class="adv">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
             <br><br>
             <div class="w-100 center text-center">
               <!-- <button type="button" class="btn btn-outline-danger center" data-toggle="modal" data-target="#exampleModal">Danger</button> -->
             </div>
          </div>

          <div class="adv">
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

                      <!-- <hr class="white"> -->
                      <!-- <table width="100%" class="profile-table-left" >
                        <tr>
                          <td><p class="text-left">Age : </p> </td>
                          <td><p class="text-left"><?php echo $age; ?></p> </td>
                        </tr>
                        <tr>
                          <td><p class="text-left">MOTHER TONGUE : </p> </td>
                          <td><p class="text-left"><?php echo $member_info[0]['language_name']; ?></p> </td>
                        </tr>
                        <tr>
                          <td><p class="text-left">RELIGION : </p> </td>
                          <td><p class="text-left"><?php echo $member_info[0]['religion_name']; ?></p> </td>
                        </tr>
                        <tr>
                          <td><p class="text-left">CASTE / SECT : </p> </td>
                          <td><p class="text-left"><?php echo $member_info[0]['cast_name']; ?></p> </td>
                        </tr>
                        <tr>
                          <td><p class="text-left">HEIGHT : </p> </td>
                          <td><p class="text-left"><?php echo $member_info[0]['height_name']; ?></p> </td>
                        </tr>
                        <tr>
                          <td><p class="text-left">LOCATION : </p> </td>
                          <td><p class="text-left"><?php echo $member_info[0]['member_area']; ?></p> </td>
                        </tr>

                      </table> -->
                        <hr class="white">

                        <button class="btn btn-primary btn-profile w-100" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                        <div class="row">
                          <div class="col-6">
                            <button class="btn btn-success w-100  pl-1" type="submit">Short List</button>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-success w-100  pl-1" type="submit">Follow </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <button class="btn btn-primary w-100 btn-profile pl-1" type="submit">Short List</button>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-primary w-100 btn-profile pl-1" type="submit">Follow </button>
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
                <div class="col-md-12">
                  <h5 class="mb-3">Basic Information : </h5>
                </div>
              </div>

              <table class="table tbl_mem_info">
                <tbody>
                  <tr>
                    <th colspan="4">
                      Address : <?php echo $member_info[0]['member_address']; ?>
                    </th>
                  </tr>
                  <tr>
                    <th >Area : </th>
                    <td><?php echo $member_info[0]['member_area']; ?></td>
                    <th>City : </th>
                    <td><?php echo $member_info[0]['city_name']; ?></td>
                  </tr>
                  <tr>
                    <th >Tahasil : </th>
                    <td><?php echo $member_info[0]['tahasil_name']; ?></td>
                    <th>District : </th>
                    <td><?php echo $member_info[0]['district_name']; ?></td>
                  </tr>
                  <tr>
                    <th >State : </th>
                    <td><?php echo $member_info[0]['state_name']; ?></td>
                    <th>Country : </th>
                    <td><?php echo $member_info[0]['country_name']; ?></td>
                  </tr>
                  <tr>
                    <th >Blood Group : </th>
                    <td><?php echo $member_info[0]['blood_group_name']; ?></td>
                    <th>Body type : </th>
                    <td><?php echo $member_info[0]['body_type_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Religion : </th>
                    <td><?php echo $member_info[0]['religion_name']; ?></td>
                    <th>Cast : </th>
                    <td><?php echo $member_info[0]['cast_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Sub Cast : </th>
                    <td><?php echo $member_info[0]['sub_cast_name']; ?></td>
                    <th>Complexion : </th>
                    <td><?php echo $member_info[0]['complexion_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Diet : </th>
                    <td><?php echo $member_info[0]['diet_name']; ?></td>
                    <th>Education : </th>
                    <td><?php echo $member_info[0]['education_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Family Status : </th>
                    <td><?php echo $member_info[0]['family_status_name']; ?></td>
                    <th>Family Type : </th>
                    <td><?php echo $member_info[0]['family_type_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Family Value : </th>
                    <td><?php echo $member_info[0]['family_value_name']; ?></td>
                    <th>Gothram : </th>
                    <td><?php echo $member_info[0]['gothram_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Height : </th>
                    <td><?php echo $member_info[0]['height_name']; ?></td>
                    <th>Income : </th>
                    <td><?php echo $member_info[0]['min_income'].'-'.$member_info[0]['max_income']; ?></td>
                  </tr>
                  <tr>
                    <th>Moonsign : </th>
                    <td><?php echo $member_info[0]['moonsign_name']; ?></td>
                    <th>Occupation : </th>
                    <td><?php echo $member_info[0]['occupation_name']; ?></td>
                  </tr>
                  <tr>
                    <th>Resident Status : </th>
                    <td><?php echo $member_info[0]['resident_status_name']; ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
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
