<!doctype html>
<?php
  $mat_member_id = $this->session->userdata('mat_member_id');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- SweetAlert2 -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- Toastr -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_css.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <style media="screen">
  .form-group {
    margin-bottom: .5rem !important;
  }
  label {
    display: inline-block;
    margin-bottom: .2rem !important;
  }
  </style>
    <title>BHARTIYA SHADI</title>
  </head>
  <body>
    <section class="navbar-top">
       <div class="container">
         <div class="row">
           <div class="col-md-5">
            <img class="logo-img m-0" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
           </div>
         </div>
       </div>
    </section>

    <section class="login-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <h4 class="text-center">Upload Your Photos</h4>
            <div class="mt-4">
              <div class="mx-auto">
                <div class="card">
                  <div class="card-body login-card-body">
                    <form class="" action="<?php echo base_url(); ?>Member/update_profile_gallery" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="upload_page" value="upload_photo_page">
                      <div class="row">
                        <div class="col-md-2 text-center my-2">
                          <?php if($member_img == ''){ ?>
                            <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                          <?php } else{?>
                            <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>" alt="">
                          <?php } ?>
                        </div>
                        <div class="col-md-10 my-auto" style="">
                          <input type="file" name="member_img">
                          <input type="hidden" name="old_member_img" value="<?php echo $member_img; ?>">
                        </div>

                        <?php
                        $cnt = 0;
                        if($member_image_list){
                          foreach ($member_image_list as $list) {
                            $cnt++;
                        ?>
                        <div class="col-md-2 text-center my-2">
                          <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>" alt="">
                        </div>
                        <div class="col-md-10 my-auto">
                          <input class="mt-1 w-100" type="file" name="member_image_name[]" >
                          <input type="hidden" name="member_image_id[]" value="<?php echo $list->member_image_id ?>">
                        </div>
                        <?php  } }
                          $img_cnt = 4 - $cnt;
                          for ($i=0; $i < $img_cnt; $i++) {
                        ?>
                        <div class="col-md-2 text-center my-2">
                          <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                        </div>
                        <div class="col-md-10 my-auto">
                          <input class="mt-1 w-100" type="file" name="member_image_name[]">
                          <input type="hidden" name="member_image_id[]" value="">
                        </div>
                        <?php } ?>
                      </div>
                      <hr>
                      <div class=" text-center">
                        <button type="submit" class="btn btn-success"  name="button"> Upload </button>
                        <a href="<?php echo base_url(); ?>Member/active_members" class="btn btn-secondary"  name="button">Skip</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php //include("footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">
      $('#date1').datetimepicker({
        format: 'DD-MM-Y'
      });
      $('#date2').datetimepicker({
        format: 'DD-MM-Y'
      });
      $('#date3').datetimepicker({
        format: 'DD-MM-Y'
      })
      $('#date4').datetimepicker({
        format: 'DD-MM-Y'
      })
      $('#date5').datetimepicker({
        format: 'DD-MM-Y'
      })
    </script>
    <script>
      $(function () {
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
        $('.select2').select2();
      })
    </script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
  </body>
</html>
