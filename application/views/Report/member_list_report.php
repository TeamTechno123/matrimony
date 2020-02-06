<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 mt-3">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header text-center">
                <h3 class="card-title w-100 text-center">Member List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2" name="state_id" id="state_id" title="Select State" data-placeholder="Select State">
                      <option selected="selected" value="" >Select State </option>
                      <?php foreach ($state_list as $list) { ?>
                        <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <select class="form-control select2" name="district_id" id="district_id" title="Select District" data-placeholder="Select District">
                      <option selected="selected" value="" >Select District</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2" name="tahasil_id" id="tahasil_id" title="Select Tahasil" data-placeholder="Select Tahasil" style="width: 100%;" >
                      <option selected="selected" value="" >Select Tahasil </option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <select class="form-control select2" name="city_id" id="city_id" title="Select City" data-placeholder="Select City" style="width: 100%;" >
                      <option selected="selected" value="" >Select City </option>
                      <?php foreach ($city_list as $list) { ?>
                        <option value="<?php echo $list->city_id ?>" <?php if(isset($city_id) && $city_id == $list->city_id ){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2" name="status" id="status" title="Select Member Type" data-placeholder="Select Member Type" style="width: 100%;" >
                      <option selected="selected" value="" >Select Member Type</option>
                      <option value="free">Free</option>
                      <option value="active">Active</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12 text-center">
                    <button id="btn_update" type="submit" class="btn btn-primary">Search</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>

              <?php if(isset($load_member_list)){ ?>

              <div class="p-3">
                <div class="" style="overflow-x: auto;">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th style="min-width:100px">Members Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>District</th>
                      <th>City</th>
                      <th>Mobile</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0;
                      foreach ($member_list_report as $list) {
                        $i++;
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td style="min-width:100px"><?php echo $list->member_name; ?></td>
                        <td><?php echo $list->member_mobile; ?></td>
                        <td><?php echo $list->member_email; ?></td>
                        <td><?php echo $list->member_address; ?></td>
                        <td><?php echo $list->state_name; ?></td>
                        <td><?php echo $list->district_name; ?></td>
                        <td><?php echo $list->city_name; ?></td>
                        <td><?php echo $list->member_mobile; ?></td>
                        <td><?php echo $list->member_gender; ?></td>
                        <td><?php echo $list->member_status; ?></td>
                        <!-- <td>
                          <a href="<?php echo base_url(); ?>User/members_profile/<?php echo $list->member_id ?>"> <i class="fa fa-eye"></i> </a>
                          <a class="ml-2" href="<?php echo base_url(); ?>User/edit_members/<?php echo $list->member_id ?>"> <i class="fa fa-edit"></i> </a>
                          <a class="ml-2" href="<?php echo base_url(); ?>User/delete_members/<?php echo $list->member_id ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
                        </td> -->
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <br>
                <input type="button" name="export" id="export_excel" onclick="Export()" class="btn btn-primary" value="Export to Excel">
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
    function Export() {
      $("#example1").table2excel({
        filename: "Member_List_Report.xls"
      });
    }
</script>
  <script type="text/javascript">
    $("#state_id").on("change", function(){
      var state_id =  $('#state_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_district_by_state',
        type: 'POST',
        data: {"state_id":state_id},
        context: this,
        success: function(result){
          $('#district_id').html(result);
          $("#district_id option[value='-1']").remove();
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_tahasil_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#tahasil_id').html(result);
          $("#tahasil_id option[value='-1']").remove();
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_city_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#city_id').html(result);
          $("#city_id option[value='-1']").remove();
        }
      });
    });
  </script>
</body>
</html>
