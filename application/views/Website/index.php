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
    <section class="navbar-top d-none d-sm-block">
       <div class="container">
         <div class="row">
           <div class="col-md-3">
            <img class="logo-img mt-2" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
           </div>
           <div class="col-md-9">
             <div class="row">
               <div class="col-md-2 offset-md-6 ">
                <label class="top-label" for="mobile">Mobile No.</label>
               </div>
               <div class="col-md-2">
                <label class="top-label" for="mobile">Password</label>
               </div>
               <div class="col-md-2">
               </div>
             </div>
            <form class="" action="<?php echo base_url(); ?>Member/check_login" method="post" >
              <div class="row">
                <div class="col-md-2 offset-md-6">
                   <input class="form-control form-control-sm mobile only_number required " name="mobile_no" type="text" maxlength="10" min="6000000000" class="form-control top-input" required>
                </div>
                <div class="col-md-2">
                  <input class="form-control form-control-sm" name="password" type="password" class="form-control top-input" required>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-outline-light btn-web">Log In</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-2 offset-md-10 text-left">
                 <label class="top-label font-12" for="mobile">Fogot Password</label>
              </div>
            </div>
           </div>

         </div>
       </div>
    </section>

    <section class="navbar-top d-block d-sm-none" >
      <div class="container">
        <div class="row">
          <div class="col-12">
           <img class="logo-img mt-2" src="<?php echo base_url(); ?>assets/images/logo.png" width="100%" alt="">
          </div>
          <div class="col-12">
             <form class="" action="<?php echo base_url(); ?>Member/check_login" method="post" >
            <div class="row">
              <div class="col-12">
               <label class="top-label padding-8 text-center font-16 w-100" >Mobile No.</label>
              </div>
              <div class="col-12">
                 <input class="form-control form-control-sm  mobile only_number required" name="mobile_no" type="text" maxlength="10" min="6000000000" class="form-control top-input" required>
              </div>
              <div class="col-12">
               <label class="top-label padding-8 text-center font-16 w-100">Password</label>
              </div>
              <div class="col-12">
                <input  name="password" type="password" class="form-control  form-control-sm top-input" required>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-outline-light btn-web margin-8 w-100">Log In</button>
              </div>
              <div class="col-12">
                 <label class="top-label font-12" for="mobile">Fogot Password ?</label>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    </section>

    <section class="login-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="italic">We Understand Your Dream's</h2>
            <img class="company-img" src="<?php echo base_url(); ?>assets/images/matri.png" alt="">
          </div>
          <div class="col-md-5">
            <div class="input-login">
              <h2 class="text-left">Create a New Account</h2>
              <form class="" id="form_register" action="<?php echo base_url(); ?>Member/register_member" method="post" autocomplete="off">
              <div class="row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control w-100 required title-case text" name="member_name" id="member_name"  placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control  w-100 required title-case text" name="member_lastname" id="member_lastname"  placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required mobile only_number" name="member_mobile" id="member_mobile" value="<?php if(isset($member_mobile)){ echo $member_mobile; } ?>" title="Enter Mobile No." placeholder="Enter Mobile No." required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control required" name="member_password" id="member_password" value="<?php if(isset($member_password)){ echo $member_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>

                  <div class="form-group col-md-12 mb-1">
                    <label class="mb-1 card-title">Birthday</label>
                  </div>
                  <div class="row mb-3 col-md-12">
                    <div class="col-md-3 col-4 pr-0">
                      <select class="form-control select2" id="birth_day" name=""  title="Day" data-placeholder="Day" style="width: 100%;" required>
                        <option selected="selected" value="" >Day</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-4 p-0 ">
                      <select class="form-control select2" id="birth_month" name=""  title="Month" data-placeholder="Month" style="width: 100%;" required>
                        <option selected="selected" value="" >Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">Octomber</option>
                        <option value="11">Novenber</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <div class="col-md-3 col-4 p-0 ">
                      <select class="form-control select2" id="birth_year" name=""  title="Year" data-placeholder="Year" style="width: 100%;" required>
                        <option selected="selected" value="" >Year</option>
                        <?php $year = date('Y');
                        for ($i=$year-18; $i > $year-100; $i--) { ?>
                        <option><?php echo $i; ?></option>
                        <?php }  ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                    <div class="form-group col-md-3  col-4 mb-0">
                      <label for="">Gender : </label>
                    </div>
                    <div class="form-group col-md-2 col-4 mb-0">
                      <div class="form-check">
                        <input class="form-check-input" value="Male" type="radio" name="member_gender" checked>
                        Male
                      </div>
                    </div>
                    <div class="form-group col-md-2 col-4 mb-0">
                      <div class="form-check">
                        <input class="form-check-input" value="Female" type="radio" name="member_gender">
                        Female
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 mt-4 text-center">
                  <button type="button" id="btn_register" class="btn btn-success mr-3 w-100">Creat Account</button>
                </div>
          </div>
          <input type="hidden" name="member_birth_date" id="member_birth_date">
      </form>
      </div>
      </div>
    </div>
</div>
</section>


<?php include("footer.php"); ?>
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
    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
      var member_mobile1 = $('#member_mobile').val();
      $('#member_mobile').on('change',function(){
        var member_mobile = $(this).val();
        $.ajax({
          url:'<?php echo base_url(); ?>User/check_duplication',
          type: 'POST',
          data: {"column_name":"user_mobile",
                 "column_val":member_mobile,
                 "table_name":"user"},
          context: this,
          success: function(result){
            if(result > 0){
              $('#member_mobile').val(member_mobile1);
              toastr.error(member_mobile+' Mobile No Exist.');
            }
          }
        });
      });

      $('#btn_register').on('click',function(){
        var birth_day = $('#birth_day').val();
        var birth_month = $('#birth_month').val();
        var birth_year = $('#birth_year').val();

        var birth_date = birth_day+'-'+birth_month+'-'+birth_year;

        var bits = birth_date.split('-');
        var d = new Date(bits[2] + '/' + bits[1] + '/' + bits[0]);
        var member_birth_date = !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));

        var member_name = $('#member_name').val();
        var member_lastname = $('#member_lastname').val();
        var member_mobile = $('#member_mobile').val();
        var member_password = $('#member_password').val();
        // var member_birth_date = $('#member_birth_date').val();
        if(member_name == '' || member_lastname == '' || member_mobile == '' || member_password == '' || member_birth_date == ''){
          toastr.error('All Fields Required');
        } else{
          if(member_birth_date){
            $('#member_birth_date').val(birth_date);
            $('#form_register').submit();
          }
          else{
            toastr.error('Invalid Date');
          }
        }
      });
    </script>
  </body>
</html>
