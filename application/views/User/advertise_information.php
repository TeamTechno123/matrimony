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
            <h1>ADVERTISEMENT INFORMATION</h1>
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
                <h3 class="card-title">Advertisement Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($update)){ ?>
                <form id="form_action" role="form" action="../update_advertisement" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="adv_id" value="<?php echo $adv_id; ?>">
              <?php } else{ ?>
                <form id="form_action" role="form" action="save_advertisement" method="post" enctype="multipart/form-data">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-12 drop-lg">
                  <select class="form-control select2" name="reach_id" id="reach_id" title="Select Reach" data-placeholder="Select Reach" style="width: 100%;" required>
                    <option selected="selected" value="" >Select Reach </option>
                    <?php foreach ($select_reach_list as $select_reach_list1) { ?>
                          <option value="<?php echo $select_reach_list1->reach_id; ?>" <?php if(isset($reach_id)){ if($select_reach_list1->reach_id == $reach_id){ echo "selected"; } }  ?>><?php echo $select_reach_list1->reach_name; ?></option>
                        <?php } ?>
                  </select>
                </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="adv_name" id="adv_name" value="<?php if(isset($adv_name)){ echo $adv_name; } ?>" title="Enter Advertisement Name" placeholder="Enter Advertisement Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="adv_amount" id="adv_amount" value="<?php if(isset($adv_amount)){ echo $adv_amount; } ?>" title="Enter Amount" placeholder="Enter Amount" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input class="form-control" type="file" name="adv_image" id="adv_image">
                  </div>
                  <?php if(isset($adv_image)){ ?>
                  <div class="form-group col-md-12">
                    <img style="height:150px; width:150px;" src="<?php echo base_url(); ?>assets/images/adv/<?php echo $adv_image; ?>" alt="">
                  </div>
                  <input type="hidden" name="img_old" value="<?php echo $adv_image; ?>">
                  <?php } ?>
                  <div class="form-group col-md-6 pl-4">
                    <div class="form-check">
                      <input type="checkbox" name="adv_status" <?php if(isset($adv_status) && $adv_status == 'deactivate') { echo 'checked'; } ?> value="deactivate" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label text-bold"  for="exampleCheck1">Disable This User</label>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
