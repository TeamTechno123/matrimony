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
            <h1>Interested In Informatiom</h1>
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
                <h3 class="card-title">Interested In</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="marriage_type_name" id="marriage_type_name" value="<?php if(isset($marriage_type_name)){ echo $marriage_type_name; } ?>" placeholder="Enter Interested In" required>
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
