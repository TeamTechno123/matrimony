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
          <?php if($active_members_list){
            foreach ($active_members_list as $list) {
              $today = date('d-m-Y');
              $birthdate = $list->member_birth_date;
              $age =  date_diff(date_create($birthdate), date_create($today))->y;
          ?>


            <div class="tab-div">
              <div class="row">
                <table class="table no-padding no-top-border">
                  <tbody>
                    <tr>
                      <td width="25%"><div class="profile-img no-top-border">
                        <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" alt="">
                      </div></td>
                      <td class="no-padding no-top-border">
                        <table class="table  active-table">
                          <tbody>
                            <tr>
                               <th scope="row"  class="text-danger text-center font-16" colspan="2"><?php echo $list->member_name; ?></th>
                               <th>Member ID</th>
                                <td class="text-danger"><?php echo $list->member_id; ?></td>
                            </tr>
                            <tr>
                              <th >Age</th>
                              <td><?php echo $age; ?></td>
                              <th>Marital Status</th>
                              <td><?php echo $list->marital_status; ?></td>
                            </tr>
                            <tr>
                              <th>Religion</th>
                              <td><?php echo $list->religion_name; ?></td>
                              <th>Caste</th>
                              <td><?php echo $list->cast_name; ?></td>
                            </tr>
                            <tr>
                              <th>Occupation</th>
                              <td><?php echo $list->occupation_name; ?></td>
                              <th>Education</th>
                              <td><?php echo $list->education_name; ?></td>
                            </tr>
                            <tr>
                              <td colspan="4 ">
                                <ul  class="inline" style="display: inline; list-style-type:none;">
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
                            </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          <?php  }
          } ?>



            <br><br>
          </div>
        </div>
      </div>
    </section>
