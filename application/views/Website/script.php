<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/css/owl.carousel.js"></script>

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
  })
</script>

<script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
