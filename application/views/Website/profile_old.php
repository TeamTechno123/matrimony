<?php include("header.php"); ?>
<section class="heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">User Profile</h1>
      </div>
    </div>
  </div>
</section>


<section class="profile-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%" height="60%" alt="">
              <!-- <button class="btn btn-primary btn-big mt-4 text-center" >Publish Your Card</button> --> <br><br>
              <button type="button" class="btn btn-outline-danger center-block" data-toggle="modal" data-target="#exampleModal">Danger</button>
        </div>
        <div class="col-md-9">
          <div class="profile-div">
            <div class="row">
              <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" height="50%" alt="">
                </div>
              </div>
            <div class="col-md-8">
              <div class="profile-desc">
                <table class="table table-striped table-profile">
                  <tr>
                    <td> <p> <b>Name :</b>  </p></td>
                    <td><p>Prajakta Prakash Patil</p> </td>
                  </tr>
                  <tr>
                    <td> <p> <b>Address : </b> </p></td>
                    <td><p>Rajarampuri Kolhapur </p> </td>
                  </tr>
                  <tr>
                    <td> <p> <b>Qualification : </b>  </p></td>
                    <td><p>B.tech (Mechanical)</p> </td>
                  </tr>
                  <tr>
                  <td> <p> <b>Profession : </b>  </p></td>
                  <td><p>Engineer</p> </td>
                  </tr>
                  <tr>
                    <td><p> <b>Religion & Cast : </b>  </p></td>
                    <td><p>Hindu - Maratha</p> </td>
                  </tr>
                  <tr>
                    <td><p> <b>Interested In </b> :  </p></td>
                    <td> <p></p> </td>
                  </tr>
                </table>
              </div>
            </div>
            </div>
          </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <img src="<?php echo base_url(); ?>assets/images/vertical.jpg" width="100%"  height="65%" alt="">

            <br><br>
            <img src="<?php echo base_url(); ?>assets/images/advertising.jpg" width="100%"   alt="">

        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-3">
              <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" height="100%" alt="">
            </div>
            <div class="col-md-3">
              <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" height="100%" alt="">
            </div>
            <div class="col-md-3">
              <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" height="100%" alt="">
            </div>
            <div class="col-md-3">
              <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%" height="100%" alt="">
            </div>
          </div>

            <div class="bottom-section">
                <div class="row">
            <div class="col-md-3">
              <div class="border-group">
                <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%"   alt=""> <br>
                  <button class="btn btn-primary btn-middle w-100  mt-3" type="submit">Send Interest</button>
                  <br>
                <br>
              </div>

              <div class="border-group">
                <img src="<?php echo base_url(); ?>assets/images/profile-girl.jpg" width="100%"  alt=""> <br>
                  <button class="btn btn-primary btn-middle w-100  mt-3" type="submit">Send Interest</button>
                  <br>
                <br>
              </div>
              </div>
              <div class="col-md-6">
                <table class="table table-striped table-profile">
                  <tr>
                    <td> <p> <b>Name :</b>  </p></td>
                    <td><p>Prajakta Prakash Patil</p> </td>
                  </tr>
                  <tr>
                    <td> <p> <b>Address : </b> </p></td>
                    <td><p>Rajarampuri Kolhapur </p> </td>
                  </tr>
                  <tr>
                    <td> <p> <b>Qualification : </b>  </p></td>
                    <td><p>B.tech (Mechanical)</p> </td>
                  </tr>
                  <tr>
                  <td> <p> <b>Profession : </b>  </p></td>
                  <td><p>Engineer</p> </td>
                  </tr>
                  <tr>
                    <td><p> <b>Religion & Cast : </b>  </p></td>
                    <td><p>Hindu - Maratha</p> </td>
                  </tr>
                  <tr>
                    <td><p> <b>Interested In </b> :  </p></td>
                    <td> <p></p> </td>
                  </tr>
                </table>
              </div>
              <div class="col-md-3">
                <div class="border-group">
                  <button class="btn btn-primary btn-middle w-100  mt-3" type="submit">Profile Download </button>
                  <button class="btn btn-primary btn-middle w-100 mt-3" type="submit">View Profile</button>
                  <button class="btn btn-primary btn-middle w-100 mt-3" type="submit">Submit Profile</button>
                  <div class="svg">
                    <img src="<?php echo base_url(); ?>assets/images/env.png" width="100%"  alt="">
                      </div>

                </div>
                <div class="border-group">
                  <button class="btn btn-primary btn-middle w-100  mt-3" type="submit">Profile Download </button>
                  <button class="btn btn-primary btn-middle w-100 mt-3" type="submit">View Profile</button>
                  <button class="btn btn-primary btn-middle w-100 mt-3" type="submit">Submit Profile</button>
                  <div class="svg">
                    <div class="svg">
                      <img src="<?php echo base_url(); ?>assets/images/env.png" width="100%"  alt="">
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>
