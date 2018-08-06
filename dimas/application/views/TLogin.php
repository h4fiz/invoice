<!DOCTYPE html>
<html>
  <?php $this->load->view('head');?>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>System Invoice</h1>
                  </div>
                  <p>PT. Kaizen Konsultan</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" action="<?php echo base_url().'login/do_login' ?>" class="form-validate">
                        <?php
                        if (validation_errors() || $this->session->flashdata('result_login')) {
                      ?>
                      <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Warning!</strong>
                          <?php echo validation_errors(); ?>
                          <?php echo $this->session->flashdata('result_login'); ?>
                      </div>    
                      <?php } ?>
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">UserName</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <button id="submit" class="btn btn-primary">Login </button> 
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
          <p>PT. Kaizen Konsultan &copy; <?php echo date('Y');?></p>
      </div>
    </div>
    <?php $this->load->view('footer');?>
  </body>
</html>