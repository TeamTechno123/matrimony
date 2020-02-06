<?php include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
  $mat_member_user_id = $this->session->userdata('mat_member_user_id');
?>
<style media="screen">
  label{
    font-size: 14px;
  }
</style>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Lead/Member List</h1>
      </div>
    </div>
  </div>
</section>

<section class="profile-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3  d-none d-sm-block">
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image1; ?>" width="100%" height="60%" alt="">
          </div>
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image2; ?>" width="100%" height="60%" alt="">
          </div>
          <div class="adv mb-4 mt-0">
            <img src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image3; ?>" width="100%" height="60%" alt="">
          </div>
        </div>

        <div class="col-md-9">
          <div class="">
            <div class="card card-red" style="width: 100%;">
              <div class="card-body">
                <table id="" class="table table-bordered text-center">
                  <thead>
                  <tr>
                    <th>Commission</th>
                    <th>TDS Amount</th>
                    <th>Final Commission</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>&#8377; <?php echo $tot_mem_commission; ?></td>
                      <td>&#8377; <?php echo $tot_mem_tds; ?></td>
                      <td>&#8377; <?php echo $tot_mem_amt; ?></td>
                    </tr>
                  </tbody>
                </table>

                <a class="btn btn-sm btn-primary mt-3" href="<?php echo base_url(); ?>Member/add_member">Add New Lead</a>
              </div>
            </div>

            <div class="card card-red" style="width: 100%;">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th>Members Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th class="sr_no">Status</th>
                    <th class="sr_no">Commission</th>
                    <th class="sr_no">TDS</th>
                    <th class="sr_no">Final Commission</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0;
                    $mem_commission_amount = 0;
                    $mem_tds_amount = 0;
                    $mem_final_commission_amount = 0;

                    foreach ($lead_list as $list) {
                      $member_id = $list->member_id;
                      $commission_info = $this->User_Model->get_commission_by_mem_user($mat_member_user_id,$member_id);
                      if($commission_info){
                        $mem_commission_amount = $commission_info[0]['commission_amount'];
                        $mem_tds_amount = $commission_info[0]['tds_amount'];
                        $mem_final_commission_amount = $commission_info[0]['final_commission_amount'];
                      }
                      $i++;
                    ?>
                    <tr>
                      <td  class="sr_no"><?php echo $i; ?></td>
                      <td> <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>"><?php echo $list->member_name; ?></a> </td>
                      <td><?php echo $list->member_address; ?></td>
                      <td><?php echo $list->member_mobile; ?></td>
                      <td class="sr_no"><?php echo $list->member_status; ?></td>
                      <td class="sr_no"><?php echo $mem_commission_amount; ?></td>
                      <td class="sr_no"><?php echo $mem_tds_amount; ?></td>
                      <td class="sr_no"><?php echo $mem_final_commission_amount; ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

<!-- End of Quick Info Update Modal -->

<?php //include("footer.php"); ?>
<?php include("script.php"); ?>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
