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
                        <h3 class="card-header m-0 me-2 pb-3"><strong>รายการข้อมูลครุภัณฑ์ต่ำกว่าเกณฑ์</strong></h3>
                        
                      </div>
                     
                      <div class="card-body">
					    <div class="d-flex align-items-center justify-content-between mb-3">
  <!-- ค้นหา -->
  <div class="col-md-6">
    <form action="screqlow.php" method="post" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
      <input name="scr" type="search" class="form-control" id="scr" placeholder="กรอกชื่อครุภัณฑ์, หมายเลขครุภัณฑ์, ประเภทครุภัณฑ์ หรือ ผู้รับผิดชอบ" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">ค้นหา</button>
    </form>
  </div>

  <div class="col-md-1">
  <select id="sortSelect" class="form-select">
    <option value="">-- เรียงตาม --</option>
    <option value="name_asc">ชื่อ (ก-ฮ)</option>
    <option value="name_desc">ชื่อ (ฮ-ก)</option>
    <option value="latest">ล่าสุด</option>
    <option value="oldest">เก่าสุด</option>
  </select>
</div>
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterInlineModal">
  กรองข้อมูล
</button>

<!-- Modal -->
<div class="modal fade" id="filterInlineModal" tabindex="-1" aria-labelledby="filterInlineModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="get" action="">
        <div class="modal-header">
          <h5 class="modal-title" id="filterInlineModalLabel">กรองข้อมูลครุภัณฑ์</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
        </div>
        <div class="modal-body">
          
          <!-- ผู้รับผิดชอบ -->
          <fieldset>
    <h6>เลือกผู้รับผิดชอบ</h6>
    <?php
    $responsibleResult = mysqli_query($con, "SELECT DISTINCT responsible FROM responsible");
    while ($row = mysqli_fetch_assoc($responsibleResult)) {
      $checked = in_array($row['responsible'], $_GET['responsible_filter'] ?? []) ? 'checked' : '';
      echo "<label><input type='checkbox' name='responsible_filter[]' value='{$row['responsible']}' $checked> {$row['responsible']}</label><br>";
    }
    ?>
  </fieldset>

  <fieldset>
    <br>
    <h6>เลือกห้องที่ใช้งาน</h6>
    <?php
    $roomResult = mysqli_query($con, "SELECT DISTINCT room FROM room");
    while ($room = mysqli_fetch_assoc($roomResult)) {
      $checked = in_array($room['room'], $_GET['room_filter'] ?? []) ? 'checked' : '';
      echo "<label><input type='checkbox' name='room_filter[]' value='{$room['room']}' $checked> {$room['room']}</label><br>";
    }
    ?>
  </fieldset>
<br>
  <fieldset>
    <h6>กรองตามช่วงปี</h6>
    <label>ปีเริ่มต้น:</label>
    <input type="number" name="start_year" value="<?php echo $_GET['start_year'] ?? ''; ?>" class="form-control">
    <label>ปีสิ้นสุด:</label>
    <input type="number" name="end_year" value="<?php echo $_GET['end_year'] ?? ''; ?>" class="form-control">
  </fieldset>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">กรองข้อมูล</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </div>
      </form>
    </div>
  </div>
</div>
  



  <!-- ปุ่มเพิ่ม -->
  <div class="me-4"><div class="bootstrap-scope">
    <a href="addeqlow.php">
      <button type="button" class="btn btn-success">เพิ่ม</button>
    </a>   
	  
	   <?php

// ดึงข้อมูลผู้รับผิดชอบจากตาราง responsible
$roomQuery = "SELECT room_id, room FROM room";
$roomResult = mysqli_query($con, $roomQuery);
?>
	     <!-- Button to open modal -->
       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#previewModal">
  รายงาน
</button>

<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
<div class="modal-dialog" style="max-width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ตัวอย่างรายงาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- พื้นที่ Preview -->
          <div class="col-md-10 border-end">
            <div id="reportPreviewArea" style="overflow-y: auto; overflow-x: auto;">
              <p class="text-muted">ยังไม่มีการแสดงตัวอย่างรายงาน</p>
            </div>
          </div>

          <!-- แบบฟอร์มตัวกรอง -->
          <div class="col-md-2">
          <form  id="filterForm" action="actions/export_eqlow.php" method="post">
    <!-- ตัวกรองผู้รับผิดชอบ -->
    <fieldset>
        <h6>เลือกผู้รับผิดชอบ</h6>
        <?php
        // แสดง Checkbox สำหรับผู้รับผิดชอบ
        $responsibleQuery = "SELECT * FROM `responsible`";
        $responsibleResult = mysqli_query($con, $responsibleQuery);
        while ($row77 = mysqli_fetch_assoc($responsibleResult)) {
            echo "<label><input type='checkbox' name='responsible_filter[]' value='{$row77['responsible']}' checked> {$row77['responsible']}</label><br>";
        }
        ?>
    </fieldset>
