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
                        <h3 class="card-header m-0 me-2 pb-3">เพิ่มผู้รับผิดชอบ</h3>
                        
                      </div>
                     
                      <div class="card-body">
						  <form action="actions/addres2.php" method="post" ><table width="333" border="0" class="table table-hover">
  <tbody>
    
    <tr>
      <td align="center"><strong>ผู้รับผิดชอบ</strong></td>
      <td><input name="name" type="text" id="name" class="form-control"></td>
    </tr>

		
      
		
    
  </tbody>
</table><br><center>
							    <button type="button" class="btn btn-outline-danger" onclick="history.back();">ย้อนกลับ</button>
		  <input type="submit" name="submit" id="submit" value="บันทึก" class="btn btn-success"></center>
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
