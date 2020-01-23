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
          ?>


            <div class="tab-div">
              <div class="row">
                <table class="table">
                  <tbody>
                    <tr>
                      <td width="25%"><div class="profile-img">
                        <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" alt="">
                      </div></td>
                      <td>
                        <table class="table  active-table">
                          <tbody>
                            <tr>
                               <th scope="row" style="font-size:18px;"  class="text-danger" colspan="4">Rahul Nikam</th>
                            </tr>
                            <tr>
                              <th>Member ID</th>
                               <td class="text-danger" colspan="3">	3161CC63124</td>
                            </tr>
                            <tr>
                              <th >Age</th>
                              <td>34</td>
                              <th> Height</th>
                              <td>7.00 Feet</td>
                            </tr>
                            <tr>
                              <th >Religion</th>
                              <td>Hindu</td>
                            <th> Caste / Sect</th>
                              <td>Maratha</td>
                            </tr>
                            <tr>
                              <th>Mother Tongue</th>
                              <td>Marathi</td>
                              <th>Marital Status</th>
                              <td>Unmarride</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="col-md-12">
                          <ul  class="inline" style="display: inline; list-style-type:none;">
                            <li>
                              <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                            </li>
                            <li>
                              <button class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                            </li>
                            <li>
                              <button class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Send Massege</button>
                            </li>
                          </ul>
                        </div>
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