<br><br>
    <!-- ตัวกรองห้อง -->
    <fieldset>
    <br>
    <h6>เลือกห้องที่ใช้งาน</h6>
    <?php
    $roomResult = mysqli_query($con, "SELECT DISTINCT room FROM room");
    while ($room = mysqli_fetch_assoc($roomResult)) {
      $checked = in_array($room['room'], $_GET['room_filter'] ?? []) ? 'checked' : '';
      echo "<label><input type='checkbox' name='room_filter[]' value='{$room['room']}' $checked> {$room['room']}</label><br>";
    }
    ?>
  </fieldset>
<br><br>
			  <fieldset>
    <h6>กรองตามช่วงปี</h6>
    <label for="start_year">ปีเริ่มต้น:</label>
    <input type="number" id="start_year" name="start_year" placeholder="เริ่ม" min="1900" class="form-control">
    <br>
    <label for="end_year">ปีสิ้นสุด:</label>
    <input type="number" id="end_year" name="end_year" placeholder="สิ้นสุด" min="1900" class="form-control">
</fieldset>
			  <br><br>
     <div class="modal-footer">
		 <button type="button" id="checkAll" class="btn btn-outline-secondary">เลือกทั้งหมด</button>
          <button type="button" id="uncheckAll" class="btn btn-outline-secondary">ล้างค่าทั้งหมด</button>
            
          <button type="button" class="btn btn-success" id="previewReportBtn">แสดงตัวอย่าง</button>

        


        </div>
</form>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <form action="actions/export_eqlow.php" method="post" id="exportForm">
          <!-- ข้อมูลจะถูก sync จาก filterForm ด้วย JS -->
          <input type="hidden" name="start_year">
          <input type="hidden" name="end_year">
          <input type="hidden" name="report_type" value="excel">
          <!-- responsible_filter[] และ room_filter[] จะ sync แบบ dynamic -->
          <button type="submit" class="btn btn-success">สร้างรายงาน EXCEL</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
  </div>
  </div>
</div></div>
					 

                    
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
              $sort = isset($_GET['sort']) ? $_GET['sort'] : 'oldest';


              // เงื่อนไขการเรียงลำดับ
              $orderBy = "";
              if ($sort == "name_asc") {
                $orderBy = "ORDER BY 
                  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(name, 'เ', ''), 'แ', ''), 'โ', ''), 'ใ', ''), 'ไ', '') ASC";
            } elseif ($sort == "name_desc") {
                $orderBy = "ORDER BY 
                  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(name, 'เ', ''), 'แ', ''), 'โ', ''), 'ใ', ''), 'ไ', '') DESC";
            
            
              } elseif ($sort == "latest") {
                  $orderBy = "ORDER BY sum_id DESC"; // ล่าสุด -> เก่าสุด
              } elseif ($sort == "oldest") {
                  $orderBy = "ORDER BY sum_id ASC"; // เก่าสุด -> ล่าสุด
              }

              // ดึงข้อมูลจากฐานข้อมูล
              $limit = 20; // จำนวนรายการต่อหน้า
              $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
              if ($page < 1) $page = 1;
              $offset = ($page - 1) * $limit;
              
              // Query for total records
              $countQuery = "SELECT COUNT(*) AS total FROM `eqlow`";
              $countResult = mysqli_query($con, $countQuery);
              $rowCount = mysqli_fetch_assoc($countResult);
              $totalRecords = $rowCount['total'];
              $totalPages = ceil($totalRecords / $limit);
              
                            // ดึงข้อมูลจากฐานข้อมูล
              
                            $where = "WHERE 1";
                            $join = "LEFT JOIN numroom_low nr ON eq.sum_id = nr.sum_id";

                            
                            // ตัวกรองห้อง
                            if (!empty($_GET['room_filter'])) {
                              $roomList = array_map(fn($r) => "'" . mysqli_real_escape_string($con, $r) . "'", $_GET['room_filter']);
                              $where .= " AND nr.room IN (" . implode(",", $roomList) . ")";
                            }
                            
                            // ตัวกรองผู้รับผิดชอบ
                            if (!empty($_GET['responsible_filter'])) {
                              $respList = array_map(fn($r) => "'" . mysqli_real_escape_string($con, $r) . "'", $_GET['responsible_filter']);
                              $where .= " AND eq.responsible IN (" . implode(",", $respList) . ")";
                            }
                            
                            // ตัวกรองปี
                            if (!empty($_GET['start_year']) && is_numeric($_GET['start_year'])) {
                              $where .= " AND eq.year >= " . intval($_GET['start_year']);
                            }
                            if (!empty($_GET['end_year']) && is_numeric($_GET['end_year'])) {
                              $where .= " AND eq.year <= " . intval($_GET['end_year']);
                            }
                            
                            // จัดเรียง
                            $sort = $_GET['sort'] ?? 'oldest';
                            $orderBy = match ($sort) {
                              'name_asc' => 'ORDER BY eq.name ASC',
                              'name_desc' => 'ORDER BY eq.name DESC',
                              'latest' => 'ORDER BY eq.sum_id DESC',
                              default => 'ORDER BY eq.sum_id ASC'
                            };
                            
                            // นับข้อมูลทั้งหมด (ไว้ใช้กับ pagination)
                            $countSQL = "SELECT COUNT(*) AS total FROM eqlow eq $join $where";
                            $countResult = mysqli_query($con, $countSQL);
                            $totalRows = mysqli_fetch_assoc($countResult)['total'] ?? 0;
                            
                            // คำนวณหน้า
                            $limit = 30;
                            $page = max(1, intval($_GET['page'] ?? 1));
                            $offset = ($page - 1) * $limit;
                            $totalPages = ceil($totalRows / $limit);
                            
                            // ดึงข้อมูลหลัก
                            $sql = "SELECT DISTINCT eq.* FROM eqlow eq $join $where $orderBy LIMIT $limit OFFSET $offset";

                            
                          $result = mysqli_query($con, $sql);
                          $n = $offset + 1; 
                          if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                          ?>
							
                          <tr>
                            <td align="center" valign="middle"><?php echo $n; ?></td>
                            <td align="center" valign="middle"><?php echo $row['sumnum']; ?></td>
                            <td align="left" valign="middle"><?php echo $row['name']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['type']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['money']; ?></td>
                            <td align="center" valign="middle"><?php echo $row['num']; ?></td>
							<td align="center" valign="middle"><?php echo $row['price']; ?></td>

                            <td align="center" valign="middle"><div class="bootstrap-scope">
                              <a href="detaileqlow.php?eid=<?php echo $row['sum_id'];?>">
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
          <a href="actions/deleqlow2.php?eid=<?php echo $row['sum_id'];?>">
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

                      <?php
