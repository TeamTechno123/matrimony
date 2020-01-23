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
            <h1>SUB CAST INFORMATION</h1>
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
                <h3 class="card-title">Sub Cast Information</h3>
              </div>


              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form id="form_action" role="form" action="../update_subcast" method="post">
                  <input type="hidden" name="sub_cast_id" value="<?php echo $sub_cast_id; ?>">
              <?php } else{ ?>
                <form id="form_action" role="form" action="save_subcast" method="post">
              <?php } ?>
                <div class="card-body row">
                  <div class="form-group col-md-12 drop-lg">
                  <select class="form-control select2" name="religion_id" id="religion_id" title="Select Religion" data-placeholder="Select Religion" style="width: 100%;" required>
                    <option selected="selected" value="" >Select Religion </option>
                    <?php foreach ($religion_list as $religion_list1) { ?>
                          <option value="<?php echo $religion_list1->religion_id; ?>" <?php if(isset($religion_id)){ if($religion_list1->religion_id == $religion_id){ echo "selected"; } }  ?>><?php echo $religion_list1->religion_name; ?></option>
                        <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-12 drop-lg">
                <select class="form-control select2" name="cast_id" id="cast_id" title="Select Cast" data-placeholder="Select Cast" style="width: 100%;" required>
                  <option selected="selected" value="" >Select Cast </option>
                  <?php foreach ($cast_list as $cast_list1) { ?>
                        <option value="<?php echo $cast_list1->cast_id; ?>" <?php if(isset($cast_id)){ if($cast_list1->cast_id == $cast_id){ echo "selected"; } }  ?>><?php echo $cast_list1->cast_name; ?></option>
                      <?php } ?>
                </select>
              </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="sub_cast_name" id="sub_cast_name" value="<?php if(isset($sub_cast_name)){ echo $sub_cast_name; } ?>" title="Enter Sub cast Name" placeholder="Enter Sub cast Name" required>
                  </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="../User/dashboard" class="btn btn-default ml-4">Cancel</a>
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
