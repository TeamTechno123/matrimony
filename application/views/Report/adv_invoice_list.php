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
            <h4>Franchise Advertisement Commission Information</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Franchise Advertisement Commission Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class=""  style="overflow-x: auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="sr_no">Sr. No.</th>
                  <th>Reach</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>District</th>
                  <th>Page</th>
                  <th>Amount</th>
                  <th>GST</th>
                  <th>Final Amount</th>
                  <th>Print</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($adv_invoice_list as $list) {
                    $i++;
                  ?>
                    <tr>
                      <td class="sr_no"><?php echo $i; ?></td>
                      <td><?php echo $list->reach_name; ?></td>
                      <td><?php echo $list->country_name; ?></td>
                      <td><?php if($list->reach_id == 2){ echo $list->state_name; } ?></td>
                      <td><?php if($list->reach_id == 3){ echo $list->district_name; } ?></td>
                      <td><?php echo $list->adv_page; ?></td>
                      <td><?php echo $list->paid_amt; ?></td>
                      <td><?php echo $list->paid_gst; ?></td>
                      <td><?php echo $list->paid_final_amt; ?></td>

                      <td class="sr_no">
                        <a target="_blank" href="adv_invoice_print/<?php echo $list->adv_id; ?>"> <i class="fa fa-print"></i> </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

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