// ฟังก์ชันรวม GET ทั้งหมด ยกเว้น page
function buildQueryString($overrides = []) {
    $params = $_GET;

    // แทนค่าที่ต้องการ override เช่น page
    foreach ($overrides as $key => $value) {
        $params[$key] = $value;
    }

    // ลบ page ตัวเดิมก่อนจะสร้างใหม่
    unset($params['page']);

    $queryString = http_build_query($params);
    return $queryString ? "&$queryString" : "";
}
?>
							
							
<div class="d-flex justify-content-center mt-4">
  <nav>
    <ul class="pagination">
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo buildQueryString(['page' => $page - 1]); ?>">&lt;</a>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
          <a class="page-link" href="?page=<?php echo $i; ?><?php echo buildQueryString(['page' => $i]); ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo buildQueryString(['page' => $page + 1]); ?>">&gt;</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>
							
            
                       


                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            
            <!-- / Content -->

            <!-- Footer -->
           <?php include("../../../includes/footer.php"); ?>
			<script>
        // Add event listener to the button
        document.getElementById('uncheckAll').addEventListener('click', function() {
            // Get all checkboxes on the page
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            // Loop through and uncheck each one
            checkboxes.forEach(checkbox => checkbox.checked = false);
        });
			
			
			 document.getElementById('checkAll').addEventListener('click', function() {
            // Get all checkboxes on the page
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            // Loop through and uncheck each one
            checkboxes.forEach(checkbox => checkbox.checked = true);
        });
    </script>
     <script>
document.addEventListener("DOMContentLoaded", function () {
    let sortSelect = document.getElementById("sortSelect");

    // ตั้งค่าตัวเลือกที่เลือกอยู่
    let urlParams = new URLSearchParams(window.location.search);
    let currentSort = urlParams.get("sort");
    if (currentSort) {
        sortSelect.value = currentSort;
    }

    // อัปเดต URL ทันทีเมื่อเลือกตัวเลือกใหม่
    sortSelect.addEventListener("change", function () {
        let selectedSort = this.value;
        urlParams.set("sort", selectedSort);
        window.location.search = urlParams.toString();
    });
});
</script>
<script>
document.getElementById('previewReportBtn').addEventListener('click', function () {
  const form = document.getElementById('filterForm');
  const formData = new FormData(form);

  fetch('actions/export_eqlow.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById('reportPreviewArea').innerHTML = data;
  })
  .catch(err => {
    document.getElementById('reportPreviewArea').innerHTML = '<div class="text-danger">เกิดข้อผิดพลาดในการโหลดรายงาน</div>';
  });
});

// ปุ่ม check/uncheck
document.getElementById('checkAll').addEventListener('click', () => {
  document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(cb => cb.checked = true);
});
document.getElementById('uncheckAll').addEventListener('click', () => {
  document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(cb => cb.checked = false);
});
</script>
  </body>
</html>
