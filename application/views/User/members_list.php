<!DOCTYPE html>
<?php
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
?>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>VIEW ALL MEMBERS INFORMATION</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Members Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>User/members" class="btn btn-sm btn-block btn-primary">Add members</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Members Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <?php if($role_id == 4 || $role_id == 5){ ?>
                  <th>Commission</th>
                  <?php } ?>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  $mem_commission_amount = 0;
                  $mem_tds_amount = 0;
                  $mem_final_commission_amount = 0;
                  foreach ($members_list as $list) {
                    $i++;

                    $member_id = $list->member_id;
                    $commission_info = $this->User_Model->get_commission_by_mem_user($user_id,$member_id);
                    if($commission_info){
                      $mem_commission_amount = $commission_info[0]['commission_amount'];
                      $mem_tds_amount = $commission_info[0]['tds_amount'];
                      $mem_final_commission_amount = $commission_info[0]['final_commission_amount'];
                    }
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->member_name; ?></td>
                    <td><?php echo $list->member_email; ?></td>
                    <td><?php echo $list->member_address; ?></td>
                    <td><?php echo $list->member_mobile; ?></td>
                    <td><?php echo $list->member_gender; ?></td>
                    <td><?php echo $list->member_status; ?></td>
                    <?php if($role_id == 4 || $role_id == 5){ ?>
                    <td><?php echo $mem_final_commission_amount; ?></td>
                    <?php } ?>
                    <td>
                      <a href="<?php echo base_url(); ?>User/members_profile/<?php echo $list->member_id ?>"> <i class="fa fa-eye"></i> </a>
                      <a class="ml-2" href="<?php echo base_url(); ?>User/edit_members/<?php echo $list->member_id ?>"> <i class="fa fa-edit"></i> </a>
                      <a class="ml-2" href="<?php echo base_url(); ?>User/delete_members/<?php echo $list->member_id ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>

                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


  </div>

</body>
</html>
