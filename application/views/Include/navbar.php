<?php
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Profile</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-lock mr-2"></i> Change Password
        </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo base_url(); ?>User/change_password" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="password" class="form-control" name="new_password" id="new_password" title="Enter New Password" placeholder="Enter New Password" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="new_con_password" id="new_con_password" title="Confirm New Password" placeholder="Confirm New Password" required>
          </div>
          <div style="display:none;" class="psw_alert alert alert-danger p-2 col-md-8 offset-md-2" role="alert">
            New Password and Confirm Password must be same
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

      <script type="text/javascript">
      $("#new_password, #new_con_password").on('change',function(){
        var new_password = $('#new_password').val();
        var new_con_password = $('#new_con_password').val();
        if(new_password != new_con_password){
          $('#new_con_password').val('');
          $('.psw_alert').show().delay(5000).fadeOut();
        }
      });
      </script>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url() ?>User/dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">BHARTIYA SHADI </span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <?php $role_info = $this->User_Model->get_info_array('role_id', $role_id, 'role');
        $user_info = $this->User_Model->get_info_array('user_id', $user_id, 'user');  ?>
        <!-- <a class="d-block"></a> -->
        <a class="text-info" class="d-block"><b><?php echo $user_info[0]['user_name']; ?><br>
          <?php if($role_id == 4){
            $franchise_info = $this->User_Model->get_info_array('user_id', $user_id, 'franchise');
            $franchise_type_id = $franchise_info[0]['franchise_type_id'];
            $franchise_type_info = $this->User_Model->get_info_array('franchise_type_id', $franchise_type_id, 'franchise_type');
          ?>
          (<?php echo $franchise_type_info[0]['franchise_type_name']; ?> Franchise)
        <?php } else{ ?>
          (<?php echo $role_info[0]['role_name']; ?>)
        <?php } ?>
        </b></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item head">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
      <?php if($role_id == 1 || $role_id == 2 || $role_id == 4){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-edit"></i>
            <p>Company Section
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <?php if($role_id == 1){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/company_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Company Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/staff_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff Information</p>
              </a>
            </li>
          <?php } if($role_id == 1 || $role_id == 2 || $role_id == 4){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/franchise_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Franchise Information</p>
              </a>
            </li>
          <?php } ?>
          </ul>
        </li>
      <?php } ?>
      <?php if($role_id == 1){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-copy"></i>
            <p>General Informatiom
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/country_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Country Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/state_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              State Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/district_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              District Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/tahasil_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              Tahasil Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/city_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  City Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/language_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Language Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/onbehalf_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  On Behalf Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/referenceby_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Reference By Information
                </p>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-user"></i>
            <p>Member Section
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <?php if($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/members_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Members Information</p>
              </a>
            </li>
            <?php } ?>
            <?php if($role_id == 1 || $role_id == 2 || $role_id == 4 || $role_id == 5){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/advertise_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advertisement Information</p>
              </a>
            </li>
          <?php } ?>
          <?php if($role_id == 1){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/package_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Package Information </p>
              </a>
            </li>
          <?php } ?>
          </ul>
        </li>


      <?php if($role_id == 1){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-table"></i>
            <p>Profile Attributes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/blood_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Blood Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/body_type_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Body Type Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/height_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Height Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/complexion_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Complexion Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/diet_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Diet Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/education_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Education Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/family_status_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Family Status Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/family_type_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Family Type Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/family_value_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Family Value Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/resident_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Resident Status</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/income_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Income Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/gothram_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gothram Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/moonsign_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Moonsign Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/occupation_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Occupation Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/religion_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Religion Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/cast_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cast Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/subcast_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Cast Information</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/marriage_type_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Interested In</p>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>
      <?php if($role_id == 1 || $role_id == 2 ){ ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link head">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/member_invoice_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/adv_invoice_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advertise Invoice</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link head">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <?php if($role_id == 1 || $role_id == 2){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/franchise_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Franchise List Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/franchise_member_commission_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Member Commission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/franchise_adv_commission_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advertise Commission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/advertise_payment_list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advertise Payment</p>
                </a>
              </li>
              <?php } ?>
              <?php if($role_id == 4 || $role_id == 5){ ?>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Report/member_commission_list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Member Commission</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Report/adv_commission_list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advertise Commission</p>
                  </a>
                </li>
              <?php } ?>
              <?php if($role_id == 1 || $role_id == 2 || $role_id == 3){ ?>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Report/member_list_report" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Members</p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>

        <?php if($role_id == 4 || $role_id == 5){ ?>
        <li class="nav-item head">
          <a href="<?php echo base_url(); ?>User/commission" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Commission</p>
          </a>
        </li>
        <?php } ?>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
