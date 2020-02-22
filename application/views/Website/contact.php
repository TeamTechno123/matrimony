<?php include("header.php"); ?>
  <body>
    <section class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Contact Us</h1>
          </div>
        </div>
      </div>
    </section>

<section class="contact">
  <div class="container">
    <div class="mail">
    <div class="row">
      <div class="col-md-8 offset-md-2">

        <form action="<?php echo base_url();?>Website/send_mail" method="post" class="contactForm" autocomplete="off" >
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Name :  </label>
        <input type="text" name="name" class="form-control"  placeholder="Enter Name" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mobile No :  </label>
        <input type="text" name="mobile" class="form-control"  placeholder="Enter Mobile No." required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email :  </label>
        <input type="email" name="email" class="form-control"  placeholder="Enter Email" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Message :   </label> <br>
        <textarea class="form-control"  name="message" rows="3" cols="115"></textarea>
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
  </div>
</section>


<?php include("footer.php"); ?>
