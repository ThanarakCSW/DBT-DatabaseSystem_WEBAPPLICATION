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
                        <h3 class="card-header m-0 me-2 pb-3">แก้ไขข้อมูลครุภัณฑ์ตามเกณฑ์</h3>
                        
                      </div>
                     
                      <div class="card-body">
						  <?php
					$eid=$_GET['eid'];
		
                    $sql = "SELECT * FROM `eqnomal` WHERE `sum_id`=$eid";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){	 
                    ?>
                 <form action="editeqnomal2.php?eid=<?php echo $eid; ?>" method="post" enctype="multipart/form-data">
        <!-- Row 1 -->
        <div class="form-row row">
            <div class="col-md-9">
                <label for="name" class="form-label">รายการ:</label>
                <input name="name" type="text"  class="form-control" id="name" value="<?php  echo $row['name'];?>">
            </div>
            <div class="col-md-3">
                <label for="select_type" class="form-label">ประเภทพัสดุ:</label>
                <select name="select_type"  class="form-control" id="select_type">
					<option value="<?php  echo $row['type'];?>"><?php  echo $row['type'];?></option>
                    <?php
                    $sql6 = "SELECT * FROM `type`";
                    $result6 = mysqli_query($con, $sql6);
                    if(mysqli_num_rows($result6) > 0){
                        while($row6 = mysqli_fetch_assoc($result6)){	 
                    ?>
                  <option value="<?php echo $row6['type'];?>"><?php echo $row6['type'];?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="form-row row">
            <div class="col-md-3">
                <label for="num1" class="form-label">หมายเลขหมวดครุภัณฑ์: <font color="#FF0004"> ให้ใส่ช่องละ 4 หลัก</font></label>
                <input name="num1" type="text"  class="form-control" id="num1" value="<?php  echo $row['num1'];?> "maxlength="4">
            </div>
			
			 <div class="col-md-3">
				 <label for="num1" class="form-label">หมายเลขหมวดครุภัณฑ์: <font color="#FF0004">ช่องที่2</font></label>
                <input name="num2" type="text"  class="form-control" id="num2" value="<?php  echo $row['num2'];?>"maxlength="3">
            </div>
			
			<div class="col-md-3">
				 <label for="num1" class="form-label">หมายเลขหมวดครุภัณฑ์: <font color="#FF0004">ช่องที่3</font></label>
                <input name="num3" type="text"  class="form-control" id="num3"value="<?php  echo $row['num3'];?>"maxlength="4">
            </div>
			
			<div class="col-md-3">
				 <label for="num1" class="form-label">หมายเลขหมวดครุภัณฑ์: <font color="#FF0004">ช่องที่4</font></label>
                <input name="num4" type="text"  class="form-control" id="num4" value="<?php  echo $row['num4'];?>"maxlength="3">
            </div>

        </div>
		
		

        <!-- Row 3 -->
           <div class="form-row row">
            <div class="col-md-4">
                <label for="num2" class="form-label">หมายเลขครุภัณฑ์เริ่ม:</label>
                <input name="numstart" type="text"  class="form-control" id="numstart" value="<?php  echo $row['numstart'];?>" maxlength="6">
            </div>
			<div class="col-md-4">
                <label for="num3" class="form-label">หมายเลขครุภัณฑ์สุดท้าย:</label>
                <input name="numend" type="text"  class="form-control" id="numend" value="<?php  echo $row['numend'];?>" maxlength="6">
            </div>
            <div class="col-md-4">
                <label for="number" class="form-label">จำนวน:</label>
                <input name="number" type="number"  class="form-control" id="number" value="<?php  echo $row['num'];?>">
            </div>
        </div>

        <!-- Row 4 -->
      

        <!-- Row 5 -->
        <div class="form-row row">
            <div class="col-md-6">
                <label for="moneynum" class="form-label">เลขสินทรัพย์:</label>
                <input name="moneynum" type="text"  class="form-control" id="moneynum" value="<?php  echo $row['moneynum'];?>">
            </div>
			<div class="col-md-6">
                <label for="select-transfer" class="form-label">การรับโอน:</label>
                <select name="select_transfer"  class="form-control" id="select-transfer" value="<?php  echo $row['tranfer'];?>">
					<option value="<?php  echo $row['tranfer'];?>"><?php  echo $row['tranfer'];?></option>
                    <?php
                    $sql2 = "SELECT * FROM `receive_transfer`";
                    $result2 = mysqli_query($con, $sql2);
                    if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_assoc($result2)){	 
                    ?>
                    <option value="<?php echo $row2['transfer'];?>"><?php echo $row2['transfer'];?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Row 7 -->
                <div class="form-row row">
                      <div class="col-md-6">
                        <label for="date1" class="form-label">วันที่รับโอน:</label>
                        <input name="date1" type="text"  class="form-control" id="date1" placeholder="DD/MM/YYYY" value="<?php  echo $row['date1'];?>" maxlength="10" oninput="formatDate(this)"/>
                        </div>
                      <div class="col-md-6">
                        <label for="date1" class="form-label">วันที่ได้มา:</label>
                        <input name="date2" type="text"  class="form-control" id="date2" placeholder="DD/MM/YYYY" value="<?php  echo $row['date2'];?>" maxlength="10" oninput="formatDate(this)"/>
                        </div>
                        </div>

        <!-- Row 8 -->
        <div class="form-row row">
            <div class="col-md-6">
                <label for="select-money" class="form-label">แหล่งเงิน:</label>
                <select name="select_money"  class="form-control" id="select-money" value="<?php  echo $row['money'];?>">
					<option value="<?php  echo $row['money'];?>"><?php  echo $row['money'];?></option>
                    <?php
                    $sql3 = "SELECT * FROM `source_money`";
                    $result3 = mysqli_query($con, $sql3);
                    if(mysqli_num_rows($result3) > 0){
                        while($row3 = mysqli_fetch_assoc($result3)){	 
                    ?>
					
                    <option value="<?php echo $row3['money'];?>"><?php echo $row3['money'];?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                            <label for="price" class="form-label">ราคา:</label>
                            <input name="price" type="text"  class="form-control" id="price" oninput="formatNumber(this)" value="<?php echo $row['price'];?>" >
                          </div>
                        
        </div>

        <!-- Row 9 -->
        <div class="form-row row">
            <div class="col-md-6">
    <label for="select-room" class="form-label">ห้องที่ใช้งาน:</label><br>
    <div>
        <?php
        // ดึงข้อมูลห้องทั้งหมดจากตาราง room
        $sql4 = "SELECT * FROM room";  
        $result4 = mysqli_query($con, $sql4);

        // วนลูปแสดงห้องทั้งหมด
        if (mysqli_num_rows($result4) > 0) {
            while ($row4 = mysqli_fetch_assoc($result4)) {
                $room = $row4['room'];
                $room_id = $row4['room_id']; // Assuming 'id' is the primary key for the room table
                $checked = '';
                $quantity_value = '';
                
                // เช็คว่าใน numroom มีข้อมูลห้องนี้หรือไม่
                $sql_check = "SELECT nr FROM numroom WHERE room = '$room' AND sum_id = '$eid'";
                $result_check = mysqli_query($con, $sql_check);
                
                // ถ้ามีข้อมูลห้องนี้ใน numroom ก็จะทำการแสดง checkbox พร้อมจำนวนที่เลือก
                if (mysqli_num_rows($result_check) > 0) {
                    $row_check = mysqli_fetch_assoc($result_check);
                    $checked = 'checked';  // ห้องนี้มีการใช้งานแล้ว
                    $quantity_value = $row_check['nr'];  // แสดงจำนวนที่เคยเลือก
                }

                // แสดงห้องทั้งหมดเป็น checkbox พร้อมช่องกรอกจำนวน
        ?>
            <div class="form-check form-check-inline">
                <!-- ห้องที่ใช้งาน -->
                <input class="form-check-input" type="checkbox" name="select_room[]" value="<?php echo $room; ?>" id="room_<?php echo $room; ?>" <?php echo $checked; ?> onclick="toggleQuantityInput(this)">
                <label class="form-check-label" for="room_<?php echo $room; ?>"><?php echo $room; ?></label>
                <!-- ช่องกรอกจำนวน -->
                <input type="number" name="quantity_<?php echo $room; ?>" id="quantity_<?php echo $room; ?>" class="form-control" value="<?php echo $quantity_value; ?>" style="display: <?php echo ($checked) ? 'inline-block' : 'none'; ?>; width: 100px; margin-left: 10px;" min="1" placeholder="จำนวน">
            </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<script>
    // ฟังก์ชันในการแสดงช่องกรอกจำนวนเมื่อเลือก checkbox
    function toggleQuantityInput(checkbox) {
        var roomId = checkbox.value;
        var quantityInput = document.getElementById('quantity_' + roomId);
        
        // ถ้าห้องถูกเลือก ให้แสดงช่องกรอกจำนวน
        if (checkbox.checked) {
            quantityInput.style.display = 'inline-block';
        } else {
            quantityInput.style.display = 'none';
        }
    }
</script>

            <div class="col-md-6">
                <label for="select-responsible" class="form-label">ผู้รับผิดชอบ:</label>
                <select name="select_responsible"  class="form-control" id="select_responsible" value="<?php  echo $row['responsible'];?>">
					<option value="<?php  echo $row['responsible'];?>"><?php  echo $row['responsible'];?></option>
                    <?php
                    $sql5 = "SELECT * FROM `responsible`";
                    $result5 = mysqli_query($con, $sql5);
                    if(mysqli_num_rows($result5) > 0){
                        while($row5 = mysqli_fetch_assoc($result5)){	 
                    ?>
                    <option value="<?php echo $row5['responsible'];?>"><?php echo $row5['responsible'];?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
					 
					 
					 <div class="form-row row">
            <div class="col-md-12">
				  <label for="select-responsible" class="form-label">รูปครุภัณฑ์:</label>
				
				
				<center><div class="bootstrap-scope">
				<font color="#FF0004">กดเพื่อขยายรูป</font><br>
					<br>
					
  <!-- Thumbnail Image with Button Trigger for Modal -->
  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="images/<?php echo $row['pic'];?>" width="400" height="200" alt=""/>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">รูปภาพ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <img src="images/<?php echo $row['pic'];?>" class="img-fluid" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
					 
					 
					 
				    <?php }} ?>
					<br><center>
					<a href="editeqnomalpic.php?eid=<?php echo $eid;?>">
					<button type="button" class="btn btn-warning">แก้ไขรูปครุภัณฑ์</button>
					</a>
	</center>
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
           <?php include("../includes/footer.php"); ?>
  </body>
</html>

<script>
    // ฟังก์ชันเพื่อแสดง/ซ่อนช่องกรอกจำนวนเมื่อเลือกหรือยกเลิก checkbox
    function toggleQuantityInput(checkbox) {
        var roomId = checkbox.value;
        var quantityInput = document.getElementById("quantity_" + roomId);

        if (checkbox.checked) {
            quantityInput.style.display = "inline"; // แสดงช่องกรอกจำนวน
        } else {
            quantityInput.style.display = "none"; // ซ่อนช่องกรอกจำนวน
        }
    }
</script>
    
    <script>
      function formatNumber(input) {
        let value = input.value.replace(/,/g, '');
        if (!isNaN(value)) {
          input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      }
    </script>
	  
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

 
