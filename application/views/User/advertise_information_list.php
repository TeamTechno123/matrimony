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
            <h4>VIEW ALL ADVERTISEMENT INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Advertisement Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>User/advertise_information" class="btn btn-sm btn-block btn-primary">Add Advertisement</a>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="sr_no">Sr. No.</th>
                  <th>Name</th>
                  <th>From</th>
                  <th>To</th>
                  <th class="sr_no">Amount</th>
                  <th class="sr_no">Status</th>
                  <th class="sr_no">Action</th>
                  <th class="sr_no">Payment</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($advertise_list as $advertise_list1) {
                    $adv_status = $advertise_list1->adv_status;
                  $i++;
                ?>
                    <tr>
                      <td class="sr_no"><?php echo $i; ?></td>
                      <td><?php echo $advertise_list1->adv_name; ?></td>
                      <td><?php echo $advertise_list1->adv_from_date; ?></td>
                      <td><?php echo $advertise_list1->adv_to_date; ?></td>
                      <td class="sr_no"><?php echo $advertise_list1->adv_amount; ?></td>
                      <td class="sr_no text-bold">
                        <?php if($adv_status == 'inactive'){ ?>
                          <span class="text-danger"><?php echo $adv_status; ?></span>
                        <?php } else{ ?>
                          <span class="text-success"><?php echo $adv_status; ?></span>
                        <?php } ?>
                      </td>
                      <td class="sr_no">
                        <a href="edit_advertisement/<?php echo $advertise_list1->adv_id; ?>"> <i class="fa fa-edit"></i> </a>
                        <a class="ml-4" href="delete_advertisement/<?php echo $advertise_list1->adv_id; ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
                      </td>
                      <td class="sr_no text-bold">
                        <?php if($advertise_list1->is_paid == 0){ ?>
                          <a class="btn btn-primary btn-sm" href="advertise_package/<?php echo $advertise_list1->adv_id; ?>">Payment</a>
                        <?php } else{ ?>
                          <span class="text-success">Paid</span>
                        <?php } ?>
                      </td>
                    </tr>
                      <?php  }  ?>
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
