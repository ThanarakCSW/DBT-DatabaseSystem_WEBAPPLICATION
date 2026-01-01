<!DOCTYPE html>
<?php include("../../../includes/conn.php"); ?>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <?php include("../../../includes/head.php"); ?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include("../../../includes/menu.php"); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include("../../../includes/nav.php"); ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid container-p-y">
              <div class="row">
                
                <!-- Total Revenue -->
                
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h3 class="card-header m-0 me-2 pb-3">แก้ไขรูปครุภัณฑ์ตามเกณฑ์</h3>
                        
                      </div>
                    <?php  $eid=$_GET['eid'];?>
						<form action="actions/editeqnomalpic2.php?eid=<?php echo $eid; ?>" method="post" enctype="multipart/form-data">
						
						
                      <div class="card-body">
						        <div class="form-row row">
            <div class="col-md-12 text-center">
					<br>
					<input name="file" type="file"  id="file" class="form-control">
	            </div>
        </div>
        <!-- Row 10 -->
        <div class="form-row row">
            <div class="col-md-12 text-center">
				<br><br>
				
                
                <button type="button" class="btn btn-outline-danger" onclick="history.back();">ย้อนกลับ</button>
                
    			<button type="submit" class="btn btn-success">บันทึก</button>
            </div>
        </div>
    </form>
							
							
            
                       


                        
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            
            <!-- / Content -->

            <!-- Footer -->
           <?php include("../../../includes/footer.php"); ?>
  </body>
</html>



 
