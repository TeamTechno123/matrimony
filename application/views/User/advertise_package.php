<!DOCTYPE html>
<html>
<?php $user_id = $this->session->userdata('user_id');
  $user_info = $this->User_Model->get_info_array('user_id', $user_id, 'user'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Advertise Package</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="pack-cart ">
              <div class="card radius-20" style="width: 100%;">
                <div class="card-body text-center">
                  <form action="<?php echo base_url(); ?>Payment/adv_payment" method="post">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item" ><?php echo $package_name; ?></li>
                      <li class="list-group-item" >Reach At : <?php echo $reach_name; ?></li>
                      <li class="list-group-item" >Amount : <?php echo $package_amount; ?></li>
                      <li class="list-group-item">
                       <button type="submit" class="btn btn-outline-primary mt-3">Make Payment</button>
                      </li>
                    </ul>
                    <input type="hidden" name="adv_id" value="<?php echo $adv_id ?>">

                    <input type="hidden" name="billing_name" value="<?php echo $user_info[0]['user_name']; ?>">
                    <input type="hidden" name="billing_tel" value="<?php echo $user_info[0]['user_mobile']; ?>">
                    <input type="hidden" name="billing_email" value="<?php echo $user_info[0]['user_email']; ?>">
                    <input type="hidden" name="amount" value="<?php echo $package_amount; ?>">
                    <input type="hidden" name="merchant_id" value="214551">
                    <input type="hidden" name="order_id" value="123654789">
                    <input type="hidden" name="currency" value="INR"/>

                    <input type="hidden" name="redirect_url" value="<?php echo base_url(); ?>Payment/adv_pay_responce"/>
                    <input type="hidden" name="cancel_url" value="<?php echo base_url(); ?>Payment/adv_pay_responce"/>
                    <input type="hidden" name="language" value="EN"/>

                    <input type="hidden" name="billing_address" value=""/>
                    <input type="hidden" name="billing_city" value=""/>
                    <input type="hidden" name="billing_state" value=""/>
                    <input type="hidden" name="billing_zip" value="123456"/>
                    <input type="hidden" name="billing_country" value=""/>
                  </form>

                   <!-- <button type="button" class="btn btn-outline-danger mt-3">Continue</button> -->
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
