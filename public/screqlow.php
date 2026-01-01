<!DOCTYPE html>
<?php include("../includes/conn.php"); ?>
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
                        <?php $scr = isset($_POST['scr']) ? $_POST['scr'] : (isset($_GET['scr']) ? $_GET['scr'] : null);?>
                        <h3 class="card-header m-0 me-2 pb-3"><strong>รายการข้อมูลครุภัณฑ์ต่ำกว่าเกณฑ์ : ผลการค้นหา <?php echo $scr; ?></strong></h3>
                        
                      </div>
                     
                      <div class="card-body">
                          
					    <div class="d-flex align-items-center justify-content-between mb-3">
  <!-- ค้นหา -->
  <div class="col-md-6">
    <form action="screqlow.php" method="post" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
      <input name="scr" type="search" class="form-control" id="scr" placeholder="กรอกชื่อครุภัณฑ์, หมายเลขครุภัณฑ์, ประเภทครุภัณฑ์, ห้องที่ใช้งาน หรือ ผู้รับผิดชอบ" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">ค้นหา</button>
    </form>
  </div>
  
  <!-- ปุ่มเพิ่ม -->
  <div class="me-4">
	    <a href="eqlow.php">
      <button type="button" class="btn btn-danger">ย้อนกลับ</button>
    </a> 
    <a href="addeqlow.php">
      <button type="button" class="btn btn-success">เพิ่ม</button>
    </a>   
  </div>
</div>
					 

                    
                      <table width="802" border="0" align="center" class="table table-hover">
                        <tbody>
                          
                            <td width="46" align="center" valign="bottom"><strong>ที่</strong>                                                            
                              <br>
                            </td>
                            <td width="259" align="center" valign="bottom"><strong>หมายเลขครุภัณฑ์</strong>                                                           
                              <br>
                            </td>
                            <td width="326" align="center" valign="bottom"><strong>รายการ</strong></td>
                            <td width="190" align="center" valign="bottom"><strong>ประเภทพัสดุ</strong></td>
                            <td width="156" align="center" valign="bottom"><strong>แหล่งเงิน</strong></td>
                            <td width="100" align="center" valign="bottom"><strong>จำนวน</strong></td>
							<td width="104" align="center" valign="bottom"><strong>ราคา</strong></td>
                            <td width="392" align="center" valign="bottom"><strong>จัดการ</strong></td>
                          </tr>
                          <?php
						 
						  $n=1;
                         $sql = "
    SELECT eq.*
    FROM eqlow eq
    JOIN numroom_low nr ON eq.sum_id = nr.sum_id
    WHERE nr.room LIKE '%$scr%' 
       OR eq.sumnum LIKE '%$scr%'
       OR eq.name LIKE '%$scr%'
       OR eq.type LIKE '%$scr%'
       OR eq.responsible LIKE '%$scr%'
";

                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
								  
                          ?>
							
                          <tr>
                            <td align="center" valign="middle"><?php echo $n; ?></td>
                            <td align="center" valign="middle"><?php echo $row['sumnum']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['name']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['type']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['money']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['num']; ?></td>
							<td align="center" valign="middle"><?php echo $row['price']; ?></td>

                            <td align="center" valign="middle"><div class="bootstrap-scope">
                              <a href="detailscrlow.php?eid=<?php echo $row['sum_id'];?>&eid2=<?php echo $scr;?>">
                              <button type="button" class="btn btn-info">รายละเอียด</button>
                              </a>
                              <a href="checkeqlow.php?eid=<?php echo $row['sum_id'];?>">
                              <button type="button" class="btn btn-primary">ตรวจ</button>
                              </a>
								<a href="editeqlow.php?eid=<?php echo $row['sum_id'];?>">
<button type="button" class="btn btn-warning">แก้ไข</button>
								</a>
								
								
							
                              <!-- Button trigger modal -->

  <!-- Button -->
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['sum_id'];?>">
    ลบ
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal<?php echo $row['sum_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">โปรดตรวจสอบข้อมูล</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          โปรดตรวจสอบข้อมูลให้แน่ใจก่อนทำการลบ<br>
          <span class="text-danger">หมายเหตุ: เมื่อทำการลบข้อมูลจะไม่สามารถกู้ข้อมูลได้</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="deleqlow2.php?eid=<?php echo $row['sum_id'];?>">
            <button type="button" class="btn btn-danger">ยืนยันการลบข้อมูล</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
								
								
                            </td>
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
