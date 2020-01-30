<?php include("header.php");
      $mat_member_id = $this->session->userdata('mat_member_id'); ?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center"> Messages </h1>
      </div>
    </div>
  </div>
</section>

<section class="profile-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 d-none d-sm-block">
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
                <div class="col-md-12">
                  <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-success">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <?php if(isset($masseges_list)){
                        foreach ($masseges_list as $masseges_list) {
                          $member_id = $masseges_list->from_member_id;
                          $member_info = $this->User_Model->get_info_array('member_id', $member_id, 'member');
                          $to_member = $masseges_list->to_member_id;
                          $to_member_info = $this->User_Model->get_info_array('member_id', $to_member, 'member');
                          if($member_id == $mat_member_id){
                      ?>
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right text-right w-75 ml-auto mr-0">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right"><?php //echo $member_info[0]['member_name']; ?> You </span>
                            <span class="direct-chat-timestamp float-left"><?php echo $masseges_list->message_date; ?> <?php echo $masseges_list->message_time; ?></span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="<?php base_url(); ?>assets/images/profile/" alt="">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            <?php echo $masseges_list->message_text; ?>
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                      <?php  } else{  ?>
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg w-75 mr-auto ml-0">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left"><?php echo $member_info[0]['member_name']; ?></span>
                            <span class="direct-chat-timestamp float-right"><?php echo $masseges_list->message_date; ?> <?php echo $masseges_list->message_time; ?></span>
                          </div>
                          <!-- /.direct-chat-infos -->
                          <img class="direct-chat-img" src="<?php base_url(); ?>assets/images/profile/" alt="">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            <?php echo $masseges_list->message_text; ?>
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                      <?php }  } } ?>
                      <div class="last_msg"></div>
                    </div>
                    <!--/.direct-chat-messages-->

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <!-- <form action="<?php echo base_url(); ?>Member/add_message" method="post"> -->
                      <div class="input-group">
                        <input type="hidden" id="to_member_id" name="to_member_id" value="<?php echo $to_member_id; ?>">

                        <input type="text" name="message_text" id="message_text" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" id="btn_msg_send" class="btn btn-warning">Send</button>
                        </span>
                      </div>
                    <!-- </form> -->
                  </div>
                  <!-- /.card-footer-->
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




<?php //include("footer.php"); ?>
<?php include("script.php"); ?>

<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    var $container = $('.direct-chat-messages'),
    $scrollTo = $('.last_msg');
    $container.scrollTop(
        $scrollTo.offset().top - $container.offset().top + $container.scrollTop()
    );
  });

  $('#btn_msg_send').on('click',function(){
    // alert();
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
            location.replace(to_member_id);
          } else{
            toastr.error('Message Not Sent');
          }
        }
      });
    }
  });

  $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    margin:40,
    padding:30,
    dots: true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
  })
  </script>
