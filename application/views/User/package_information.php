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
          <div class="col-sm-12 text-center mt-2">
            <h1>ADVERTISEMENT PACKAGE INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Advertisement Package Information</h3>
              </div>
              <form id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-md-12 drop-lg">
                    <select class="form-control select2" name="reach_id" id="reach_id" title="Select Reach" data-placeholder="Select Reach" style="width: 100%;" required>
                      <option selected="selected" value="" >Select Reach </option>
                      <?php foreach ($select_reach_list as $select_reach_list1) {
                        if($select_reach_list1->reach_id == $reach_id) {
                        ?>
                        <option value="<?php echo $select_reach_list1->reach_id; ?>" <?php if(isset($reach_id)){ if($select_reach_list1->reach_id == $reach_id){ echo "selected"; } }  ?>><?php echo $select_reach_list1->reach_name; ?></option>
                      <?php }  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="package_name" id="package_name" value="<?php if(isset($package_name)){ echo $package_name; } ?>" title="Enter Package Name" placeholder="Enter Package Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="package_amount" id="package_amount" value="<?php if(isset($package_amount)){ echo $package_amount; } ?>" title="Enter Amount" placeholder="Enter Amount" required>
                  </div>
                  <div class="form-group col-md-6 d-none">
                    <input type="file" name="package_img" id="package_img" class="form-control" id="exampleInputFile">
                  </div>
                  <!-- <?php if(isset($package_img)){ ?>
                  <div class="form-group col-md-6">
                    <img style="height:150px; width:150px;" src="<?php echo base_url(); ?>assets/images/package/<?php echo $package_img; ?>" alt="">
                  </div>
                  <input type="hidden" name="img_old" value="<?php echo $package_img; ?>">
                  <?php } ?> -->
                  <div class="form-group col-md-12">
                  <!-- <input type="checkbox" name="package_status" <?php if(isset($package_status) && $package_status == 'deactivate') { echo 'checked'; } ?> value="deactivate"> Disable This Package -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="../dashboard" class="btn btn-default ml-4">Cancel</a>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

<?php if($this->session->flashdata('check_mobile')){
  $form_data = $this->session->flashdata('form_data');
?>
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($form_data as $key => $value) { ?>
      $('#<?php echo $key; ?>').val('<?php echo $value; ?>');
    <?php  } ?>
    toastr.error('Mobile Number Exist.');
  });
</script>
<?php } ?>

<script type="text/javascript">
// Update Click...
$('#btn_update, #btn_save').on('click',function(){
  $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if ($(".required-input")[0] || $(".invalide-input")[0]){
    // Dont Submit...
  } else {
      $('#form_action').submit();
  }
});
</script>


</body>
</html>
