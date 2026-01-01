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
                        <h3 class="card-header m-0 me-2 pb-3"><strong>จัดการแหล่งเงิน</strong></h3>
                        
                      </div>
                     
                      <div class="card-body">
                      <div class="d-flex justify-content-end">  
                        
                      <div class="col-md-1">
                    
                    <select id="sortSelect" class="form-select">
                      <option value="">-- เรียงตาม --</option>
                      <option value="name_asc">ชื่อ (ก-ฮ)</option>
                      <option value="name_desc">ชื่อ (ฮ-ก)</option>
                      <option value="latest">ล่าสุด</option>
                      <option value="oldest">เก่าสุด</option>
                    </select>
                  </div>
                  
	<a href="addmon.php">
	<button type="button" class="btn btn-success">เพิ่ม</button>
	</a>
						  </div><br>
<table width="333" border="0" class="table table-hover">
  <tbody>
    
      <td width="375" align="center"><strong>ที่</strong></td>
      <td width="1367" align="center"><strong>แหล่งเงิน</strong></td>
      <td width="954" align="center"><strong>จัดการ</strong></td>
    </tr>
    <tr>
    <?php 
              // รับค่าการเรียงลำดับจาก URL
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

              $limit = 20; // จำนวนรายการต่อหน้า
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Query for total records
$countQuery = "SELECT COUNT(*) AS total FROM `source_money`";
$countResult = mysqli_query($con, $countQuery);
$rowCount = mysqli_fetch_assoc($countResult);
$totalRecords = $rowCount['total'];
$totalPages = ceil($totalRecords / $limit);

$sort = $_GET['sort'] ?? 'oldest';
              $orderBy = match ($sort) {
                'name_asc' => 'ORDER BY eq.money ASC',
                'name_desc' => 'ORDER BY eq.money DESC',
                'latest' => 'ORDER BY eq.money_id DESC',
                default => 'ORDER BY eq.money_id ASC'
              };
              
              // นับข้อมูลทั้งหมด (ไว้ใช้กับ pagination)
              $countSQL = "SELECT COUNT(*) AS total FROM source_money eq";
              $countResult = mysqli_query($con, $countSQL);
              $totalRows = mysqli_fetch_assoc($countResult)['total'] ?? 0;
              
              // คำนวณหน้า
              $limit = 30;
              $page = max(1, intval($_GET['page'] ?? 1));
              $offset = ($page - 1) * $limit;
              $totalPages = ceil($totalRows / $limit);



  // ดึงข้อมูล
  //$sql = "SELECT * FROM receive_transfer ORDER BY tran_id $orderBy LIMIT $limit OFFSET $offset";
  $sql = "SELECT DISTINCT eq.* FROM source_money eq $orderBy LIMIT $limit OFFSET $offset";
  $result = mysqli_query($con, $sql);

  $n = $offset + 1;
  while ($row = mysqli_fetch_assoc($result)) {
?>

      <td align="center"><?php echo $n;?></td>
      <td align="center"><?php echo $row['money'];?></td>
	<td align="center"><div class="bootstrap-scope"><a href="editmon.php?eid=<?php echo $row['money_id'];?>">
	  <button type="button" class="btn btn-warning">แก้ไข</button>
	</a>
		
	  
  <!-- Button -->
  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['money_id'];?>">
    ลบ
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal<?php echo $row['money_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="delmon.php?eid=<?php echo $row['money_id'];?>">
            <button type="button" class="btn btn-danger">ยืนยันการลบข้อมูล</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
		
		</td>
      </tr><?php 
				$n=$n+1;
			
		}
	  ?>
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
           <?php include("../includes/footer.php"); ?>
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
  </body>
</html>
