<!DOCTYPE html>
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
            <h4>Member Commission List</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Member Commission Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class=""  style="overflow-x: auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="sr_no">Sr. No.</th>
                  <th>Member Name</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>District</th>
                  <th>City</th>
                  <th>Commission</th>
                  <th>TDS</th>
                  <th>Final Commission</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  $total_comm = 0;
                  foreach ($member_commission_list as $list) {
                    $i++;
                    $total_comm = $total_comm + $list->final_commission_amount;
                  ?>
                    <tr>
                      <td class="sr_no"><?php echo $i; ?></td>
                      <td><?php echo $list->member_name; ?></td>
                      <td><?php echo $list->country_name; ?></td>
                      <td><?php echo $list->state_name; ?></td>
                      <td><?php echo $list->district_name; ?></td>
                      <td><?php echo $list->city_name; ?></td>
                      <td><?php echo $list->commission_amount; ?></td>
                      <td><?php echo $list->tds_amount; ?></td>
                      <td><?php echo $list->final_commission_amount; ?></td>

                      <!-- <td>
                        <a href="<?php echo base_url(); ?>User/edit_franchise/<?php echo $list->franchise_id ?>"> <i class="fa fa-edit"></i> </a>
                        <a class="ml-4" href="<?php echo base_url(); ?>User/delete_franchise/<?php echo $list->franchise_id ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
                      </td> -->
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              </div>

              <div class="w-100 text-right text-bold text-success mt-3">
                Total Commission : <?php echo $total_comm; ?>
              </div>
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
