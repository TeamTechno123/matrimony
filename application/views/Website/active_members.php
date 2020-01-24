<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id'); ?>
  <body>
    <section class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Active Members</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="profile-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 d-none d-sm-block">
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%" height="100%" alt="">
               <br>
            </div>
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
               <br>
            </div>
          </div>
          <div class="col-12 d-block d-sm-none">
            <div class="adv">
              <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <br>
            </div>
          </div>
          <div class="col-md-9">
          <?php if($active_members_list){
            $interest_sent = '';
            $shortlist_sent = '';
            foreach ($active_members_list as $list) {
              $today = date('d-m-Y');
              $birthdate = $list->member_birth_date;
              $age =  date_diff(date_create($birthdate), date_create($today))->y;
              $member_id = $list->member_id;
              $get_interest = $this->Member_Model->get_interest($mat_member_id,$member_id,'interest_id');
              if($get_interest){
                $interest_sent = 'sent';
                // $interest_status = $get_interest[0]['interest_status'];
              }

              $get_shortlist = $this->Member_Model->get_shortlist($mat_member_id,$member_id,'shortlist_id');
              if($get_shortlist){
                $shortlist_sent = 'sent';
              }
          ?>
            <div class="tab-div">
              <div class="row">
                <div class="col-md-3 col-12">
                  <img class="active-mem-img" src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" alt="">
                </div>
                <div class="col-md-9 col-12">
                  <div class="row">
                    <div class=" col-md-6 col-12">
                  <h5 class="mb-1 text-danger text-bold f-18"> <?php echo $list->member_name; ?></h5>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1">Member ID</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 text-danger"><?php echo $list->member_id; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-1">Age</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $age; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1">Marital Status</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $list->marital_status; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-1">Religion</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $list->religion_name; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1">Caste</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $list->cast_name; ?></p>
                </div>

                <div class="col-12">
                    <hr class="hr-web">
                </div>

                <div class="col-md-3 col-6">
                    <p class="mb-1">Occupation</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $list->occupation_name; ?></p>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <hr class="hr-web">
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1">Education</p>
                </div>
                <div class="col-md-3 col-6">
                    <p class="mb-1 "><?php echo $list->education_name; ?></p>
                </div>
                <div class="col-12">
                    <hr class="hr-web">
                </div>


                <div class="col-12 mt-1">
                  <ul  class="inline" style="display: inline; list-style-type:none;">
                    <li class="pt-2">
                      <a href="<?php echo base_url(); ?>Member/active_full_profile/<?php echo $list->member_id; ?>" class="btn btn-success btn-sm act_btn" type="submit"><i class="fa fa-address-card" aria-hidden="true"></i> Full Profile</a>
                    </li>
                    <li>
                      <?php if($interest_sent == ''){ ?>
                        <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Express Interest</button>
                      <?php } else{ ?>
                        <button class="btn btn-success btn-sm act_btn btn_exp_interest" to_member_id="<?php echo $list->member_id; ?>"  type="submit" disabled><i class="fa fa-heart" aria-hidden="true"></i> Expressed Interest</button>
                      <?php } ?>
                    </li>
                    <li>
                      <button class="btn btn-success btn-sm act_btn btn_open_modal" to_member_id="<?php echo $list->member_id; ?>" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
                    </li>
                    <!-- <li>
                      <?php if($shortlist_sent == ''){ ?>
                        <button class="btn btn-success btn-sm act_btn btn_shortlist" to_member_id="<?php echo $list->member_id; ?>"  type="submit"><i class="fa fa-heart" aria-hidden="true"></i> Shorllist</button>
                      <?php } else{ ?>
                        <button class="btn btn-success btn-sm act_btn " type="submit" disabled><i class="fa fa-list" aria-hidden="true" disabled></i> Shorllisted</button>
                      <?php } ?>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>
    <?php  }
    } ?>
  </div>

  <div class="col-12 d-block d-sm-none">
    <div class="adv pt-4">
      <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
      <br>
    </div>
  </div>

            <br><br>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="" method="post">
                <input type="hidden"  id="to_member_id" name="to_member_id">
                <textarea name="message_text" id="message_text" class="form-control form-control-sm" rows="4" cols="80" placeholder="Type your message..." required></textarea>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="btn_msg_send" data-dismiss="modal" class="btn btn-primary">Send</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript">

    // Send Interest...
    $('.btn_exp_interest').on('click',function(){
      var from_member_id = <?php echo $mat_member_id; ?>;
      var to_member_id = $(this).attr('to_member_id');

      $.ajax({
        url:'<?php echo base_url(); ?>Member/add_interest',
        method:'post',
        data:{'from_member_id':from_member_id,
              'to_member_id':to_member_id},
        context: this,
        success:function(result){
          if(result == 'success'){
            toastr.success('Interest sent successfully');
            $(this).html('<i class="fa fa-heart" aria-hidden="true" ></i> Expressed Interest');
            $(this).attr('disabled','true');
          } else{
            toastr.error('Interest not sent');
          }
        }
      });
    });


    $('.btn_open_modal').on('click',function(){
      var to_member_id = $(this).attr('to_member_id');
      $('#to_member_id').val(to_member_id);
    });

    $('#btn_msg_send').on('click',function(){
      var to_member_id = $('#to_member_id').val();
      var from_member_id = <?php echo $mat_member_id; ?>;
      var message_text = $('#message_text').val();
      if(message_text == ''){
        toastr.error('Message field is empty');
      } else{
        $('#message_text').val('');
        $.ajax({
          url:'<?php echo base_url(); ?>Member/add_message',
          method:'post',
          data:{'from_member_id':from_member_id,
                'to_member_id':to_member_id,
                'message_text':message_text},
          success:function(result){
            if(result == 'success'){
              toastr.success('Message Sent successfully');
            } else{
              toastr.error('Message Not Sent');
            }
          }
        });
      }
    });

    // Shortlist....
    // $('.btn_shortlist').on('click',function(){
    //   var from_member_id = <?php echo $mat_member_id; ?>;
    //   var to_member_id = $(this).attr('to_member_id');
    //
    //   $.ajax({
    //     url:'<?php echo base_url(); ?>Member/add_shortlist',
    //     method:'post',
    //     data:{'from_member_id':from_member_id,
    //           'to_member_id':to_member_id},
    //     context: this,
    //     success:function(result){
    //       if(result == 'success'){
    //         toastr.success('Profile Shortlisted successfully');
    //         $(this).html('<i class="fa fa-list" aria-hidden="true" ></i> Shortlisted');
    //         $(this).attr('disabled','true');
    //       } else{
    //         toastr.error('Profile Shortlist Error');
    //       }
    //     }
    //   });
    // });



    </script>
