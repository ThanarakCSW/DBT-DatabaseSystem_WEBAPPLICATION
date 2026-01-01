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
                        <h3 class="card-header m-0 me-2 pb-3">เพิ่มการตรวจครุภัณฑ์ต่ำกว่าเกณฑ์</h3>
                        
                      </div>
                     
                      <div class="card-body">
              				  <?php $eid=$_GET['eid'];?>
    <form method="post" action="actions/addcheckeqlow2.php?eid=<?php echo $eid; ?>">
						  <label for="date" class="form-label">วันที่ตรวจ:</label>
                            <input type="text" id="date" name="date"  class="form-control" oninput="formatDate(this)" maxlength="10" placeholder="วว/ดด/ปปปป"/>
						 <br>
	
     
 
				<table width="200" border="1" class="table table-hover">
  <tbody>
    <tr>
      <td align="center"><strong>ลำดับ</strong></td>
      <td align="center"><strong>เลขครุภัณฑ์</strong></td>
      <td align="center"><strong>สภาพ</strong></td>
    </tr>
<?php 
	  $n=1;
	  $sql="SELECT * FROM `equipments_low` WHERE `sum_id`=$eid";
	  $result=mysqli_query($con,$sql);
	  if(mysqli_num_rows($result)>0){
		  while($row=mysqli_fetch_assoc($result)){
	  
	  $sql2="SELECT * FROM `con_equipment`";
	  $result2=mysqli_query($con,$sql2);
			 
			  
	  ?>
	  
    <tr>
      <td align="center"><?php echo $n; ?></td>
      <td align="center"><?php echo $row['eq_code']; ?></td>
      <td align="center">
		  <?php 
			  
		   if(mysqli_num_rows($result2)>0){
		  while($row2=mysqli_fetch_assoc($result2)){
			  
		  ?>
		  <input name="radio<?php echo $row['eq_id']; ?>" type="radio" value="<?php echo $row2['condition']; ?>"> &nbsp;<?php echo $row2['condition']; ?> &nbsp; &nbsp;
		
		<?php  }} ?>
		
		
		</td>
    </tr>
	  
	  <?php 
		 
			  $n=$n+1;
	    }
		  
	  }
	  ?>
	  
  </tbody>
</table>

				
		
		
		
		
		
		
		
		
                <br><br>
		<div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-danger" onclick="history.back();">ย้อนกลับ</button>
                &nbsp;
    			<button type="submit" class="btn btn-success">บันทึก</button>
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

   <script>
      function formatDate(input) {
        let value = input.value.replace(/\D/g, ''); // ลบทุกตัวที่ไม่ใช่ตัวเลข

        // แทรกเครื่องหมาย / หลังจากพิมพ์ 2 ตัวแรก (สำหรับวัน)
        if (value.length <= 2) {
          input.value = value.replace(/(\d{2})/, '$1'); 
        } 
        // แทรกเครื่องหมาย / หลังจากพิมพ์ 2 ตัวถัดไป (สำหรับเดือน)
        else if (value.length <= 4) {
          input.value = value.replace(/(\d{2})(\d{2})/, '$1/$2');
        } 
        // แทรกเครื่องหมาย / หลังจากพิมพ์ 4 ตัวสุดท้าย (สำหรับปี)
        else if (value.length <= 8) {
          input.value = value.replace(/(\d{2})(\d{2})(\d{4})/, '$1/$2/$3');
        }
      }
    </script>