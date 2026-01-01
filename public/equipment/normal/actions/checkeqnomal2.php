<!DOCTYPE html>
<?php include("../../../../includes/conn.php"); ?>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <?php include("../includes/head.php"); ?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include("../includes/menu.php"); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php include("../includes/nav.php"); ?>

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
                        <h3 class="card-header m-0 me-2 pb-3">ประวัติการตรวจครุภัณฑ์ตามเกณฑ์</h3>
                        
                      </div>
                     
                      <div class="card-body">


					<?php $eid=$_GET['eid']; ?>
					  
					                      <table width="200" border="0" class="table table-hover">
  <tbody>
    <tr><?php 
		   $eid2=$_GET['eid2'];
								  ?>
      <td width="12%"><strong>ชื่อครุภัณฑ์:</strong></td>
		<td width="88%"><input name="nameeq" type="text" class="form-control" id="nameeq" value="<?php echo $eid2;?>" readonly="readonly"></td>
		
    </tr>
  </tbody>
</table>
<br><br>
					                     
					  
                    <!-- ปุ่มเพิ่มที่อยู่ด้านขวา -->
                 
					 
					 <?php 
					 $sql2="SELECT * FROM `equipments` WHERE `eq_id`=$eid";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);

$sum_id=$row2['sum_id'];
					 ?>
					 
					 <div class="d-flex justify-content-end">
                     <a href="checkeqnomal.php?eid=<?php echo $sum_id; ?>">
                     <button type="button" class="btn btn-outline-danger">ย้อนกลับ</button>
                     </a> &nbsp;
					   <br>
						  </div>
					  
				    <br>
                    
                    <div class="table-responsive">
                      <table width="802" border="0" class="table table-hover">
                        <tbody>
                          
                            <td width="56" align="center"><strong>ที่</strong></h6></td>
                            <td width="350" align="center"><strong>วันที่ตรวจ</strong></h6></td>
                            <td width="409" align="center"><strong>สภา</strong>พ</h6></td>
                           
                          </tr>
                          <?php
							
							$n=1;
                          $sql = "SELECT * FROM `heleqnomal` WHERE `eq_id`=$eid";
                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr>
                            <td align="center"><?php echo $n; ?></td>
                            <td align="center"><?php echo $row['date']; ?></td>
                            <td align="center"><?php echo $row['hel']; ?></td>
                          
                          </tr>
                          <?php 
							  $n=$n+1;
							  }} ?>
                        </tbody>
                      </table>

				        </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            
            <!-- / Content -->

            <!-- Footer -->
           <?php include("../includes/footer.php"); ?>
  </body>
</html>