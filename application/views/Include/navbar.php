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
            <?php //if($role_id == 1 || $role_id == 2 || $role_id == 4){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/members_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Members Information</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/advertise_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advertisement Information</p>
              </a>
            </li>
          <?php //} ?>
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
              <a href="<?php echo base_url(); ?>User/cast_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Cast Information
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
                <p>
                  Family Type Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/family_value_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Family Value Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/gothram_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Gothram Information
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
              <a href="<?php echo base_url(); ?>User/income_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Income Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/moonsign_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Moonsign Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/occupation_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Occupation Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/religion_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              Religion Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/resident_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              Resident Status Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/subcast_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
              Sub Cast Information
                </p>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>
      <?php if($role_id == 1){ ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link head">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>Transaction/application_information" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Application Information
                  </p>
                </a>
              </li> -->

            </ul>
          </li>
        <?php } ?>
        <?php if($role_id == 1){ ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link head">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>Report/application_report" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Application Report
                  </p>
                </a>
              </li> -->
            </ul>
          </li>
        <?php } ?>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
