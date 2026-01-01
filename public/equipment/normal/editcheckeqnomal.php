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
                        <h3 class="card-header m-0 me-2 pb-3">รายการข้อมูลครุภัณฑ์ตามเกณฑ์</h3>
                        
                      </div>
                     
                      <div class="card-body">

						  
						   <?php $eid=$_GET['eid'];?>
    <form method="post" action="actions/editcheckeqnomal2.php?eid=<?php echo $eid; ?>">
     
 
        <div class="form-row row">
            <div class="col-md-12">
                <label for="select-room" class="form-label">วันที่ตรวจ: </label>
             	<input name="date" type="date"  class="form-control" id="date">
            </div>
            
        </div>
		
		  <div class="form-row row">
            <div class="col-md-12">
                <label for="select-room" class="form-label">สภาพ:</label>
             	&nbsp;<input name="radio1" type="radio" value="ปกติ">&nbsp;ปกติ
				&nbsp;&nbsp;&nbsp;
				&nbsp;<input name="radio1" type="radio" value="ชำรุด">&nbsp;ชำรุด
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