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
            <h1>CITY INFORMATION</h1>
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
                <h3 class="card-title">City Information</h3>
              </div>


              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form id="form_action" role="form" action="../update_city" method="post">
                  <input type="hidden" name="city_id" value="<?php echo $city_id; ?>">
              <?php } else{ ?>
                <form id="form_action" role="form" action="save_city" method="post">
              <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-12 drop-lg">
                  <select class="form-control select2" name="country_id" id="country_id" title="Select Country" data-placeholder="Select Country" style="width: 100%;" required>
                    <option selected="selected" value="" >Select Country </option>
                    <?php foreach ($country_list as $country_list1) { ?>
                          <option value="<?php echo $country_list1->country_id; ?>" <?php if(isset($country_id)){ if($country_list1->country_id == $country_id){ echo "selected"; } }  ?>><?php echo $country_list1->country_name; ?></option>
                        <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-12 drop-lg">
                <select class="form-control select2" name="state_id" id="state_id" title="Select State" data-placeholder="Select State" style="width: 100%;" required>
                  <option selected="selected" value="" >Select State </option>
                  <?php foreach ($state_list as $state_list1) { ?>
                        <option value="<?php echo $state_list1->state_id; ?>" <?php if(isset($state_id)){ if($state_list1->state_id == $state_id){ echo "selected"; } }  ?>><?php echo $state_list1->state_name; ?></option>
                      <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-12 drop-lg">
              <select class="form-control select2" name="district_id" id="district_id" title="Select District" data-placeholder="Select District" style="width: 100%;" required>
                <option selected="selected" value="" >Select District </option>
                <?php foreach ($district_list as $district_list1) { ?>
                      <option value="<?php echo $district_list1->district_id; ?>" <?php if(isset($district_id)){ if($district_list1->district_id == $district_id){ echo "selected"; } }  ?>><?php echo $district_list1->district_name; ?></option>
                    <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-12 drop-lg">
            <select class="form-control select2" name="tahasil_id" id="tahasil_id" title="Select Tahasil" data-placeholder="Select Tahasil" style="width: 100%;" required>
              <option selected="selected" value="" >Select Tahasil </option>
              <?php foreach ($tahasil_list as $tahasil_list1) { ?>
                    <option value="<?php echo $tahasil_list1->tahasil_id; ?>" <?php if(isset($tahasil_id)){ if($tahasil_list1->tahasil_id == $tahasil_id){ echo "selected"; } }  ?>><?php echo $tahasil_list1->tahasil_name; ?></option>
                  <?php } ?>
            </select>
          </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="city_name" id="city_name" value="<?php if(isset($city_name)){ echo $city_name; } ?>" placeholder="Enter City Name" required>
                  </div>
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
              </form>
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
