<?php include("header.php");
  $mat_member_id = $this->session->userdata('mat_member_id');
?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Profile Gallery</h1>
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
          <div class="profile-div">
            <div class="profile-div-left">
              <div class="row">
                <div class="card card-red" style="width: 100%;">
                  <div class="card-body">
                    <form class="" action="<?php echo base_url(); ?>Member/update_profile_gallery" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="upload_page" value="profile_gallery_page">
                      <div class="row">
                        <div class="col-md-2 text-center my-2">
                          <?php if($member_img == ''){ ?>
                            <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                          <?php } else{?>
                            <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>" alt="">
                          <?php } ?>
                        </div>
                        <div class="col-md-6 my-auto" style="">
                          <input type="file" name="member_img">
                          <input type="hidden" name="old_member_img" value="<?php echo $member_img; ?>">
                        </div>
                        <div class="col-md-4 my-auto" style="">
                          <button type="submit" class="btn btn-success"  name="button"> Save </button>
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
                        <div class="col-md-6 my-auto">
                          <input class="mt-1 w-100" type="file" name="member_image_name[]" >
                          <input type="hidden" name="member_image_id[]" value="<?php echo $list->member_image_id ?>">
                        </div>
                        <div class="col-md-4 my-auto" style="">
                          <button type="submit" class="btn btn-success"  name="button"> Save </button>
                        </div>
                        <?php  } }
                          $img_cnt = 4 - $cnt;
                          for ($i=0; $i < $img_cnt; $i++) {
                        ?>
                        <div class="col-md-2 text-center my-2">
                          <img style="width: 60%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                        </div>
                        <div class="col-md-6 my-auto">
                          <input class="mt-1 w-100" type="file" name="member_image_name[]">
                          <input type="hidden" name="member_image_id[]" value="">
                        </div>
                        <div class="col-md-4 my-auto" style="">
                          <button type="submit" class="btn btn-success"  name="button"> Save </button>
                        </div>
                        <?php } ?>
                      </div>
                      <hr>
                      <!-- <div class=" text-center">
                        <button type="submit" class="btn btn-success"  name="button"> Upload </button>
                      </div> -->
                    </form>
                    <!-- <form class="" action="<?php echo base_url(); ?>Member/update_profile_gallery" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-4 text-center">
                          <p class="w-100 text-center">Profile Image</p>
                        </div>
                        <div class="col-md-8 text-center">
                          <p class="w-100 text-center">Other Images</p>
                        </div>
                        <div class="col-md-4 text-center my-2">
                          <?php if($member_img == ''){ ?>
                            <img style="width: 40%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                          <?php } else{?>
                            <img style="width: 40%;" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $member_img; ?>" alt="">
                          <?php } ?>
                          <input class="mt-1 w-100" type="file" name="member_img">
                          <input type="hidden" name="old_member_img" value="<?php echo $member_img; ?>">
                        </div>
                        <div class="col-md-8">
                          <div class="row">
                            <?php
                            $cnt = 0;
                            if($member_image_list){
                              foreach ($member_image_list as $list) {
                                $cnt++;
                            ?>
                            <div class="col-md-6 text-center my-2">
                              <img style="width: 40%;" src="<?php echo base_url(); ?>assets/images/profile/<?php echo $list->member_image_name; ?>" alt="">
                              <input class="mt-1 w-100" type="file" name="member_image_name[]" >
                              <input type="hidden" name="member_image_id[]" value="<?php echo $list->member_image_id ?>">
                            </div>

                            <?php  } }
                              $img_cnt = 4 - $cnt;
                              for ($i=0; $i < $img_cnt; $i++) {
                            ?>
                            <div class="col-md-6 text-center my-2">
                              <img style="width: 40%;" src="<?php echo base_url(); ?>assets/images/profile/default_profile.png" alt="">
                              <input class="mt-1 w-100" type="file" name="member_image_name[]">
                              <input type="hidden" name="member_image_id[]" value="">
                            </div>
                            <?php
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <button type="submit" class="btn btn-success"  name="button"> Upload </button>
                    </form> -->
                  </div>
                </div>



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
