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
            <h4>VIEW ALL RELIGION INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Religion Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>User/religion_information" class="btn btn-sm btn-block btn-primary">Add Religion</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Religion Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($religion_list as $religion_list1) {
                  $i++;
                ?>
                <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $religion_list1->religion_name; ?></td>
              <td>
                <a href="edit_religion/<?php echo $religion_list1->religion_id; ?>"> <i class="fa fa-edit"></i> </a>
                <a class="ml-4" href="delete_religion/<?php echo $religion_list1->religion_id; ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
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
