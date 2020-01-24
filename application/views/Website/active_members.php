<?php include("header.php"); ?>
  <body>
    <section class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Active Members</h1>
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
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
               <br>
            </div>
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
               <br>
            </div>
          </div>
          <div class="col-12 d-block d-sm-none">
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>
          <div class="col-md-9">
          <?php if($active_members_list){
            foreach ($active_members_list as $list) {
              $today = date('d-m-Y');
              $birthdate = $list->member_birth_date;
              $age =  date_diff(date_create($birthdate), date_create($today))->y;
          ?>


            <div class="tab-div">
              <div class="row">
                <div class="col-md-3 col-12">
                  <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" alt="">
                </div>
                <div class="col-md-9 col-12">
                  <div class="row">
                    <div class=" col-md-6 col-12">
                  <p class="mb-1 text-danger"> <?php echo $list->member_name; ?></p>
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


                <div class="col-12">
                  <ul  class="inline" >
                  <li class="pt-2">
                    <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                  </li>
                  <li>
                    <button class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                  </li>
                  <li>
                    <button class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-envelope" aria-hidden="true"></i> Send Message</button>
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

          <div class="col-12 d-block d-sm-none">
            <div class="adv pt-4">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>

            <br><br>
          </div>
        </div>
      </div>
    </section>
