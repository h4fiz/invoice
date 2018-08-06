<!DOCTYPE html>
<html>
   <?php $this->load->view('head');?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <?php $this->load->view('header');?>
      <div class="page-content d-flex align-items-stretch"> 
        <?php $this->load->view('sidebar');?>
        <div class="content-inner">
          <!-- Page Header-->
          <?php echo $contents;?>
         <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>PT. Kaizen Konsultan &copy; <?php echo date('Y');?></p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
   <?php $this->load->view('footer');?>
  </body>
</html>