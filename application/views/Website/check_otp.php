<!doctype html>
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

    <title>BHARTIYA SHADI</title>
  </head>
  <body>
    <section class="head-nav">
      <nav class="navbar navbar-expand-lg navbar-light bg-light bg-facebook">
        <a class="navbar-brand" style="width:350px !important;" href="<?php echo base_url(); ?>Member/active_members">  <img class="" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt=""> </a>
      </nav>
    </section>

    <section class="login-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>WELCOME TO BHARTIYA SHADI.COM</h2>
            <h2>YOUR ACCOUNT IS CREATED SUCESSFULLY</h2>
            <div class="mt-4">
              <div class="login-box mx-auto">
                <?php if($this->session->flashdata('invalid_otp')){ ?>
                <div class="alert alert-danger invalid_otp" role="alert">
                  Invalide OTP.
                </div>
              <?php } ?>
                <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg text-bold">OTP is sent to Your Mobile Number</p>
                    <form action="<?php echo base_url(); ?>Member/verify_otp" method="post">
                      <div class="input-group my-4">
                        <input name="member_otp" type="number" maxlength="6" min="100000" class="form-control" placeholder="Enter OTP" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      </div>
                      <div class="social-auth-links text-center mb-3">
                        <button href="#" class="btn btn-block btn-primary"> Verify </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-6">
          <?php if($this->session->flashdata('reg_success')){ ?>
            <div class="alert alert-success mt-3 reg_success" role="alert">
              <b>Registered Successfully. Verify OTP.</b>
            </div>
          <?php } ?>
          </div> -->
        </div>
      </div>
    </section>


<?php //include("footer.php"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
      $(document).ready(function(){
        $('.invalid_otp').show().delay(5000).fadeOut();
      });
    </script>

    <?php if($this->session->flashdata('invalid_otp')){ ?>
      <script type="text/javascript">
        $(document).ready(function(){
          // alert();
          toastr.error('Invalid OTP');
        });
      </script>
    <?php } ?>

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
        // Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        });
        //Initialize Select2 Elements
        $('.select2').select2();
        //Bootstrap Duallistbox
        // $('.duallistbox').bootstrapDualListbox();
      })
    </script>

    <script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
  </body>
</html>
