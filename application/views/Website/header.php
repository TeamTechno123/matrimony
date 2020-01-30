<!doctype html>
<?php
  $mat_member_id = $this->session->userdata('mat_member_id');
  $member_is_login = $this->session->userdata('member_is_login');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" >
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">


    <title> Profile</title>
  </head>
  <body>

    <section class="head-nav">
      <nav class="navbar navbar-expand-lg navbar-light bg-light bg-facebook">
        <a class="navbar-brand w-50" href="#">  <img class="" src="<?php echo base_url(); ?>assets/images/logo.png" width="60%" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <?php $get_received_interest = $this->Member_Model->get_interest('',$mat_member_id,'interest_id');
            $rec_interect_cnt = 0;
            foreach ($get_received_interest as $get_received_interest) {
              $rec_interect_cnt++;
            }
            $msg_member_list = $this->Member_Model->masseges_member_list($mat_member_id);

            $rec_msg_cnt = 0;
            foreach ($msg_member_list as $msg_member_list) {
              $rec_msg_cnt++;
            }

            ?>
            <a class="nav-item nav-link text-white pt-2" id="filter" href="#" style="display:none;" data-toggle="modal" data-target="#searchModal"> Filter <i class="fa fa-search pl-1"></i>  </a>
                  
            <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Member/received_interest_list">Interest (<?php echo $rec_interect_cnt; ?>)</a>
            <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Member/messages_list">Message (<?php echo $rec_msg_cnt; ?>)</a>

            <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Member/active_members">Active Members</a>
            <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Member/profile">My Profile</a>
            <!-- <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Website/contact">Contact Us</a> -->
            <a class="nav-item nav-link pt-2" href="<?php echo base_url(); ?>Member/logout">Logout</a>
          </div>
        </div>
      </nav>
    </section>
