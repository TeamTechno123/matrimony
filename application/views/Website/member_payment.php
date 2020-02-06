<?php
  include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
?>
  <body>
    <section class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Payment</h1>
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
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-div">
              <?php
              $member_info = $this->Member_Model->get_member_info($mat_member_id);
              // $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member'); ?>
              <form method="post" name="customerData" action="member_make_payment">
                <div class="row mt-4">
                  <div class="form-group col-md-2 offset-md-3">
                    Member Id :
                  </div>
                  <div class="form-group col-md-4">
                    <input class="form-control form-control-sm" type="text" name="" value="<?php echo $member_info[0]['member_id'] ?>" readonly>
                  </div>
                  <div class="form-group col-md-2 offset-md-3">
                    Member Name :
                  </div>
                  <div class="form-group col-md-4">
                    <input class="form-control form-control-sm" type="text" name="billing_name" value="<?php echo $member_info[0]['member_name'] ?>" readonly>
                  </div>
                  <div class="form-group col-md-2 offset-md-3">
                    Mobile No :
                  </div>
                  <div class="form-group col-md-4">
                    <input class="form-control form-control-sm" type="text" name="billing_tel" value="<?php echo $member_info[0]['member_mobile'] ?>" readonly>
                  </div>
                  <div class="form-group col-md-2 offset-md-3">
                    Email :
                  </div>
                  <div class="form-group col-md-4">
                    <input class="form-control form-control-sm" type="text" name="billing_email" value="<?php echo $member_info[0]['member_email'] ?>" readonly>
                  </div>

                  <div class="form-group col-md-2 offset-md-3">
                    Amount :
                  </div>
                  <div class="form-group col-md-4">
                    <span class="text-success text-bold">&#8377; 1</span>
                    <input class="form-control form-control-sm" type="hidden" name="amount" value="1">
                  </div>

                  <input type="hidden" name="tid" id="tid" readonly />
                  <input type="hidden" name="merchant_id" value="214551" />
                  <input type="hidden" name="order_id" value="123654789"/>
                  <input type="hidden" name="currency" value="INR"/>
                  <input type="hidden" name="redirect_url" value="<?php echo base_url(); ?>Payment/member_pay_responce"/>
                  <input type="hidden" name="cancel_url" value="<?php echo base_url(); ?>Payment/member_pay_responce"/>
                  <input type="hidden" name="language" value="EN"/>

                  <input type="hidden" name="billing_address" value="<?php echo $member_info[0]['member_address'] ?>"/>
                  <input type="hidden" name="billing_city" value="<?php echo $member_info[0]['city_name'] ?>"/>
                  <input type="hidden" name="billing_state" value="<?php echo $member_info[0]['state_name'] ?>"/>
                  <input type="hidden" name="billing_zip" value="123456"/>
                  <input type="hidden" name="billing_country" value="<?php echo $member_info[0]['country_name'] ?>"/>

                  <div class="form-group col-md-6 offset-md-3 text-center">
                    <button class="btn btn-success" type="submit" name="button">Make Payment</button>
                    <a href="<?php echo base_url(); ?>Member/active_members" class="btn btn-default" name="button">Skip</a>
                  </div>
                </div>
            	</form>
            </div>
          </div>
          <br><br>
        </div>
      </div>
    </div>










    </section>

<?php include("script.php"); ?>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script>
  	window.onload = function() {
  		var d = new Date().getTime();
  		document.getElementById("tid").value = d;
  	};
  </script>
